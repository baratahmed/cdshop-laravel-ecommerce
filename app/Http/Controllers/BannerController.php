<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function index()
    {
        $data = [];
        $data['banners'] = Banner::orderBy('id','desc')->get();
        return view('admin.banners.index',$data);
    }

    public function create()
    {
        // $data = [];
        // $data['categories'] = Category::where('parent_id',0)->get();
        return view('admin.banners.add_banner');
    }

    public function store(Request $request)
    {
        $banner = new Banner();
        $banner->banner_name = $request->banner_name;
        $banner->text_style = $request->text_style;
        $banner->sort_order = $request->sort_order;
        $banner->banner_content = $request->banner_content;
        $banner->banner_link = $request->banner_link;

        //Upload Pictute
        if($request->hasFile('banner_image')){
            $img_tmp = $request->file('banner_image');
            if($img_tmp->isValid()){
                $extension = $img_tmp->getClientOriginalExtension();
                $fileName = 'Img-'.time().'.'.$extension;
                $img_path = 'uploads/banners/'.$fileName;
                Image::make($img_tmp)->resize(500,500)->save($img_path);
                $banner->banner_image = $img_path;
            }
        }
        session()->flash('success', 'Banner Added Successfully!');
        $banner->save();
        return back();
    }


    public function show($id)
    {

    }

    public function edit($id)
    {
        $data = [];
        $data['banner'] = Banner::find($id);
        return view('admin.banners.edit_banner',$data);
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);
        $banner->banner_name = $request->banner_name;
        $banner->text_style = $request->text_style;
        $banner->sort_order = $request->sort_order;
        $banner->banner_content = $request->banner_content;
        $banner->banner_link = $request->banner_link;

        //Upload Pictute
        if($request->hasFile('banner_image')){
            unlink($banner->banner_image);
            $img_tmp = $request->file('banner_image');
            if($img_tmp->isValid()){
                $extension = $img_tmp->getClientOriginalExtension();
                $fileName = 'Img-'.time().'.'.$extension;
                $img_path = 'uploads/banners/'.$fileName;
                Image::make($img_tmp)->resize(500,500)->save($img_path);
                $banner->banner_image = $img_path;
            }
        }
        $banner->save();
        session()->flash('success', 'Banner Updated Successfully!');
        return redirect()->route('banners.index');
    }

    public function updateBannerStatus(Request $request){
        //return $request->status;
        $banner = Banner::find($request->id);
        $banner->status = $request->status;
        $banner->save();
    }

    public function delete($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        unlink($banner->banner_image);
        session()->flash('success', 'Banner Deleted Successfully!');
        return redirect()->route('banners.index');
    }
}
