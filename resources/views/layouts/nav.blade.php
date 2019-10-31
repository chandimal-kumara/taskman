<style>
.menu-items li a span { color:white; }
.menu-items li a span:hover { color:#D8DADC; }
</style>

<nav class="page-sidebar" data-pages="sidebar">
    <!-- BEGIN SIDEBAR MENU HEADER-->
    <div class="sidebar-header">
    <img src="{{ asset('assets/img/logo_white.png') }}" alt="logo" class="brand" data-src="{{ asset('assets/img/logo_white.png') }}" data-src-retina="{{ asset('assets/img/logo_white_2x.png') }}" width="78" height="22"> 
    <!-- <h5 style="color:white;"><b>Task Man</b></h5> -->
    <div class="sidebar-header-controls">
        <button type="button" class="btn btn-link hidden-md-down" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
        </button>
    </div>
    </div>
    <!-- END SIDEBAR MENU HEADER-->
    <!-- START SIDEBAR MENU -->
    <div class="sidebar-menu">
    <!-- BEGIN SIDEBAR MENU ITEMS-->
    <ul class="menu-items">
        <li class="m-t-30 ">
            <a href="{{ '/' }}" class="detailed">
                <span class="title">Dashboard</span>
                <!-- <span class="details">12 New Updates</span> -->
            </a>
            <span class="bg-success icon-thumbnail"><i class="pg-home"></i></span>
        </li>

        <li>
            <a href="#"><span class="title">Users</span>
            <span class="arrow"></span></a>
            <span class="icon-thumbnail"><i class="fa fa-users"></i></span>
            <ul class="sub-menu">
                <li class="">
                    <a href="#">Add User</a>
                    <span class="icon-thumbnail"><i class="fa fa-user-plus"></i></span>
                </li>
                <li class="">
                    <a href="#">User List</a>
                    <span class="icon-thumbnail"><i class="fa fa-address-book"></i></span>
                </li>
            </ul>
        </li>

        <li>
            <a href="#"><span class="title">Tasks</span>
            <span class="arrow"></span></a>
            <span class="icon-thumbnail"><i class="fa fa-tasks"></i></span>
            <ul class="sub-menu">
                <li class="">
                    <a href="{{ route('task.add_task') }}">Create Task</a>
                    <span class="icon-thumbnail"><i class="fa fa-plus-square"></i></span>
                </li>
                <li class="">
                    <a href="{{ route('task.tasks') }}">All Tasks</a>
                    <span class="icon-thumbnail"><i class="fa fa-list"></i></span>
                </li>
            </ul>
        </li>
        
    </ul>
    <div class="clearfix"></div>
    </div>
    <!-- END SIDEBAR MENU -->
</nav>