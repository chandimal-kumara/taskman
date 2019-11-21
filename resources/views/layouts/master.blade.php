<!DOCTYPE html>
<html>
  <head>
    <!-- BEGIN HEAD-->  
    @include('layouts.head')
    <!-- END HEAD-->
  </head>
  <body class="fixed-header sidebar-visible menu-pin">

    <!-- BEGIN SIDEBPANEL-->
    @include('layouts.nav')
    <!-- END SIDEBPANEL-->

    <!-- START PAGE-CONTAINER -->
    <div class="page-container ">

    <!-- START HEADER -->
    @include('layouts.header')
    <!-- END HEADER -->

    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper ">

        <!-- START PAGE CONTENT -->
        <div class="content">

          @yield('content')

        </div>
        <!-- END PAGE CONTENT -->
    
    @include('layouts.footer')
        <!-- END COPYRIGHT -->

      </div>
      <!-- END PAGE CONTENT WRAPPER -->

    </div>
    <!-- END PAGE CONTAINER -->

    @include('layouts.bottom')

    @yield('script')

  </body>
</html>