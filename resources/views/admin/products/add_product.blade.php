@extends('admin.layouts.master')

@section('admin-title')
Add Product
@endsection

@section('admin-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-users"></i>
       </div>
       <div class="header-title">
          <h1>Add Product</h1>
          <small>Create a new product</small>
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
                      <a class="btn btn-add " href="clist.html">
                      <i class="fa fa-list"></i>  Add Product </a>
                   </div>
                </div>
                <div class="panel-body">
                   <form action="{{ route('products.store') }}" method="POST" class="col-sm-6" enctype="multipart/form-data">
                       @csrf
                      <div class="form-group">
                         <label for="product_name">Product Name</label>
                         <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter Product Name" required>
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
                         <input type="text" class="form-control" name="product_code" id="product_code" placeholder="Enter Product Code" required>
                      </div>
                      <div class="form-group">
                        <label for="product_color">Product Color</label>
                        <input type="text" class="form-control" name="product_color" id="product_color" placeholder="Enter Product Color" required>
                     </div>
                      <div class="form-group">
                         <label for="product_description">Product Description</label>
                         <textarea name="product_description" id="product_description" cols="20" rows="10" class="form-control" required></textarea>
                      </div>
                      <div class="form-group">
                         <label for="product_price">Product Price</label>
                         <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price">
                      </div>
                      <div class="form-group">
                        <label>Picture upload</label>
                        <input type="file" name="product_image">
                        <input type="hidden" name="old_picture">
                     </div>
                      <div class="form-group">
                         <input type="submit" class="btn btn-success" style="padding: 7px 30px" value="Save"/>
                      </div>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- /.content -->
 </div>
@endsection
