<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Brian2694\Toastr\Facades\Toastr;

class AdminCategoryController extends Controller
{
    protected $directory = 'admin.category.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
          'parent_category' => Category::withoutTrashed()->get(),
        ];
        return view("{$this->directory}add-new")->with($data);
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
        if ($request->isMethod('POST'))
        {
            $request->validate([
                'category_name_en'  => 'required|max:200',
                'category_name_bn'  => 'required|max:200',
                'category_icon'   => 'required',
            ],
            [
                'category_name_en.required'     => 'Category name required',
                'category_name_en.max:200'      => 'Category name max 200 char.',
                'category_name_bn.required'     => 'Category name required',
                'category_name_bn.max:200'      => 'Category name max 200 char.',
                'category_icon.required'        => 'Category icon required.',
            ]
            );

            $category = new Category();
            $category->name_en          = $request->category_name_en;
            $category->name_bn          = $request->category_name_bn;
            $category->description      = $request->description;
            $category->icon             = $request->category_icon;
            $category->save();
            Toastr::success('Category Create successfully :)','Success');
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
        $data = [
            'parent_category' => Category::withoutTrashed()->get(),
            'category'         => Category::findOrfail($id),
        ];
        return view("{$this->directory}edit")->with($data);
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
            'category_name_en'  => 'required|max:200',
            'category_name_bn'  => 'required|max:200',
            'category_icon'   => 'required',
        ],
            [
                'category_name_en.required'     => 'Category name required',
                'category_name_en.max:200'      => 'Category name max 200 char.',
                'category_name_bn.required'     => 'Category name required',
                'category_name_bn.max:200'      => 'Category name max 200 char.',
                'category_icon.required'        => 'Category icon required.',
            ]
        );

        $category = Category::find($id);
        $category->name_en          = $request->category_name_en;
        $category->name_bn          = $request->category_name_bn;
        $category->description      = $request->description;
        $category->icon             = $request->category_icon;
        $category->update();
        Toastr::success('Category Update successfully :)','Success');
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
        $category = Category::find($id);
        $category->delete();
        Toastr::success('Delete Completed', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $data = [
            'category'         => Category::onlyTrashed()->get(),
        ];
        return view("{$this->directory}trashed")->with($data);
    }

    public function restore($id)
    {
        $category = Category::where('id', $id)->restore();
        Toastr::success('Category Restored completed', 'Success');
        return redirect()->back();
    }

    public function forceDelete($id)
    {
        $category = Category::where('id', $id)->forceDelete();
        Toastr::success('Category Permanently deleted', 'Success');
        return redirect()->back();
    }




}
