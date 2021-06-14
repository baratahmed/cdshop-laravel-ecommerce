@extends('admin.layouts.master')

@section('admin-title')
Add Product Images
@endsection

@section('admin-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-users"></i>
       </div>
       <div class="header-title">
          <h1>Product Images</h1>
          <small>Add a new product image</small>
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
                      <a class="btn btn-add " href="{{ route('products.index') }}">
                      <i class="fa fa-list"></i>  View All Products</a>
                   </div>
                </div>
                <div class="panel-body">
                   <form action="{{ route('add.product.images.post',$product->id) }}" method="POST" class="col-sm-6" enctype="multipart/form-data">
                       @csrf
                      <div class="form-group">
                         <label for="product_name">Product Name: </label> {{ $product->product_name }}
                         {{-- <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter Product Name" required> --}}
                      </div>
                      <div class="form-group">
                         <label for="product_code">Product Code: </label> {{ $product->product_code }}
                         {{-- <input type="text" class="form-control" name="product_code" id="product_code" placeholder="Enter Product Code" required> --}}
                      </div>
                      <div class="form-group">
                        <label for="product_color">Product Color: </label> {{ $product->product_color }}
                        {{-- <input type="text" class="form-control" name="product_color" id="product_color" placeholder="Enter Product Color" required> --}}
                     </div>

                     <div class="form-group">
                        <input type="file" name="image[]" id="" multiple class="form-control" style="width: 250px">
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

    {{-- View Product Images --}}
    <section class="content">
        <div class="row">
           <div class="col-sm-12">
              <div class="panel panel-bd lobidrag">
                 <div class="panel-heading">
                    <div class="btn-group" id="buttonexport">
                       <a href="#">
                          <h4>All Product Images</h4>
                       </a>
                    </div>
                 </div>
                 <div class="panel-body">

                    <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                    <div class="table-responsive">
                       <table id="table_id_2" class="table table-bordered table-striped table-hover">
                          <form action="#" method="post" enctype="multipart/form-data">
                             @csrf
                             <thead>
                                 <tr class="info">
                                    <th>Sl No</th>
                                    <th>Product Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                @foreach ($images as $image)
                                <tr>
                                     <td>{{ $loop->index + 1 }}</td>
                                     <td>
                                        <div style="text-align: center; padding-top:20px;">
                                            {{ $image->product->product_name }}
                                        </div>
                                     </td>
                                     <td>
                                         <img src="{{ asset($image->image) }}" alt="" class="img-fluid" width="100px">
                                     </td>

                                     <td>
                                         <a href="{{ route('delete.alt.image',$image->id) }}" class="btn btn-danger btn-sm" title="Delete Product Attribute"><i class="fa fa-trash-o"></i> </a>
                                     </td>
                                 </tr>
                                @endforeach
                              </tbody>
                          </form>
                       </table>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>

 </div>
@endsection
