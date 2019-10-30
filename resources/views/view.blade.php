@extends('layouts.master')

@section('content')

<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
  <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="inner">
      <!-- START BREADCRUMB -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active">View Task</li>
      </ol>
      <!-- END BREADCRUMB -->
    </div>
  </div>
</div>
<!-- END JUMBOTRON -->

<div class=" container-fluid   container-fixed-lg">
<h3><span class="semi-bold"  style="margin-left: 2%;">Tasks</span> Panel</h3><br>
            <!-- START card -->
    <div class="card card-transparent">
    <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
        <li class="nav-item">
            <a href="#" class="active" data-toggle="tab" data-target="#slide1"><span>View Task</span></a>
        </li>
    </ul> 
  <div class="tab-content">
    <div class="tab-pane slide-left active" id="slide1">
      <div class=" container-fluid container-fixed-lg">
        <!-- START card -->
        <form method="post" action="{{ '/add' }}">
        {{csrf_field()}}
          <div class="row clearfix">         
            <div class="col-md-12">
                <p class="bold sm-p-t-20">Title</p>
                <p>{{ $tasks->title }}</p>
            </div>
          </div><br>
          <div class="row">
            <div class="col-md-5">                              
                <p class="bold sm-p-t-20">Type</p>
                @foreach($types as $type)
                        <p>@if ($tasks->type == $type->code) {{$type->name}} @endif</p> 
                @endforeach         
            </div>
            <div class="col-md-5">
                <p class="bold sm-p-t-20">Priority</p>
                <p>@if ($tasks->priority == 'LW') low @endif @if ($tasks->priority == 'MD') Medium @endif @if ($tasks->priority == 'HG') High @endif</p> 
            </div>
            <div class="col-md-2">
                <p class="bold sm-p-t-20">Estimated Hours</p>
                <p>{{ $tasks->estimated_hours }}</p> 
            </div>
          </div><br>
          <div class="row">
            <div class="col-md-12">
                <p class="bold sm-p-t-20">Description</p>
                <p>{{ $tasks->description }}</p> 
            </div>
          </div><br>
          <div class="row">
            <div class="col-md-12">
                <p class="bold sm-p-t-20">Content</p>
                <p>{{ $tasks->content }}</p> 
            </div>
          </div><br>
          <p class="pull-left"></p>
          <div class="clearfix"></div>
          <button class="btn btn-primary" type="submit">Edit Task</button>
          <a class="btn btn-complete" href="{{ URL::previous() }}">Go Back</a>
        </form>
        <!-- END card -->
      </div>  
    </div>
  </div>
</div>
<!-- END card -->

@endsection