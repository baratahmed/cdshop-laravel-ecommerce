@extends('admin.layouts.master')

@section('admin-title')
Edit Product
@endsection

@section('admin-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-users"></i>
       </div>
       <div class="header-title">
          <h1>Edit Product</h1>
          <small>Edit your product</small>
       </div>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('admin.messages')
       <div class="row">
          <!-- Form controls -->
          <div class="col-sm-12">
             <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                   <div class="btn-group" id="buttonlist">
                      <a class="btn btn-add " href="{{ route('products.show',$product->id) }}">
                      <i class="fa fa-list"></i>  View Details </a>
                   </div>
                </div>
                <div class="panel-body">
                   <form action="{{ route('products.update',$product->id) }}" method="POST" name="editProductForm" class="col-sm-6" enctype="multipart/form-data">
                       @method('PUT')
                       @csrf
                      <div class="form-group">
                         <label for="product_name">Product Name</label>
                         <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}" id="product_name" placeholder="Enter Product Name" required>
                      </div>
                      <div class="form-group">
                        <label for="category_id">Select a Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name}}</option>
                            @endforeach
                        </select>
                     </div>
                      <div class="form-group">
                         <label for="product_code">Product Code</label>
                         <input type="text" class="form-control" name="product_code" value="{{ $product->product_code }}" id="product_code" placeholder="Enter Product Code" required>
                      </div>
                      <div class="form-group">
                        <label for="product_color">Product Color</label>
                        <input type="text" class="form-control" name="product_color" value="{{ $product->product_color }}" id="product_color" placeholder="Enter Product Color" required>
                     </div>
                      <div class="form-group">
                         <label for="product_description">Product Description</label>
                         <textarea name="product_description" id="product_description" cols="20" rows="10" class="form-control" required>{{ $product->product_description }}</textarea>
                      </div>
                      <div class="form-group">
                         <label for="product_price">Product Price</label>
                         <input type="text" name="product_price" id="product_price" class="form-control" value="{{ $product->product_price }}" placeholder="Enter Product Price">
                      </div>
                      <div class="form-group">
                        <label>Picture upload</label><br>
                        @if (!empty($product->product_image))
                            <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}" width="100px">
                        @else
                            <img src="{{ asset('/uploads/no_image.png') }}" alt="{{ $product->product_name }}" width="100px">
                        @endif
                        <input type="file" name="product_image" style="margin-top: 10px">
                        <input type="hidden" name="old_picture">
                     </div>
                      <div class="form-group">
                         <input type="submit" class="btn btn-info" style="padding: 7px 30px" value="Update"/>
                      </div>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- /.content -->
 </div>


 <script>
    document.forms['editProductForm'].elements['category_id'].value = '{{$product->category_id}}';
    // document.forms['editProductForm'].elements['brand_id'].value = '{{$product->brand_id}}';
</script>
@endsection
