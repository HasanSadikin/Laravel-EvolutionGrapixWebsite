<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item {{Request::is('admin/dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="{{url('admin/dashboard')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item {{Request::is('admin/orders*') ? 'active' : ''}}">
        <a class="nav-link" href="{{url('admin/orders')}}">
          <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Sales</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">UI Elements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div>
      </li> --}}
      <li class="nav-item {{Request::is('admin/brands*') ? 'active' : ''}}">
        <a class="nav-link" href="{{url('admin/brands')}}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Brands</span>
        </a>
      </li>
      <li class="nav-item {{Request::is('admin/category*') ? 'active' : ''}}">
        <a class="nav-link" href="{{url('admin/category')}}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Categories</span>
        </a>
      </li>
      <li class="nav-item {{Request::is('admin/products*') ? 'active' : ''}}">
        <a class="nav-link" href="{{url('admin/products')}}">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">Products</span>
        </a>
      </li>
      <li class="nav-item {{Request::is('admin/services*') ? 'active' : ''}}">
        <a class="nav-link" href="{{url('admin/services')}}">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">Services</span>
        </a>
      </li>
      <li class="nav-item {{Request::is('admin/sliders*') ? 'active' : ''}}">
        <a class="nav-link" href="{{url('admin/sliders')}}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Sliders</span>
        </a>
      </li>
      <li class="nav-item {{Request::is('admin/users*') ? 'active' : ''}}">
        <a class="nav-link" href="{{url('admin/users')}}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Users</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
          </ul>
        </div>
      </li> --}}
      <li class="nav-item {{Request::is('admin/settings') ? 'active' : ''}}">
        <a class="nav-link" href="{{url('admin/settings')}}">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Site Settings</span>
        </a>
      </li>
    </ul>
  </nav>