@extends('layouts.master')

@section('content')

@include('custom/css')

<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
  <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="inner">
      <!-- START BREADCRUMB -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item link"><a href="{{ route('task_catagories.task_catagories') }}">Task Catagories</a></li>
        <li class="breadcrumb-item active link"><a href="{{ route('task_catagories.add_task_catagory') }}">Add Task Catagory</a></li>
      </ol>
      <!-- END BREADCRUMB -->
    </div>
  </div>
</div>
<!-- END JUMBOTRON -->

<div class="container-fluid box container-fixed-lg">
    <div class="row">
        <div class="col-lg-2"></div>
        <!-- START card -->
        <div class="card card-transparent col-lg-8 col-md-12">
        <!-- Nav tabs -->
          <ul class="nav nav-tabs nav-tabs-fillup">
            <li class="nav-item">
              <a href="#" class="active" data-toggle="tab" data-target="#slide1"><span>Add Task Catagory</span></a>
            </li>
          </ul>
          <div class="tab-content col-xl-12 col-lg-12">
              <!-- START card -->
              <div class="card card-transparent">
                <div class="card-block">

                  @if(session()->get('error'))
                      <div class="alert alert-danger message" role="alert">
                          <button class="close" data-dismiss="alert"></button>
                          <strong>Error: </strong>
                          {{ session()->get('error') }}  
                      </div>
                  @endif

                  <form method="post" action="{{ route('task_catagories.save_task_catagory') }}">
                    {{csrf_field()}}
                    <div class="row clearfix">
                      <div class="col-md-2">
                        <div class="form-group form-group-default required @error('code') has-error @enderror" aria-required="true">
                          <label>Task Code</label>
                          <input type="text" value="{{ old('code') }}" class="form-control" name="code"  placeholder="Enter code here">
                          @error('code')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group form-group-default required @error('name') has-error @enderror">
                          <label>Name</label>
                          <input type="text" value="{{ old('name') }}" class="form-control" name="name"  placeholder="Enter name here">                          
                          @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group form-group-default required @error('description') has-error @enderror">
                          <label>Description</label>
                          <input type="text" value="{{ old('description') }}" class="form-control" name="description"  placeholder="Enter description here">                          
                          @error('description')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                      </div>
                    </div>
                      <br>
                    <div class="clearfix"></div>
                    <button class="btn btn-primary" type="submit">Create Catagory</button>
                    <a class="btn btn-complete" href="{{ URL::previous() }}">Go Back</a>
                  </form>
                </div>
              </div>
              <!-- END card -->
            </div>
          </div>
        <!-- END card -->
        <div class="col-lg-2"></div>
    </div>
</div>

@include('custom/js')

@endsection