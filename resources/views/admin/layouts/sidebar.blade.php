<!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->
         <aside class="main-sidebar">
            <!-- sidebar -->
            <div class="sidebar">
               <!-- sidebar menu -->
               <ul class="sidebar-menu">
                  <li class="active">
                     <a href="index.html"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li class="treeview">
                    <a href="#">
                    <i class="fa fa-tasks"></i><span>Categories</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                       <li><a href="{{ route('categories.create') }}">Add Category</a></li>
                       <li><a href="{{ route('categories.index') }}">View Categories</a></li>
                    </ul>
                 </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-product-hunt"></i><span>Products</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{ route('products.create') }}">Add Product</a></li>
                        <li><a href="{{ route('products.index') }}">View Products</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                    <a href="#">
                    <i class="fa fa-tasks"></i><span>Banners</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                       <li><a href="{{ route('banners.create') }}">Add Banner</a></li>
                       <li><a href="{{ route('banners.index') }}">View Banners</a></li>
                    </ul>
                 </li>

               </ul>
            </div>
            <!-- /.sidebar -->
         </aside>
