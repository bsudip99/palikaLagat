<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{route('admin.dashboard')}}" class="nav-link">{{ config('app.name') }}</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" id="mark-all" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-danger navbar-badge" id="unread-notification-count">{{ count($notifications->where('read_at',null))}}</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="all-notifications">
        @foreach($notifications as $notification )
        <a href="#" class="dropdown-item notification-item" @if(!$notification->read_at) style="background: #d1c9c9a6;" @endif>
          <!-- Notification Start -->
          <div class="media">
            <div class="media-body">
              <p class="text-sm">{{$notification->data['expires'] }}</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ (\Carbon\Carbon::parse(\Carbon\Carbon::now())->diffInDays($notification->created_at) < 10) ? $notification->created_at->diffForHumans() : $notification->created_at->format('d M, Y') }}</p>
            </div>
          </div>
          <!-- Notification End -->
        </a>
        @endforeach
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All</a>
      </div>
    </li>

    <!-- User Profile Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#" title="Settings">
        <i class="fas fa-cog"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-user mr-2"></i> User profile
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{route('admin.logout')}}" class="dropdown-item">
          <i class="fas fa-sign-out-alt mr-2"></i> Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
