 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
      <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">BANMEXANH</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview {{request()->is ('admin') ? 'menu-open' :''}}">
            <a href="#" class="nav-link {{request()->is ('admin') ? 'active' :''}}">
              <i class="nav-icon fas fa-tachometer-alt "></i>
              <p>
                Trang Chủ
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin')}}" class="nav-link {{request()->is ('admin') ? 'active' :''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview {{request()->is ('addcategory') ? 'menu-open' :''}} {{request()->is ('categories') ? 'menu-open' :''}}">
            <a href="#" class="nav-link {{request()->is ('addcategory') ? 'active' :''}} {{request()->is ('categories') ? 'active' :''}}">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Danh Mục
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/addcategory')}}" class="nav-link {{request()->is ('addcategory') ? 'active' :''}}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Thêm Danh Mục</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/categories')}}" class="nav-link {{request()->is ('categories') ? 'active' :''}}">
                  <i class="far fa-file nav-icon"></i>
                  <p>DS Danh Mục</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{request()->is ('sliders') ? 'menu-open' :''}} {{request()->is ('addslider') ? 'menu-open' :''}}">
            <a href="#" class="nav-link {{request()->is ('sliders') ? 'active' :''}} {{request()->is ('addslider') ? 'active' :''}}">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Sliders
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/addslider')}}" class="nav-link {{request()->is ('addslider') ? 'active' :''}}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Thêm slider</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/sliders')}}" class="nav-link {{request()->is ('sliders') ? 'active' :''}}">
                  <i class="far fa-file nav-icon"></i>
                  <p>DS Slider</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{request()->is ('products') ? 'menu-open' :''}} {{request()->is ('addproducts') ? 'menu-open' :''}}">
            <a href="#" class="nav-link {{request()->is ('products') ? 'active' :''}} {{request()->is ('addproducts') ? 'active' :''}}">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Sản Phẩm
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/addproduct')}}" class="nav-link {{request()->is ('addproduct') ? 'active' :''}}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Thêm product</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/products')}}" class="nav-link {{request()->is ('products') ? 'active' :''}}">
                  <i class="far fa-file nav-icon"></i>
                  <p>DS Sản Phẩm</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{request()->is ('orders') ? 'menu-open' :''}}">
            <a href="#" class="nav-link {{request()->is ('orders') ? 'active' :''}}">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Đơn Hàng
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/orders')}}" class="nav-link {{request()->is ('orders') ? 'active' :''}}">
                  <i class="far fa-file nav-icon"></i>
                  <p>DS Đơn Hàng</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">Tham khảo</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0/" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>