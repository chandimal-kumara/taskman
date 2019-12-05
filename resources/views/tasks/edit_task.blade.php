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
        <li class="breadcrumb-item link"><a href="#">Tasks</a></li>
        <li class="breadcrumb-item link active"><a href="#">Edit Tasks</a></li>
      </ol>
      <!-- END BREADCRUMB -->
    </div>
  </div>
</div>
<!-- END JUMBOTRON -->

<div class=" container-fluid   container-fixed-lg">
<!-- <h3><span class="semi-bold"  style="margin-left: 2%;">Tasks</span> Panel</h3>  -->
<div class="row box">
<div class="col-lg-1"></div>
<div class="card card-transparent col-lg-10 col-md-12">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-tabs-fillup">
    <li class="nav-item">
      <a href="#" class="active" data-toggle="tab" data-target="#slide1"><span>Edit Task</span></a>
    </li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane slide-left active" id="slide1">
      <div class=" container-fluid container-fixed-lg">
        <!-- START card -->
        @if(session()->get('error'))
        <div class="alert alert-danger" role="alert">
            <button class="close" data-dismiss="alert"></button>
            <strong>Error: </strong>
            {{ session()->get('error') }}  
        </div>
        @endif

        <form method="post" action="{{ route('task.update_task', $tasks->id) }}">
        {{csrf_field()}}
        @method('PUT')
          <div class="row clearfix">         
            <div class="col-md-5">
              <div class="form-group form-group-default required @error('title') has-error @enderror">
                <label>Title</label>
                <input type="text" value="{{ $tasks->title }}" class="form-control" name="title" placeholder="Enter Task Title here" required>
                @error('title')<small id="ageHelp" class="text-danger">{{ $message }}</small>@enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group form-group-default form-group-default-select2 required @error('department') has-error @enderror">
                <label>Department</label>
                <select name="department" class="full-width" data-placeholder="Select Type" data-init-plugin="select2">
                  <option value="Choose...">---- Choose ----</option><!--selected by default-->   
                    @foreach($departments as $department)
                      <option value="{{ $department->id }}"  @if ($tasks->department == $department->id) selected @endif > {{ $department->dep_id }} </option>
                    @endforeach
                </select>
                @error('department')<small id="ageHelp" class="text-danger">{{ $message }}</small>@enderror
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group form-group-default required @error('title') has-error @enderror">
                <label>Task Code</label>
                <input style="color:gray;" type="text" value="{{ $tasks->task_code }}" class="form-control" name="task_code" readonly>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-5">                              
              <div class="form-group form-group-default form-group-default-select2 required  @error('type') has-error @enderror">
                <label class="">Type</label>
                <select name="type" class="full-width" data-placeholder="Select Type" data-init-plugin="select2">
                  <option value="Choose...">---- Choose ----</option><!--selected by default-->   
                    @foreach($types as $type)
                        <option value="{{ $type->code }}"  @if ($tasks->type == $type->code) selected @endif > {{ $type->name }} </option>
                    @endforeach
                </select>
                @error('type')<small id="ageHelp" class="text-danger">{{ $message }}</small>@enderror
              </div>              
            </div>
            
            <div class="col-md-4">
              <div class="form-group form-group-default form-group-default-select2 required @error('priority') has-error @enderror">
                <label>Priority</label>            
                <select class="full-width" name="priority" data-placeholder="Select Priority" data-init-plugin="select2">                                        
                  <option value="LW" @if ($tasks->priority == 'LW') selected @endif>Low</option>
                  <option value="MD" @if ($tasks->priority == 'MD') selected @endif>Medium</option>                                                
                  <option value="HG" @if ($tasks->priority == 'HG') selected @endif>High</option>                
                </select>
                @error('priority')<small id="ageHelp" class="text-danger">{{ $message }}</small>@enderror
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group form-group-default required @error('hours') has-error @enderror">
                <label>Estimated Hours</label>
                <input type="number" class="form-control" value="{{ $tasks->estimated_hours }}" name="hours" placeholder="Enter Estimated Hours" required>
                @error('hours')<small id="ageHelp" class="text-danger">{{ $message }}</small>@enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group form-group-default required @error('description') has-error @enderror">
                <label>Description</label>
                <textarea class="form-control" style="height:60px;" name="description" id="description" placeholder="Briefly Describe about your Task" required>{{ $tasks->description }}</textarea>
                @error('description')<small id="ageHelp" class="text-danger">{{ $message }}</small>@enderror
              </div>
            </div>
          </div>
          
          <p class="pull-left"></p>
          <div class="clearfix"></div>
          <button class="btn btn-primary" type="submit">Save Changes</button>
          <a class="btn btn-complete" href="{{ URL::previous() }}">Go Back</a>
        </form>
        <!-- END card -->
      </div>  
    </div>
    </div>
    </div>  
  </div>
  <div class="col-lg-1"></div>
</div>

@endsection
