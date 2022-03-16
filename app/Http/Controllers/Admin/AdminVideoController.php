<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Video;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AdminVideoController extends Controller
{
    protected $directory = 'admin.videos.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'videos'    => Video::withoutTrashed()->orderBy('id', 'desc')->get(),
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
        $request->validate([
            'ytLink'        =>  'required',
            'title_en'      =>  'required',
            'title_bn'      =>  'required',
            'video_thumb'   =>  'required|image|mimes:png,jpg,jpeg|max:600',
        ], [
            'ytLink.required'        =>  'Youtube video link required',
            'title_en.required'      =>  'Title(En) required',
            'title_bn.required'      =>  'Title(Bn) required',
            'video_thumb.required'   =>  'Video thumbnail required',
            'video_thumb.image'      =>  'Please use only Image file',
            'video_thumb.mimes'      =>  'Please use PNG, JPG or JPEG file format',
            'video_thumb.max'        =>  'Image file max size 600 Kb',
        ]);
        $video = new Video();
        $video->video_link  = $request->ytLink;
        $video->title_en    = $request->title_en;
        $video->title_bn    = $request->title_bn;
        if ($request->hasFile('video_thumb') && $request->file('video_thumb')->isValid()){
            $video->addMediaFromRequest('video_thumb')->toMediaCollection('video');
        }
        $video->save();
        Toastr::success('Video Post successfully Completed','Success');
        return redirect()->back();
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
        $data = [
            'videos' => Video::withoutTrashed()->get(),
            'video' => Video::findOrFail($id)
        ];
        return view("{$this->directory}edit", $data);
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
            'ytLink'        =>  'required',
            'title_en'      =>  'required',
            'title_bn'      =>  'required',
            'video_thumb'   =>  'nullable|image|mimes:png,jpg,jpeg|max:600',
        ], [
            'ytLink.required'        =>  'Youtube video link required',
            'title_en.required'      =>  'Title(En) required',
            'title_bn.required'      =>  'Title(Bn) required',
            'video_thumb.image'      =>  'Please use only Image file',
            'video_thumb.mimes'      =>  'Please use PNG, JPG or JPEG file format',
            'video_thumb.max'        =>  'Image file max size 600 Kb',
        ]);
        $video = Video::findOrFail($id);
        $video->video_link  = $request->ytLink;
        $video->title_en    = $request->title_en;
        $video->title_bn    = $request->title_bn;
        if ($request->hasFile('video_thumb') && $request->file('video_thumb')->isValid()){
            $video->media()->delete();
            $video->addMediaFromRequest('video_thumb')->toMediaCollection('video');
        }
        $video->update();
        Toastr::success('Video Update successfully Completed','Success');
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
        $video = Video::findOrFail($id);
        $video->delete();
        Toastr::success('Delete Completed', 'success');
        return redirect()->back();
    }

    //Trashed video
    public function trash(){
        $data = [
            'videos'         => Video::onlyTrashed()->paginate(15),
        ];
        return view("{$this->directory}trashed")->with($data);
    }

    public function restore($id)
    {
        $video = Video::where('id', $id)->restore();
        Toastr::success('Video Restored completed', 'Success');
        return redirect()->back();
    }

    public function forceDelete($id)
    {
        $video = Video::where('id', $id)->forceDelete();
        Toastr::success('Video Permanently deleted', 'Success');
        return redirect()->back();
    }
}
