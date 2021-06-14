<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index()
    {
        $data = [];
        $data['products'] = Product::orderBy('id','desc')->get();
        return view('admin.products.index',$data);
    }

    public function create()
    {
        $data = [];
        $data['categories'] = Category::where('parent_id',0)->get();
        return view('admin.products.add_product',$data);
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->product_code = $request->product_code;
        $product->product_color = $request->product_color;
        if(!empty($request->product_description)){
            $product->product_description = $request->product_description;
        }else{
            $product->product_description = '';
        }
        $product->product_price = $request->product_price;

        //Upload Pictute
        if($request->hasFile('product_image')){
            $img_tmp = $request->file('product_image');
            if($img_tmp->isValid()){
                $extension = $img_tmp->getClientOriginalExtension();
                $fileName = 'Img-'.time().'.'.$extension;
                $img_path = 'uploads/products/'.$fileName;
                Image::make($img_tmp)->resize(500,500)->save($img_path);
                $product->product_image = $img_path;
            }
        }
        session()->flash('success', 'Product Added Successfully!');
        $product->save();
        return back();
    }


    public function show($id)
    {

    }

    public function edit($id)
    {
        $data = [];
        $data['categories'] = Category::where('parent_id',0)->get();
        $data['product'] = Product::find($id);
        return view('admin.products.edit_product',$data);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->product_code = $request->product_code;
        $product->product_color = $request->product_color;
        if(!empty($request->product_description)){
            $product->product_description = $request->product_description;
        }else{
            $product->product_description = '';
        }
        $product->product_price = $request->product_price;

        //Upload Pictute
        if($request->hasFile('product_image')){
            unlink($product->product_image);
            $img_tmp = $request->file('product_image');
            if($img_tmp->isValid()){
                $extension = $img_tmp->getClientOriginalExtension();
                $fileName = 'Img-'.time().'.'.$extension;
                $img_path = 'uploads/products/'.$fileName;
                Image::make($img_tmp)->resize(500,500)->save($img_path);
                $product->product_image = $img_path;
            }
        }
        $product->save();
        session()->flash('success', 'Product Updated Successfully!');
        return redirect()->route('products.index');
    }

    public function updateProductStatus(Request $request){
        //return $request->status;
        $product = Product::find($request->id);
        $product->status = $request->status;
        $product->save();
    }

    public function updateFeaturedStatus(Request $request){
        //return $request->status;
        $product = Product::find($request->id);
        $product->isFeatured = $request->status;
        $product->save();
    }

    public function addProductAttributesGet($id){

        $data = [];
        $product = Product::with('attributes')->find($id);
        return view('admin.products.add_product_attributes',[
            'product' => $product,
        ]);
    }

    public function addProductAttributesPost(Request $request, $id = null){
        $data = $request->all();
        foreach ($data['sku'] as $key => $val) {
            if(!empty($val)){

                //Prevent Duplicate SKU Record
                $attrCountSKU = ProductAttribute::where('sku',$val)->count();
                if ($attrCountSKU > 0) {
                    session()->flash('error','SkU is already exists, Please use another SKU.');
                    return redirect()->back();
                }
                //Prevent Duplicate SIZE Record
                $attrCountSize = ProductAttribute::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                if ($attrCountSize > 0) {
                    session()->flash('error',$data['size'][$key],' is already exists, Please use another size.');
                    return redirect()->back();
                }

                $attribute = new ProductAttribute();
                $attribute->product_id = $id;
                $attribute->sku = $val;
                $attribute->size = $data['size'][$key];
                $attribute->price = $data['price'][$key];
                $attribute->stock = $data['stock'][$key];
                $attribute->save();
            }
        }
        session()->flash('success','Attributes added successfully!');
        return redirect()->route('add.product.attributes.get',$id);
    }

    public function updateProductAttributes(Request $request){
        $data = $request->all();
        foreach ($data['attr'] as $key => $attr) {
            ProductAttribute::where('id',$attr)->update(['sku'=>$data['sku'][$key],'size'=>$data['size'][$key],'price'=>$data['price'][$key],'stock'=>$data['stock'][$key],]);
        }
        session()->flash('success','Attributes updated successfully!');
        return back();
    }

    public function deleteProductAttribute($id){
        $attribute = ProductAttribute::find($id);
        $attribute->delete();
        session()->flash('success','Attribute deleted successfully!');
        return back();
    }

    public function addProductImagesGet($id){
        $data = [];
        $data['product'] = Product::find($id);
        $data['images'] = ProductImage::where('product_id',$id)->get();
        return view('admin.products.add_product_images',$data);
    }

    public function addProductImagesPost(Request $request, $id){
        //$product = Product::find($id);
        if($request->hasFile('image')){
            $files = $request->file('image');
            foreach ($files as $file) {
                $image = new ProductImage();
                $extension = $file->getClientOriginalExtension();
                $fileName = 'Img-'.time().'.'.$extension;
                $image_path = 'uploads/products/'.$fileName;
                Image::make($file)->resize(500,500)->save($image_path);
                $image->image = $image_path;
                $image->product_id = $id;
                $image->save();
            }
            session()->flash('success', 'Product Images Uploaded Successfully!');
            return back();
        }
        session()->flash('error', 'Something went wrong!');
            return back();
    }

    public function deleteAltImage($id){
        $image = ProductImage::find($id);
        $image->delete();
        unlink($image->image);
        session()->flash('success', 'Product Alt Image Deleted Successfully!');
        return back();
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        unlink($product->product_image);
        session()->flash('success', 'Product Deleted Successfully!');
        return redirect()->route('products.index');
    }
}
