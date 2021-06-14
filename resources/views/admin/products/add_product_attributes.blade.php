@extends('admin.layouts.master')

@section('admin-title')
Add Product Attributes
@endsection

@section('admin-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-users"></i>
       </div>
       <div class="header-title">
          <h1>Product Attributes</h1>
          <small>Create a new product attribute</small>
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
                   <form action="{{ route('add.product.attributes.post',$product->id) }}" method="POST" class="col-sm-6" >
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
                        <div class="field_wrapper">
                            <div style="display: flex;">
                                <input type="text" id="sku" name="sku[]" class="form-control" placeholder="SKU" style="width: 120px"/>
                                <input type="text" id="size" name="size[]" class="form-control" placeholder="SIZE" style="width: 120px"/>
                                <input type="text" id="price" name="price[]" class="form-control" placeholder="PRICE" style="width: 120px"/>
                                <input type="text" id="stock" name="stock[]" class="form-control" placeholder="STOCK" style="width: 120px"/>
                                <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fa fa-plus fa-2x" style="margin-left: 7px; margin-top: 3px"></i></a>
                            </div>
                        </div>
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

    {{-- View Attributes --}}
    <section class="content">
       <div class="row">
          <div class="col-sm-12">
             <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                   <div class="btn-group" id="buttonexport">
                      <a href="#">
                         <h4>All Attributes</h4>
                      </a>
                   </div>
                </div>
                <div class="panel-body">

                   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="table-responsive">
                      <table id="table_id_2" class="table table-bordered table-striped table-hover">
                         <form action="{{ route('update.product.attributes',$product->id ) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <thead>
                                <tr class="info">
                                   <th>Sl No</th>
                                   <th>SKU</th>
                                   <th>Size</th>
                                   <th>Price</th>
                                   <th>Stock</th>
                                   <th>Action</th>

                                </tr>
                             </thead>
                             <tbody>
                               @foreach ($product->attributes as $attribute)
                               <tr>
                                    <td style="display: none"><input type="hidden" name="attr[]" value="{{ $attribute->id }}"></td>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <input type="text" name="sku[]" value="{{ $attribute->sku }}" class="form-control" style="text-align: center;">
                                    </td>
                                    <td>
                                        <input type="text" name="size[]" value="{{ $attribute->size }}" class="form-control" style="text-align: center;">
                                    </td>
                                    <td>
                                        <input type="text" name="price[]" value="{{ $attribute->price }}" class="form-control" style="text-align: center;">
                                    </td>
                                    <td>
                                        <input type="text" name="stock[]" value="{{ $attribute->stock }}" class="form-control" style="text-align: center;">
                                    </td>

                                    <td>
                                        <input type="submit" value="Update" class="btn btn-info btn-sm" style="color: black">
                                        <a href="{{ route('delete.product.attribute',$attribute->id) }}" class="btn btn-danger btn-sm" title="Delete Product Attribute"><i class="fa fa-trash-o"></i> </a>
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
