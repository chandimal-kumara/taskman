<div class="header">
  <!-- START MOBILE SIDEBAR TOGGLE -->
  <a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-menu" data-toggle="sidebar">
  </a>
  <!-- END MOBILE SIDEBAR TOGGLE -->
  <div class="">
    <div class="brand inline">
      <!-- <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22"> -->
      <h4><b>Task Man</b></h4>
    </div>          
  </div>
  <div class="d-flex align-items-center">
    <!-- START User Info-->
    <div class="pull-left p-r-10 fs-14 font-heading hidden-md-down">
      <span class="semi-bold">{{ Str::title(Auth::user()->name) }}</span>
    </div>
    <div class="dropdown pull-right hidden-md-down">
      <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="thumbnail-wrapper d32 circular inline">
        <!-- <img src="{{ asset('assets/img/profiles/admin.png') }}" alt="" data-src="{{ asset('assets/img/profiles/admin.png') }}" data-src-retina="{{ asset('assets/img/profiles/admin_small.png') }}" width="32" height="32"> -->
        <img src="/assets/img/profiles/{{Auth::user()->type}}.png" alt="user-profile-pic" data-src="/assets/img/profiles/{{Auth::user()->type}}.png" data-src-retina="/assets/img/profiles/{{Auth::user()->type}}_small.png" width="32" height="32">
        </span>
      </button>
      <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">

   <!--      <a href="#" class="dropdown-item"><i class="pg-settings_small"></i> Settings</a>
        <a href="{{ route('user.add_user') }}" class="dropdown-item"><i class="fa fa-user-plus"></i> Add User</a>
        <a href="{{ route('user.users') }}" class="dropdown-item"><i class="fa fa-address-book"></i> Users</a> -->
        
        <a href="{{ route('logout') }}" class="clearfix bg-master-lighter dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          <span class="pull-left">Logout</span>
          <span class="pull-right"><i class="pg-power"></i></span>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </a>
      </div>
    </div>
    <!-- END User Info-->
  </div>
</div>