<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = [];
        $data['categories'] = Category::orderBy('id','desc')->get();
        return view('admin.categories.index',$data);
    }

    public function create()
    {
        $data = [];
        $data['parent_categories'] = Category::where('parent_id',0)->orderBy('id','desc')->get();
        return view('admin.categories.add_category', $data);
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->parent_id = $request->parent_id;
        $category->category_url = $request->category_url;
        if(!empty($request->category_description)){
            $category->category_description = $request->category_description;
        }else{
            $category->product_description = '';
        }
        session()->flash('success', 'Category Added Successfully!');
        $category->save();
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = [];
        $data['category'] = Category::find($id);
        $data['parent_categories'] = Category::where('parent_id',0)->orderBy('id','desc')->get();
        return view('admin.categories.edit_category', $data);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->parent_id = $request->parent_id;
        $category->category_url = $request->category_url;
        if(!empty($request->category_description)){
            $category->category_description = $request->category_description;
        }else{
            $category->product_description = '';
        }
        session()->flash('success', 'Category Updated Successfully!');
        $category->save();
        return redirect()->route('categories.index');
    }

    public function updateCategoryStatus(Request $request){
        //return $request->status;
        $category = Category::find($request->id);
        $category->status = $request->status;
        $category->save();
    }
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('success', 'Category Deleted Successfully!');
        return redirect()->route('categories.index');

    }
}
