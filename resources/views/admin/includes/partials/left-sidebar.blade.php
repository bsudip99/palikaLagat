<aside class="main-sidebar elevation-4 sidebar-light-lime">
  <!-- Brand Logo -->
  <a href="{{route('admin.dashboard')}}" class="brand-link text-center">
    <img src="{{asset('admin/assets/dist/img/nepal-logo.png')}}" alt="HDRS Logo" style="max-height: 40px;" class="img-circle elevation-3" style="opacity: .8">
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ isset(auth()->user()->pp_image) ? config('app.file_url').auth()->user()->pp_image : asset(config('constant.noUser')) }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{auth()->user()->name}}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-header">Dashboard</li>
        <li class="nav-item">
          <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        @if ( \Helper::hasPermission(['user-list','user-create']) )
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Users
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @if ( \Helper::hasPermission(['user-list']) )
            <li class="nav-item">
              <a href="{{route('user.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Users</p>
              </a>
            </li>
            @endif
            @if ( \Helper::hasPermission(['user-create']) )
            <li class="nav-item">
              <a href="{{route('user.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add User</p>
              </a>
            </li>
            @endif
          </ul>
        </li>
        @endif
        @if ( \Helper::hasPermission(['role-list','role-create']) )
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-key"></i>
            <p>
              Roles
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @if ( \Helper::hasPermission(['role-list']) )
            <li class="nav-item">
              <a href="{{route('roles.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Roles</p>
              </a>
            </li>
            @endif
            @if ( \Helper::hasPermission(['role-create']) )
            <li class="nav-item">
              <a href="{{route('roles.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Role</p>
              </a>
            </li>
            @endif
          </ul>
        </li>
        @endif
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>