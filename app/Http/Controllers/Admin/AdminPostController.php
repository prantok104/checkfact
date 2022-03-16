<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class AdminPostController extends Controller
{
    protected $directory = 'admin.posts.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
          'category'    => Category::withoutTrashed()->get(),
        ];
        return view("{$this->directory}add-new", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')){
            $request->validate([
                'title_en'      => 'required',
                'title_bn'      => 'required',
                'content_en'    => 'required',
                'content_bn'    => 'required',
                'post_image'    => 'required|image|mimes:jpeg,png,jpg|max:600',
                'category'      => 'required',
            ],
            [
               'title_en.required'      => 'English title required',
               'title_bn.required'      => 'Bangla Title required',
               'content_en.required'    => 'English content required',
               'content_bn.required'    => 'Bangla Content required',
               'post_image.required'    => 'Invalid Post Thumbnail',
               'post_image.mimes'       => 'Please use PNG, JPG or JPEG file format',
               'post_image.image'       => 'Please use only image file',
               'post_image.max'         => 'Image file max size 600 Kb',
               'category.required'      => 'Category field required',
            ]);


            $post = new Post();
            $post->title_en = $request->title_en;

            $post->title_bn = $request->title_bn;
            $post->content_en = $request->content_en;
            $post->content_bn = $request->content_bn;

            if ($request->hasFile('post_image') && $request->file('post_image')->isValid()){
                $post->addMediaFromRequest('post_image')->toMediaCollection('post');
            }

            $post->category_id = $request->category;
            $post->draft = $request->post;
            $post->save();
            Toastr::success('Post Create successfully Completed','Success');
            return redirect()->back();
        }
        else
        {
            Toastr::error('Something Wrong:)','Error');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $data = [
            'category'    => Category::withoutTrashed()->get(),
            'posts'       => Post::find($id),
        ];
        return view("{$this->directory}.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title_en'      => 'required',
            'title_bn'      => 'required',
            'content_en'    => 'required',
            'content_bn'    => 'required',
            'post_image'    => 'nullable|image|mimes:jpeg,png,jpg|max:600',
            'category'      => 'required',
        ],
        [
            'title_en.required'  => 'English title required',
            'title_bn.required'  => 'Bangla Title required',
            'content_en.required'  => 'English content required',
            'content_bn.required'  => 'Bangla Content required',
            'post_image.mimes'     => 'Please use PNG, JPG or JPEG file format',
            'post_image.image'     => 'Please use only image file',
            'category.required'  => 'Category field required',
        ]);

        $post = Post::findOrFail($id);
        $post->title_en = $request->title_en;

        $post->title_bn = $request->title_bn;
        $post->content_en = $request->content_en;
        $post->content_bn = $request->content_bn;

        if ($request->hasFile('post_image') && $request->file('post_image')->isValid()){
            $post->media()->delete();
            $post->addMediaFromRequest('post_image')->toMediaCollection('post');
        }

        $post->category_id = $request->category;
        $post->draft = $request->post;
        $post->update();
        Toastr::success('Post Update Completed','Update');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        Toastr::success('Delete completed, Please check it Trash menu', 'Deleted');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        $post = Post::findOrFail($id);
        $post->forceDelete();
        Toastr::success('Permanently Deleted ', 'Deleted');
        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::where('id', $id)->restore();
        Toastr::success('Post Restored completed', 'Success');
        return redirect()->back();
    }

    public function trash()
    {
        $data = [
            'posts'         => Post::onlyTrashed()->get(),
        ];
        return view("{$this->directory}trashed")->with($data);
    }


    /*
     * Image upload in tinyMCE editor
     *
     * **/
    public function imageUpload(Request $request)
    {
        $mainImage = $request->file('file');
        $filename = time() . '.' . $mainImage->extension();
        Image::make($mainImage)->save(public_path("tinymce_upload/".$filename));
         return json_encode(["location" => asset("tinymce_upload/".$filename)]);
    }
    // All posts show
    public function view(){
        $data['posts'] = Post::with(['categories'])->where('draft', '1')->orderBy('id', 'desc')->paginate(15);
        return view("{$this->directory}view-all", $data);
    }

    // Publish to draft
    public function draft($id)
    {
        $post = Post::findOrFail($id);
        $post->draft = 2;
        $post->update();
        Toastr::success('Draft Complete. Please check it draft menu', 'Success');
        return redirect()->back();
    }
    // Publish to draft posts
    public function draftPosts()
    {
        $data['posts'] = Post::with(['categories'])->where('draft', '2')->orderBy('id', 'desc')->get();
        return view("{$this->directory}draft", $data);
    }
    // Draft to publish
    public function publish($id)
    {
        $post = Post::findOrFail($id);
        $post->draft = '1';
        $post->update();
        Toastr::success('Publish Complete. Please check it view all menu', 'Success');
        return redirect()->back();
    }

}
