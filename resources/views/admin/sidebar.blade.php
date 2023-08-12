<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="index.html"><img src="images/loko.jpg" alt="logo" /></a>
    <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="images/logomini.jpg" alt="logo" /></a>
  </div>
  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle " src="images/gg.jpg" alt="">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal">Suzanna Sapkota</h5>
            <span>Admin</span>
          </div>
        </div>
      </div>
    </li>
    
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{route('dashboard')}}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/view_product')}}">
        <span class="menu-icon">
          <i class="mdi mdi-laptop"></i>
        </span>
        <span class="menu-title">Products</span>
      </a>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('view_category')}}">
        <span class="menu-icon">
          <i class="mdi mdi-playlist-play"></i>
        </span>
        <span class="menu-title">Category</span>
      </a>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="{{route('order.index')}}">
        <span class="menu-icon">
        <i class="mdi mdi-package"></i>
        </span>
        <span class="menu-title">Orders</span>
      </a>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="{{route('admin.admins')}}">
        <span class="menu-icon">
        <i class="mdi mdi-package"></i>
        </span>
        <span class="menu-title">Admins</span>
      </a>
    </li>
  </ul>
</nav>