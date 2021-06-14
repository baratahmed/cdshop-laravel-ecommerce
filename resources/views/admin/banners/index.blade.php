@extends('admin.layouts.master')

@section('admin-title')
View All Banners
@endsection

@section('admin-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-users"></i>
       </div>
       <div class="header-title">
          <h1>All Banners</h1>
          <small>View all sliders list</small>
       </div>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('admin.messages')
        <div id="message_success_ban" style="display: none;" class="alert alert-success">Status Enabled</div>
        <div id="message_error_ban" style="display: none;" class="alert alert-danger">Status Disabled</div>

       <div class="row">
          <div class="col-sm-12">
             <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                   <div class="btn-group" id="buttonexport">
                      <a href="{{ route('banners.index') }}">
                         <h4>All Banners</h4>
                      </a>
                   </div>
                </div>
                <div class="panel-body">
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="btn-group">
                      <div class="buttonexport" id="buttonlist">
                         <a class="btn btn-add" href="{{ route('banners.create') }}"> <i class="fa fa-plus"></i> Add Banner
                         </a>
                      </div>
                      {{-- <button class="btn btn-exp btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button> --}}
                      <ul class="dropdown-menu exp-drop" role="menu">
                         <li>
                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'false'});">
                            <img src="assets/dist/img/json.png" width="24" alt="logo"> JSON</a>
                         </li>
                         <li>
                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});">
                            <img src="assets/dist/img/json.png" width="24" alt="logo"> JSON (ignoreColumn)</a>
                         </li>
                         <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'true'});">
                            <img src="assets/dist/img/json.png" width="24" alt="logo"> JSON (with Escape)</a>
                         </li>
                         <li class="divider"></li>
                         <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'xml',escape:'false'});">
                            <img src="assets/dist/img/xml.png" width="24" alt="logo"> XML</a>
                         </li>
                         <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'sql'});">
                            <img src="assets/dist/img/sql.png" width="24" alt="logo"> SQL</a>
                         </li>
                         <li class="divider"></li>
                         <li>
                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'csv',escape:'false'});">
                            <img src="assets/dist/img/csv.png" width="24" alt="logo"> CSV</a>
                         </li>
                         <li>
                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'txt',escape:'false'});">
                            <img src="assets/dist/img/txt.png" width="24" alt="logo"> TXT</a>
                         </li>
                         <li class="divider"></li>
                         <li>
                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'excel',escape:'false'});">
                            <img src="assets/dist/img/xls.png" width="24" alt="logo"> XLS</a>
                         </li>
                         <li>
                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'doc',escape:'false'});">
                            <img src="assets/dist/img/word.png" width="24" alt="logo"> Word</a>
                         </li>
                         <li>
                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'powerpoint',escape:'false'});">
                            <img src="assets/dist/img/ppt.png" width="24" alt="logo"> PowerPoint</a>
                         </li>
                         <li class="divider"></li>
                         <li>
                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'png',escape:'false'});">
                            <img src="assets/dist/img/png.png" width="24" alt="logo"> PNG</a>
                         </li>
                         <li>
                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});">
                            <img src="assets/dist/img/pdf.png" width="24" alt="logo"> PDF</a>
                         </li>
                      </ul>
                   </div>
                   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="table-responsive">
                      <table id="table_id" class="table table-bordered table-striped table-hover">
                         <thead>
                            <tr class="info">
                               <th>ID</th>
                               <th>Banner Name</th>
                               <th>Sort Order</th>
                               <th>Link</th>
                               <th>Image</th>
                               <th>Status</th>
                               <th>Action</th>

                            </tr>
                         </thead>
                         <tbody>
                           @foreach ($banners as $banner)
                           <tr>
                                <td>{{ $banner->id }}</td>
                                <td>{{ $banner->banner_name}}</td>
                                <td>{{ $banner->sort_order }}</td>
                                <td>{{ $banner->banner_link }}</td>
                                <td>
                                    @if (!empty($banner->banner_image))
                                        <img src="{{ asset($banner->banner_image) }}" class="img-circle" alt="{{ $banner->banner_name }}" width="100px">
                                    @else
                                        <img src="{{ asset('/uploads/no_image.png') }}" class="img-circle" alt="{{ $banner->banner_name }}" width="100px">
                                    @endif
                                </td>

                                <td>
                                    <input type="checkbox" class="BannerStatus" rel='{{ $banner->id }}' @if($banner->status == 1) checked  @endif data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
                                </td>
                                <td>
                                    <a href="{{ route('banners.edit',$banner->id) }}" class="btn btn-add btn-sm" title="Edit Banner"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('banners.show',$banner->id) }}" class="btn btn-add btn-sm" title="View Details"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('banners.delete',$banner->id) }}" class="btn btn-danger btn-sm" title="Delete Banner"><i class="fa fa-trash-o"></i> </a>
                                    {{-- <form id="delete_product" action="{{ route('banners.destroy',$banner->id) }}" method="POST" class="d-none">
                                        @method('DELETE')
                                        @csrf
                                    </form> --}}
                                </td>
                            </tr>
                           @endforeach
                         </tbody>
                      </table>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <!-- customer Modal1 -->
       {{-- <div class="modal fade" id="customer1" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
             <div class="modal-content">
                <div class="modal-header modal-header-primary">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                   <h3><i class="fa fa-user m-r-5"></i> Update Customer</h3>
                </div>
                <div class="modal-body">
                   <div class="row">
                      <div class="col-md-12">
                         <form class="form-horizontal">
                            <fieldset>
                               <!-- Text input-->
                               <div class="col-md-4 form-group">
                                  <label class="control-label">Customer Name:</label>
                                  <input type="text" placeholder="Customer Name" class="form-control">
                               </div>
                               <!-- Text input-->
                               <div class="col-md-4 form-group">
                                  <label class="control-label">Email:</label>
                                  <input type="email" placeholder="Email" class="form-control">
                               </div>
                               <!-- Text input-->
                               <div class="col-md-4 form-group">
                                  <label class="control-label">Mobile</label>
                                  <input type="number" placeholder="Mobile" class="form-control">
                               </div>
                               <div class="col-md-6 form-group">
                                  <label class="control-label">Address</label><br>
                                  <textarea name="address" rows="3"></textarea>
                               </div>
                               <div class="col-md-6 form-group">
                                  <label class="control-label">type</label>
                                  <input type="text" placeholder="type" class="form-control">
                               </div>
                               <div class="col-md-12 form-group user-form-group">
                                  <div class="pull-right">
                                     <button type="button" class="btn btn-danger btn-sm">Cancel</button>
                                     <button type="submit" class="btn btn-add btn-sm">Save</button>
                                  </div>
                               </div>
                            </fieldset>
                         </form>
                      </div>
                   </div>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                </div>
             </div>
             <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
       </div> --}}
       <!-- /.modal -->
       <!-- Modal -->
       <!-- Customer Modal2 -->
       {{-- <div class="modal fade" id="customer2" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
             <div class="modal-content">
                <div class="modal-header modal-header-primary">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                   <h3><i class="fa fa-user m-r-5"></i> Delete Customer</h3>
                </div>
                <div class="modal-body">
                   <div class="row">
                      <div class="col-md-12">
                         <form class="form-horizontal">
                            <fieldset>
                               <div class="col-md-12 form-group user-form-group">
                                  <label class="control-label">Delete Customer</label>
                                  <div class="pull-right">
                                     <button type="button" class="btn btn-danger btn-sm">NO</button>
                                     <button type="submit" class="btn btn-add btn-sm">YES</button>
                                  </div>
                               </div>
                            </fieldset>
                         </form>
                      </div>
                   </div>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                </div>
             </div>
             <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
       </div> --}}
       <!-- /.modal -->
    </section>
    <!-- /.content -->
 </div>
@endsection
