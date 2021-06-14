@extends('admin.layouts.master')

@section('admin-title')
Add Banner
@endsection

@section('admin-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-users"></i>
       </div>
       <div class="header-title">
          <h1>Add Banner</h1>
          <small>Create a new banner</small>
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
                      <i class="fa fa-list"></i>  Add Banner </a>
                   </div>
                </div>
                <div class="panel-body">
                   <form action="{{ route('banners.store') }}" method="POST" class="col-sm-6" enctype="multipart/form-data">
                       @csrf
                      <div class="form-group">
                         <label for="banner_name">Banner Name</label>
                         <input type="text" class="form-control" name="banner_name" id="banner_name" placeholder="Enter Banner Name" required>
                      </div>
                      <div class="form-group">
                        <label for="text_style">Test Style</label>
                        <input type="text" class="form-control" name="text_style" id="text_style" placeholder="Enter Text Style" required>
                     </div>
                      <div class="form-group">
                         <label for="banner_content">Banner Content</label>
                         <textarea name="banner_content" id="banner_content" cols="20" rows="10" class="form-control" required></textarea>
                      </div>
                      <div class="form-group">
                         <label for="banner_link">Banner Link</label>
                         <input type="text" name="banner_link" id="banner_link" class="form-control" placeholder="Enter Banner Link">
                      </div>
                      <div class="form-group">
                        <label for="sort_order">Sort Order</label>
                        <input type="text" name="sort_order" id="sort_order" class="form-control" placeholder="Sort Order">
                     </div>
                      <div class="form-group">
                        <label>Picture upload</label>
                        <input type="file" name="banner_image">
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
