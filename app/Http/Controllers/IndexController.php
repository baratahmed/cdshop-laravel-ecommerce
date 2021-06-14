<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $data = [];
        $data['banners'] = Banner::where('status',1)->get();
        $data['categories'] = Category::with('categories')->where('parent_id',0)->get();
        $data['products'] = Product::where('status',1)->get();
        return view('cdshop.index',$data);
    }
    public function productDetails($id){
        $data = [];
        $data['product'] = Product::with('attributes','images')->find($id);
        $data['featured_products'] = Product::where('isFeatured',1)->get();
        return view('cdshop.product-details',$data);

    }
    public function categories($id){
        $data = [];
        $data['categories'] = Category::with('categories')->where('parent_id',0)->get();
        $data['products'] = Product::where('category_id',$id)->get();
        $data['first_product'] = Product::where('category_id',$id)->first();
        return view('cdshop.category',$data);

    }
    public function getProductPrice(Request $request){
        $data = $request->all();
        $proArr = explode('-',$data['idSize']);
        $proAttr = ProductAttribute::where(['product_id'=>$proArr[0],'size'=>$proArr[1]])->first();
        echo $proAttr->price;
    }
}
