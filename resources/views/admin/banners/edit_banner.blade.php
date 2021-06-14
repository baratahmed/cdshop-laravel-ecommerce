@extends('admin.layouts.master')

@section('admin-title')
Edit Banner
@endsection

@section('admin-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-users"></i>
       </div>
       <div class="header-title">
          <h1>Edit Banner</h1>
          <small>Edit your banner</small>
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
                      <a class="btn btn-add " href="{{ route('banners.show',$banner->id) }}">
                      <i class="fa fa-list"></i>  View Details </a>
                   </div>
                </div>
                <div class="panel-body">
                   <form action="{{ route('banners.update',$banner->id) }}" method="POST" class="col-sm-6" enctype="multipart/form-data">
                       @method('PUT')
                       @csrf
                       <div class="form-group">
                        <label for="banner_name">Banner Name</label>
                        <input type="text" class="form-control" value="{{ $banner->banner_name }}" name="banner_name" id="banner_name" placeholder="Enter Banner Name" required>
                     </div>
                     <div class="form-group">
                       <label for="text_style">Test Style</label>
                       <input type="text" class="form-control" value="{{ $banner->text_style }}" name="text_style" id="text_style" placeholder="Enter Text Style" required>
                    </div>
                     <div class="form-group">
                        <label for="banner_content">Banner Content</label>
                        <textarea name="banner_content" id="banner_content" cols="20" rows="10" class="form-control" required>{{ $banner->banner_content }}</textarea>
                     </div>
                     <div class="form-group">
                        <label for="banner_link">Banner Link</label>
                        <input type="text" value="{{ $banner->banner_link }}" name="banner_link" id="banner_link" class="form-control" placeholder="Enter Banner Link">
                     </div>
                     <div class="form-group">
                       <label for="sort_order">Sort Order</label>
                       <input type="text" value="{{ $banner->sort_order }}" name="sort_order" id="sort_order" class="form-control" placeholder="Sort Order">
                    </div>
                     <div class="form-group">
                       <label>Picture upload</label> <br>
                       @if (!empty($banner->banner_image))
                            <img src="{{ asset($banner->banner_image) }}" alt="{{ $banner->banner_name }}" width="100px">
                        @else
                            <img src="{{ asset('/uploads/no_image.png') }}" alt="{{ $banner->banner_name }}" width="100px">
                        @endif
                       <input type="file" name="banner_image" style="margin-top: 10px">
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
    // document.forms['editBannerForm'].elements['category_id'].value = '{{$banner->category_id}}';
    // document.forms['editBannerForm'].elements['brand_id'].value = '{{$banner->brand_id}}';
</script>
@endsection
