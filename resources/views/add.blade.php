@extends('layouts.master')

@section('content')

<style>
  .has-error { background-color: rgba(245, 87, 83, 0.1);}
</style>

<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
  <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="inner">
      <!-- START BREADCRUMB -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active">Add Tasks</li>
      </ol>
      <!-- END BREADCRUMB -->
    </div>
  </div>
</div>
<!-- END JUMBOTRON -->

<div class=" container-fluid   container-fixed-lg">
<h3 style="margin-left:10px;"><span class="semi-bold">Tasks</span> Control</h3> 
<br>

<div class="card card-transparent ">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
    <li class="nav-item">
      <a href="#" class="active" data-toggle="tab" data-target="#slide1"><span>Add Task</span></a>
    </li>
    <li class="nav-item">
      <a href="#" data-toggle="tab" data-target="#slide2"><span>Edit Task</span></a>
    </li>
    <li class="nav-item">
      <a href="#" data-toggle="tab" data-target="#slide3"><span>View Task</span></a>
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

        <form method="post" action="{{ '/add' }}">
        {{csrf_field()}}
          <div class="row clearfix">         
            <div class="col-md-12">
              <div class="form-group form-group-default required @error('title') has-error @enderror">
                <label>Title</label>
                <input type="text" value="{{ old('title') }}" class="form-control" name="title" placeholder="Enter Task Title here" required>
                @error('title')<small id="ageHelp" class="text-danger">{{ $message }}</small>@enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-5">                              
              <div class="form-group form-group-default form-group-default-select2 required  @error('type') has-error @enderror">
                <label class="">Type</label>
                <select class="full-width" name="type" data-placeholder="Select Type" data-init-plugin="select2">                      
                  <option value="Choose...">---- Choose ----</option>
                  <option value="WEB" @if(old('type') == 'WEB') selected @endif>Web Development</option>
                  <option value="SFT" @if(old('type') == 'SFT') selected @endif>Softwear Development</option>                                                
                  <option value="NET" @if(old('type') == 'NET') selected @endif>Network Administration</option>
                  <option value="HRD" @if(old('type') == 'HRD') selected @endif>Computer Hardwear</option>
                  <option value="SEQ" @if(old('type') == 'SEQ') selected @endif>Internet Security</option>
                  <option value="DPL" @if(old('type') == 'DPL') selected @endif>Softwear Deployment</option>                          
                  <option value="CLD" @if(old('type') == 'CLD') selected @endif>Cloud Computing</option>                          
                  <option value="HST" @if(old('type') == 'HST') selected @endif>Web Hosting</option>      
                </select>
                @error('type')<small id="ageHelp" class="text-danger">{{ $message }}</small>@enderror
              </div>              
            </div>            
            <div class="col-md-5">
              <div class="form-group form-group-default form-group-default-select2 required @error('priority') has-error @enderror">
                <label>Priority</label>            
                <select class="full-width" name="priority" data-placeholder="Select Priority" data-init-plugin="select2">                                        
                  <option value="LW">Low</option>
                  <option value="MD">Medium</option>                                                
                  <option value="HG">High</option>                
                </select>
                @error('priority')<small id="ageHelp" class="text-danger">{{ $message }}</small>@enderror
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group form-group-default required @error('hours') has-error @enderror">
                <label>Estimated Hours</label>
                <input type="number" class="form-control" value="{{ old('hours') }}" name="hours" placeholder="Enter Estimated Hours" required>
                @error('hours')<small id="ageHelp" class="text-danger">{{ $message }}</small>@enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group form-group-default required @error('description') has-error @enderror">
                <label>Description</label>
                <textarea class="form-control" style="height:60px;" name="description" id="description" placeholder="Briefly Describe about your Task" required>{{ old('description') }}</textarea>
                @error('description')<small id="ageHelp" class="text-danger">{{ $message }}</small>@enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group form-group-default required @error('content') has-error @enderror">
                <label>Content</label>
                <textarea class="form-control" style="height:100px;" name="content" id="content" placeholder="Include your Content" required>{{ old('content') }}</textarea>
                @error('content')<small id="ageHelp" class="text-danger">{{ $message }}</small>@enderror
              </div>
            </div>
          </div>
          
          <p class="pull-left"></p>
          <div class="clearfix"></div>
          <button class="btn btn-primary" type="submit">Create Task</button>
        </form>
        <!-- END card -->
      </div>  
    </div>

    <div class="tab-pane slide-left" id="slide2">
    <div class=" container-fluid container-fixed-lg">
            <!-- START card -->
            

              @if(session()->get('success'))
                <div class="alert alert-success" role="alert">
                  <button class="close" data-dismiss="alert"></button>
                  <strong>Success: </strong>
                    {{ session()->get('success') }}  
                </div>
              @endif


             <!-- START CONTAINER FLUID -->
          <div class=" container-fluid   container-fixed-lg">
            <!-- START card -->
          <!-- END card -->
          </div>
          <!-- END CONTAINER FLUID -->
          <!-- START CONTAINER FLUID -->
          <div class=" container-fluid   container-fixed-lg">
            <!-- START card -->
            <div class="card card-default">
              <div class="card-header ">
                <div class="card-title">WYSIWYG editors
                </div>
                <div class="tools">
                  <a class="collapse" href="javascript:;"></a>
                  <a class="config" data-toggle="modal" href="#grid-config"></a>
                  <a class="reload" href="javascript:;"></a>
                  <a class="remove" href="javascript:;"></a>
                </div>
              </div>
              <div class="card-block no-scroll card-toolbar">
                <h5>Summernote</h5>
                <div class="summernote-wrapper">
                  <div id="summernote">Hello Summernote</div>
                </div>
              </div>
            </div>
            <!-- END card -->
          </div>
          <!-- END CONTAINER FLUID -->
            
            <!-- END card -->
      </div>
    </div>

    <div class="tab-pane slide-left" id="slide3">
    <div class=" container-fluid container-fixed-lg">
            <!-- START card -->
            <div class="card card-transparent">
        
              <div class="card-block">

              @if(session()->get('success'))
                <div class="alert alert-success" role="alert">
                  <button class="close" data-dismiss="alert"></button>
                  <strong>Success: </strong>
                    {{ session()->get('success') }}  
                </div>
              @endif


                      <div class="form-group form-group-default form-group-default-select2 required">
                        <label class="">Project</label>
                        <select class="full-width" data-placeholder="Select Country" data-init-plugin="select2">                      
                            <option>---- Select ----</option>
                            <option value="WEB">Web Development</option>
                            <option value="SFT">Softwear Development</option>                                                
                            <option value="NET">Network Administration</option>
                            <option value="HRD">Computer Hardwear</option>
                            <option value="SEQ">Internet Security</option>
                            <option value="DPL">Softwear Deployment</option>                          
                            <option value="CLD">Cloud Computing</option>                          
                            <option value="HST">Web Hosting</option>                          
                        </select>
                      </div>
                
              </div>
            </div>
            <!-- END card -->
      </div>
    </div>
  </div>
</div>

@endsection
