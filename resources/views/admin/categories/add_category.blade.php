@extends('admin.layouts.master')

@section('admin-title')
Add Category
@endsection

@section('admin-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-users"></i>
       </div>
       <div class="header-title">
          <h1>Add Category</h1>
          <small>Create a new category</small>
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
                      <i class="fa fa-list"></i>  Add Category </a>
                   </div>
                </div>
                <div class="panel-body">
                   <form action="{{ route('categories.store') }}" method="POST" class="col-sm-6">
                       @csrf
                      <div class="form-group">
                         <label for="category_name">Category Name</label>
                         <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter Category Name" required>
                      </div>

                      <div class="form-group">
                        <label for="parent_id">Parent Category</label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="0">Parent Category</option>
                            @foreach ($parent_categories as $parent_category)
                            <option value="{{ $parent_category->id }}">{{ $parent_category->category_name}}</option>
                            @endforeach
                        </select>
                     </div>

                     <div class="form-group">
                        <label for="category_url">Category Url</label>
                        <input type="text" class="form-control" name="category_url" id="category_url" placeholder="Enter Category Url" required>
                     </div>
                     <div class="form-group">
                        <label for="category_description">Category Description</label>
                        <textarea name="category_description" id="category_description" cols="20" rows="10" class="form-control" required></textarea>
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
