<style>
    .menu-items li a span { color:white; }
    .menu-items li a span:hover { color:#D8DADC; }
    .title {  }
    .arrow {  }
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
        <ul class="menu-items scroll-content scroll-scrolly_visible">
            <li class="m-t-30 ">
                <a href="{{ '/' }}" class="detailed">
                    <span class="title">Dashboard</span>
                    <!-- <span class="details">12 New Updates</span> -->
                </a>
                <span class="bg-success icon-thumbnail"><i class="pg-home"></i></span>
            </li>

        @if(Auth::user()->id == 1)
            <li>
                <a href="#"><span class="title" style="width:100px;">Users</span>
                <span class="arrow" style="margin:0px;padding:2px;"></span></a>
                <span class="icon-thumbnail"><i class="fa fa-users"></i></span>
                <ul class="sub-menu">
                    <li class="">
                        <a href="{{ route('user.add_user') }}">Add User</a>
                        <span class="icon-thumbnail"><i class="fa fa-user-plus"></i></span>
                    </li>
                    <li class="">
                        <a href="{{ route('user.users') }}">User List</a>
                        <span class="icon-thumbnail"><i class="fa fa-address-book"></i></span>
                    </li>
                </ul>
            </li>
        @endif

            <li>
                <a href="#"><span class="title" style="width:100px;">Tasks</span>
                <span class="arrow" style="margin:0px;padding:2px;"></span></a>
                <span class="icon-thumbnail"><i class="fa fa-tasks"></i></span>
                <ul class="sub-menu">            
                    <li class="">
                        <a href="{{ route('task.new_tasks') }}">Manager View</a>
                        <span class="icon-thumbnail"><i class="fa fa-list"></i></span>
                    </li>
                    <li class="">
                        <a href="{{ route('task.assigned_tasks') }}">My View</a>
                        <span class="icon-thumbnail"><i class="fa fa-list"></i></span>
                    </li>
                    <li class="">
                        <a href="{{ route('task.all_tasks') }}">All Tasks</a>
                        <span class="icon-thumbnail"><i class="fa fa-list"></i></span>
                    </li>
                </ul>
            </li>  

            <li>
                <a href="#"><span class="title" style="width:100px;">Task Catagory</span>
                <span class="arrow" style="margin:0px;padding:2px;"></span></a>
                <span class="icon-thumbnail"><i class="fa fa-list-alt"></i></span>
                <ul class="sub-menu">            
                    <li class="">
                        <a href="{{ route('task_catagories.add_task_catagory') }}">Add Catagory</a>
                        <span class="icon-thumbnail"><i class="fa fa-plus-square"></i></span>
                    </li>
                    <li class="">
                        <a href="{{ route('task_catagories.task_catagories') }}">Task Catagories</a>
                        <span class="icon-thumbnail"><i class="fa fa-list-ul"></i></span>
                    </li>
                </ul>
            </li>  
        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- END SIDEBAR MENU -->
</nav>

