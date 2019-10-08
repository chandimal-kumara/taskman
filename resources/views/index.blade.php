@extends('layouts.master')

@section('content')
<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
  <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="inner">
      <!-- START BREADCRUMB -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
      <!-- END BREADCRUMB -->
    </div>
  </div>
</div>
<!-- END JUMBOTRON -->
<!-- START CONTAINER FLUID -->
<div class=" container-fluid   container-fixed-lg" class="bg"> 
    
  <!-- BEGIN PlACE PAGE CONTENT HERE -->

  <div class="card card-transparent" >
    <div class="card-block" style="padding:0;">
      <div class="alert alert-info" role="alert">
        <p class="pull-left">Meeting rescheduled</p>
        <button class="close" data-dismiss="alert"></button>
        <div class="clearfix"></div>
        <br>
        <p>The STG Meeting has been resheduled to the following date : 2014-12-17</p>
        <br>
        <p>Please complete the attendance form to confirm your attendance</p>
        <a href="#">see more...</a>
      </div>
    </div>
  </div>
  
  <div class="row"  style="margin:0;">
  
    <div class="col-lg-4 col-xl-3 col-xlg-2 card-block" style="padding:2px;">
      <div class="widget-8 card no-border bg-success no-margin widget-loader-bar">
        <div class="container-xs-height full-height">
          <div class="row-xs-height">
            <div class="col-xs-height col-top">
              <div class="card-header  top-left top-right">
                <div class="card-title text-black hint-text">
                  <span class="font-montserrat fs-11 all-caps">Weekly Sales <i class="fa fa-chevron-right"></i></span>
                </div>
                <div class="card-controls">
                  <ul>
                    <li>
                      <a data-toggle="refresh" class="card-refresh text-black" href="#"><i class="card-icon card-icon-refresh"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row-xs-height ">
            <div class="col-xs-height col-top relative">
              <div class="row">
                <div class="col-sm-6">
                  <div class="p-l-20">
                    <h3 class="no-margin p-b-5 text-white">$14,000</h3>
                    <p class="small hint-text m-t-5">
                      <span class="label  font-montserrat m-r-5">60%</span>Higher
                    </p>
                  </div>
                </div>
                <div class="col-sm-6">
                </div>
              </div>
              <div class='widget-8-chart line-chart' data-line-color="black" data-points="true" data-point-color="success" data-stroke-width="2">
                <svg></svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
  
    <div class="col-lg-4 col-xl-3 col-xlg-2 card-block" style="padding:2px;">
      <div class="widget-8 card no-border bg-primary no-margin widget-loader-bar">
        <div class="full-height d-flex flex-column">
          <div class="card-header ">
            <div class="card-title text-black">
              <span class="font-montserrat fs-11 all-caps">Weekly Sales <i class="fa fa-chevron-right"></i></span>
            </div>
            <div class="card-controls">
              <ul>
                <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i class="card-icon card-icon-refresh"></i></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="p-l-20">
            <h3 class="no-margin p-b-5 text-white">$23,000</h3>
            <a href="#" class="btn-circle-arrow text-white"><i class="pg-arrow_minimize"></i></a>
            <span class="small hint-text text-white">65% lower than last month</span>
          </div>
          <div class="mt-auto">
            <div class="progress progress-small m-b-20">
              <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
              <div class="progress-bar progress-bar-white" style="width:45%"></div>
              <!-- END BOOTSTRAP PROGRESS -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-xl-3 col-xlg-2 card-block" style="padding:2px;">
      <div class="widget-8 card no-border bg-success no-margin widget-loader-bar">
        <div class="container-xs-height full-height">
          <div class="row-xs-height">
            <div class="col-xs-height col-top">
              <div class="card-header  top-left top-right">
                <div class="card-title text-black hint-text">
                  <span class="font-montserrat fs-11 all-caps">Weekly Sales <i class="fa fa-chevron-right"></i></span>
                </div>
                <div class="card-controls">
                  <ul>
                    <li>
                      <a data-toggle="refresh" class="card-refresh text-black" href="#"><i class="card-icon card-icon-refresh"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row-xs-height ">
            <div class="col-xs-height col-top relative">
              <div class="row">
                <div class="col-sm-6">
                  <div class="p-l-20">
                    <h3 class="no-margin p-b-5 text-white">$14,000</h3>
                    <p class="small hint-text m-t-5">
                      <span class="label  font-montserrat m-r-5">60%</span>Higher
                    </p>
                  </div>
                </div>
                <div class="col-sm-6">
                </div>
              </div>
              <div class='widget-8-chart line-chart' data-line-color="black" data-points="true" data-point-color="success" data-stroke-width="2">
                <svg></svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-xl-3 col-xlg-2 card-block" style="padding:2px;">
      <div class="widget-8 card no-border bg-primary no-margin widget-loader-bar">
        <div class="full-height d-flex flex-column">
          <div class="card-header ">
            <div class="card-title text-black">
              <span class="font-montserrat fs-11 all-caps">Weekly Sales <i class="fa fa-chevron-right"></i></span>
            </div>
            <div class="card-controls">
              <ul>
                <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i class="card-icon card-icon-refresh"></i></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="p-l-20">
            <h3 class="no-margin p-b-5 text-white">$23,000</h3>
            <a href="#" class="btn-circle-arrow text-white"><i class="pg-arrow_minimize"></i></a>
            <span class="small hint-text text-white">65% lower than last month</span>
          </div>
          <div class="mt-auto">
            <div class="progress progress-small m-b-20">
              <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
              <div class="progress-bar progress-bar-white" style="width:45%"></div>
              <!-- END BOOTSTRAP PROGRESS -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>                    
  <!-- END PLACE PAGE CONTENT HERE -->
</div>
<!-- END CONTAINER FLUID -->
@endsection