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
        <li class="breadcrumb-item link"><a href="{{ route('user.users') }}">Users</a></li>
        <li class="breadcrumb-item active link"><a href="{{ route('user.add_user') }}">Add User</a></li>
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
              <a href="#" class="active" data-toggle="tab" data-target="#slide1"><span>Add User</span></a>
            </li>
          </ul>
          <div class="tab-content col-xl-12 col-lg-12">
              <!-- START card -->
              <div class="card card-transparent">
                <div class="card-block">

                  @if(session()->get('error'))
                      <div class="alert alert-danger" role="alert">
                          <button class="close" data-dismiss="alert"></button>
                          <strong>Error: </strong>
                          {{ session()->get('error') }}  
                      </div>
                  @endif

                  <form method="post" action="{{ route('user.save_user') }}">
                    {{csrf_field()}}
                    <div class="row clearfix">
                      <div class="col-md-8">
                        <div class="form-group form-group-default required @error('name') has-error @enderror" aria-required="true">
                          <label>Name</label>
                          <input type="text" value="{{ old('name') }}" class="form-control" name="name"  placeholder="Enter name here">
                          @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group form-group-default required form-group-default-select2 @error('type') has-error @enderror">
                          <label>Type</label>
                          <select class="full-width" name="type" data-placeholder="Select Type" data-init-plugin="select2">    
                              <option value="Choose...">---- Choose ----</option>                                    
                              <option value="admin" @if (old('type') == 'admin') selected @endif>Admin</option>
                              <option value="manager" @if (old('type') == 'manager') selected @endif>Manager</option>                                                
                              <option value="user" @if (old('type') == 'user') selected @endif>User</option>                
                          </select>
                          @error('type')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group form-group-default required @error('email') has-error @enderror">
                          <div class="form-input-group">
                              <label>Email</label>
                              <input type="email" value="{{ old('email') }}" class="form-control" name="email" placeholder="Enter your Email address here">
                              @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group form-group-default required form-group-default-select2 @error('status') has-error @enderror">
                          <label>Status</label>
                          <select class="full-width" name="status" data-placeholder="Select Status" data-init-plugin="select2">                                      
                              <option value="active" @if (old('status') == 'active') selected @endif>Active</option>
                              <option value="deactive" @if (old('status') == 'deactive') selected @endif>Deactive</option>                                                              
                          </select>
                          @error('status')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group form-group-default required @error('password') has-error @enderror">
                          <label>Password</label>
                          <input type="password" class="form-control" name="password" placeholder="Minimum of 8 characters.">
                          @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group form-group-default required @error('confirm_password') has-error @enderror">
                          <label>Password Again</label>
                          <input type="password" class="form-control" name="confirm_password" placeholder="Minimum of 8 characters.">
                          @error('confirm_password')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                      </div>
                    </div>
                      <br>
                    <div class="clearfix"></div>
                    <button class="btn btn-primary" type="submit">Create new User</button>
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

@endsection
    