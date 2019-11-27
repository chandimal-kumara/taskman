@extends('layouts.master')

@section('content')

<style>
  .box { margin:5px; }
  .link a { color:blue; }
  .link a:hover { color:#6DC0F9; }
</style>

<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
  <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="inner">
      <!-- START BREADCRUMB -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item link active"><a href="{{ route('task.index') }}">Dashboard</a></li>
      </ol>
      <!-- END BREADCRUMB -->
    </div>
  </div>
</div>
<!-- END JUMBOTRON -->
<!-- START CONTAINER FLUID -->
<div class=" container-fluid   container-fixed-lg" class="bg"> 
    
  <!-- BEGIN PlACE PAGE CONTENT HERE -->

  <div class="card card-transparent" id="alert">
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
  
  <div class="row">
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
      <div class="row" style="margin:0;">

        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 col-xlg-6 card-block box-p" style="padding:2px;">
        <div class="widget-8 card no-border bg-primary no-margin widget-loader-bar">
            <div class="full-height d-flex flex-column">
              <div class="card-header ">
                <div class="card-title text-black">
                  <span class="font-montserrat fs-11 all-caps">CREATED NOT ASSIGNED <i class="fa fa-chevron-right"></i></span>
                </div>
                <div class="card-controls">
                  <ul>
                    <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i class="card-icon card-icon-refresh"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-l-20">
                <h3 class="no-margin p-b-5 text-white">CREATED TASKS ({{$created}})</h3>
                  <p class="small hint-text m-t-5">
                    <span class="label  font-montserrat m-r-5">{{ floor($created / $tasks * 100) }}%</span>
                  </p>
              </div>
              <div class="mt-auto">
                <div class="progress progress-small m-b-20">
                  <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                  <div class="progress-bar progress-bar-white" style="width:{{ $created / $tasks * 100 }}%"></div>
                  <!-- END BOOTSTRAP PROGRESS -->
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-xl-6 col-md-6 col-xlg-6 col-sm-12 card-block" style="padding:2px;">
          <div class="widget-8 card no-border bg-warning no-margin widget-loader-bar">
            <div class="full-height d-flex flex-column">
              <div class="card-header ">
                <div class="card-title text-black">
                  <span class="font-montserrat fs-11 all-caps">PENDING FOR ACTION<i class="fa fa-chevron-right"></i></span>
                </div>
                <div class="card-controls">
                  <ul>
                    <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i class="card-icon card-icon-refresh"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-l-20">
                <h3 class="no-margin p-b-5 text-white">PENDING TASKS ({{$pending}})</h3>
                  <p class="small hint-text m-t-5">
                    <span class="label  font-montserrat m-r-5">{{ floor($pending / $tasks * 100) }}%</span>
                  </p>
              </div>
              <div class="mt-auto">
                <div class="progress progress-small m-b-20">
                  <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                  <div class="progress-bar progress-bar-white" style="width:{{ $pending / $tasks * 100 }}%"></div>
                  <!-- END BOOTSTRAP PROGRESS -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="row" style="margin:0;">

        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 col-xlg-6 card-block " style="padding:2px;">
        <div class="widget-8 card no-border bg-complete no-margin widget-loader-bar">
            <div class="full-height d-flex flex-column">
              <div class="card-header ">
                <div class="card-title text-black">
                  <span class="font-montserrat fs-11 all-caps">USER ACCEPTED WORKING IN PROGRESS <i class="fa fa-chevron-right"></i></span>
                </div>
                <div class="card-controls">
                  <ul>
                    <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i class="card-icon card-icon-refresh"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-l-20">
                <h3 class="no-margin p-b-5 text-white">WORKING TASKS ({{$active}})</h3>
                  <p class="small hint-text m-t-5">
                    <span class="label  font-montserrat m-r-5">{{ floor($active / $tasks * 100) }}%</span>
                  </p>
              </div>
              <div class="mt-auto">
                <div class="progress progress-small m-b-20">
                  <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                  <div class="progress-bar progress-bar-white" style="width:{{ $active / $tasks * 100 }}%"></div>
                  <!-- END BOOTSTRAP PROGRESS -->
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-xl-6 col-md-6 col-xlg-6 col-sm-12 card-block " style="padding:2px;">
        <div class="widget-8 card no-border bg-success no-margin widget-loader-bar">
            <div class="full-height d-flex flex-column">
              <div class="card-header ">
                <div class="card-title text-black">
                  <span class="font-montserrat fs-11 all-caps">ALL COMPLETED TASKS <i class="fa fa-chevron-right"></i></span>
                </div>
                <div class="card-controls">
                  <ul>
                    <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i class="card-icon card-icon-refresh"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-l-20">
                <h3 class="no-margin p-b-5 text-white">COMPLETED TASKS ({{$completed}})</h3>
                  <p class="small hint-text m-t-5">
                    <span class="label  font-montserrat m-r-5">{{ floor($completed / $tasks * 100) }}%</span>
                  </p>
              </div>
              <div class="mt-auto">
                <div class="progress progress-small m-b-20">
                  <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                  <div class="progress-bar progress-bar-white" style="width:{{ $completed / $tasks * 100 }}%"></div>
                  <!-- END BOOTSTRAP PROGRESS -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="row" style="margin:0;">

        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 col-xlg-6 card-block " style="padding:2px;">
        <div class="widget-8 card no-border bg-master no-margin widget-loader-bar">
            <div class="full-height d-flex flex-column">
              <div class="card-header ">
                <div class="card-title text-black">
                  <span class="font-montserrat fs-11 all-caps">USER ONHOLD TASKS <i class="fa fa-chevron-right"></i></span>
                </div>
                <div class="card-controls">
                  <ul>
                    <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i class="card-icon card-icon-refresh"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-l-20">
                <h3 class="no-margin p-b-5 text-white">ONHOLD TASKS ({{$onhold}})</h3>
                  <p class="small hint-text m-t-5">
                    <span class="label  font-montserrat m-r-5">{{ floor($onhold / $tasks * 100) }}%</span>
                  </p>
              </div>
              <div class="mt-auto">
                <div class="progress progress-small m-b-20">
                  <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                  <div class="progress-bar progress-bar-white" style="width:{{ $active / $tasks * 100 }}%"></div>
                  <!-- END BOOTSTRAP PROGRESS -->
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-xl-6 col-md-6 col-xlg-6 col-sm-12 card-block " style="padding:2px;">
        <div class="widget-8 card no-border bg-info no-margin widget-loader-bar">
            <div class="full-height d-flex flex-column">
              <div class="card-header ">
                <div class="card-title text-black">
                  <span class="font-montserrat fs-11 all-caps">ALL REJECTED TASKS <i class="fa fa-chevron-right"></i></span>
                </div>
                <div class="card-controls">
                  <ul>
                    <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i class="card-icon card-icon-refresh"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-l-20">
                <h3 class="no-margin p-b-5 text-white">REJECTED TASKS ({{$rejected}})</h3>
                  <p class="small hint-text m-t-5">
                    <span class="label  font-montserrat m-r-5">{{ floor($rejected / $tasks * 100) }}%</span>
                  </p>
              </div>
              <div class="mt-auto">
                <div class="progress progress-small m-b-20">
                  <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                  <div class="progress-bar progress-bar-white" style="width:{{ $active / $tasks * 100 }}%"></div>
                  <!-- END BOOTSTRAP PROGRESS -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">


  <!-- START WIDGET widget_weatherWidget-->         
      <div class="widget-17 card  no-border no-margin widget-loader-circle">
        <div class="card-header ">
          <div class="card-title">
            <i class="pg-map"></i>           
              Srilanka , Colombo
            <span class="caret"></span>
          </div>
        </div>
        <div class="card-block">
          <div class="p-l-5">
            <div class="row">
              <div class="col-lg-12 col-xlg-6">
                <div class="row m-t-20">
                  <div class="col-lg-5">
                    <h4 class="no-margin">{{date("l")}}</h4>
                    <p class="small hint-text">{{date("Y/m/d")}}</p>
                  </div>
                  <div class="col-lg-7">
                    <div class="pull-left">
                      <p class="small hint-text no-margin">Currently</p>
                      <h4 class="text-danger bold no-margin">32°<span class="small">/ 30C</span></h4>
                    </div>
                    <div class="pull-right">
                      <canvas height="64" width="64" class="clear-day"></canvas>
                    </div>
                  </div>
                </div>
                <h5>Feels like<span class="semi-bold">rainy</span></h5>
                <p>Weather information</p>
                <div class="widget-17-weather">
                  <div class="row">
                    <div class="col-6 p-r-10">
                      <div class="row">
                        <div class="col-lg-12">
                          <p class="pull-left">Wind</p>
                          <p class="pull-right bold">11km/h</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <p class="pull-left">Sunrise</p>
                          <p class="pull-right bold">05:20</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <p class="pull-left">Humidity</p>
                          <p class="pull-right bold">20%</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <p class="pull-left">Precipitation</p>
                          <p class="pull-right bold">60%</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 p-l-10">
                      <div class="row">
                        <div class="col-lg-12">
                          <p class="pull-left">Sunset</p>
                          <p class="pull-right bold">21:05</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <p class="pull-left">Visibility</p>
                          <p class="pull-right bold">21km</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row m-t-10 timeslot">
                  <div class="col-2 p-t-10 text-center">
                    <p class="small">13:30</p>
                    <canvas height="25" width="25" class="partly-cloudy-day"></canvas>
                    <p class="text-danger bold">30°C</p>
                  </div>
                  <div class="col-2 p-t-10 text-center">
                    <p class="small">14:00</p>
                    <canvas height="25" width="25" class="cloudy"></canvas>
                    <p class="text-danger bold">30°C</p>
                  </div>
                  <div class="col-2 p-t-10 text-center">
                    <p class="small">14:30</p>
                    <canvas height="25" width="25" class="rain"></canvas>
                    <p class="text-danger bold">30°C</p>
                  </div>
                  <div class="col-2 p-t-10 text-center">
                    <p class="small">15:00</p>
                    <canvas height="25" width="25" class="sleet"></canvas>
                    <p class="text-danger bold">30°C</p>
                  </div>
                  <div class="col-2 p-t-10 text-center">
                    <p class="small">15:30</p>
                    <canvas height="25" width="25" class="snow"></canvas>
                    <p class="text-danger bold">30°C</p>
                  </div>
                  <div class="col-2 p-t-10 text-center">
                    <p class="small">16:00</p>
                    <canvas height="25" width="25" class="wind"></canvas>
                    <p class="text-danger bold">30°C</p>
                  </div>
                </div>
              </div>
              <div class="col-xlg-6 visible-xlg">
                <div class="row">
                  <div class="forecast-day col-lg-6 text-center m-t-10 ">
                    <div class="bg-master-lightest p-b-10 p-t-10">
                      <h4 class="p-t-10 no-margin">Tuesday</h4>
                      <p class="small hint-text m-b-20">11th Augest 2014</p>
                      <canvas class="rain" width="64" height="64"></canvas>
                      <h5 class="text-danger">32°</h5>
                      <p>Feels like
                        <span class="bold">sunny</span>
                      </p>
                      <p class="small">Wind
                        <span class="bold p-l-20">11km/h</span>
                      </p>
                      <div class="m-t-20 block">
                        <div class="padding-10">
                          <div class="row">
                            <div class="col-lg-6 text-center">
                              <p class="small">Noon</p>
                              <canvas class="sleet" width="25" height="25"></canvas>
                              <p class="text-danger bold">30°C</p>
                            </div>
                            <div class="col-lg-6 text-center">
                              <p class="small">Night</p>
                              <canvas class="wind" width="25" height="25"></canvas>
                              <p class="text-danger bold">30°C</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 text-center m-t-10 ">
                    <div class="bg-master-lightest p-b-10 p-t-10">
                      <h4 class="p-t-10 no-margin">Wednesday</h4>
                      <p class="small hint-text m-b-20">11th Augest 2014</p>
                      <canvas class="rain" width="64" height="64"></canvas>
                      <h5 class="text-danger">32°</h5>
                      <p>Feels like
                        <span class="bold">sunny</span>
                      </p>
                      <p class="small">Wind
                        <span class="bold p-l-20">11km/h</span>
                      </p>
                      <div class="m-t-20 block">
                        <div class="padding-10">
                          <div class="row">
                            <div class="col-lg-6 text-center">
                              <p class="small">Noon</p>
                              <canvas class="sleet" width="25" height="25"></canvas>
                              <p class="text-danger bold">30°C</p>
                            </div>
                            <div class="col-lg-6 text-center">
                              <p class="small">Night</p>
                              <canvas class="wind" width="25" height="25"></canvas>
                              <p class="text-danger bold">30°C</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>           
        <!-- END WIDGET -->
    </div>
  </div>
  <!-- END PLACE PAGE CONTENT HERE -->
</div>
<!-- END CONTAINER FLUID -->
@endsection

@section('script')

<script type="text/javascript">

window.setTimeout(function() {
    $("#alert").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 5000);

</script>

@endsection

