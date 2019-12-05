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
        <li class="breadcrumb-item link"><a href="{{ route('user.edit_user', $users->id) }}">Edit User</a></li> 
        <li class="breadcrumb-item link active"><a href="#">Update Password</a></li>
      </ol>
      <!-- END BREADCRUMB -->
    </div>
  </div>
</div>
<!-- END JUMBOTRON -->

<div class=" container-fluid box container-fixed-lg">
<!-- <h3><span class="semi-bold"  style="margin-left: 2%;">Tasks</span> Panel</h3>  -->
<div class="row">
<div class="col-lg-1"></div>
<div class="card card-transparent col-lg-10 col-md-12">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-tabs-fillup">
    <li class="nav-item">
      <a href="#" class="active" data-toggle="tab" data-target="#slide1"><span>Update Password</span></a>
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

        <form method="post" action="{{ route('user.update_pass', $users->id) }}">
        {{csrf_field()}}
        @method('PUT')
        <div class="row clearfix">
          <div class="col-md-6">
            <div class="form-group form-group-default @error('name') has-error @enderror" aria-required="true">
              <label>Name</label>
              <input style="color: black;" type="text" value="{{ $users->name }}" class="form-control" name="name" readonly>
              @error('name')<small class="text-danger">{{ $message }}</small>@enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group form-group-default @error('email') has-error @enderror">
              <div class="form-input-group">
                <label>Email</label>
                <input style="color: black;" type="email" value="{{ $users->email }}" class="form-control" name="email" readonly>
                @error('email')<small class="text-danger">{{ $message }}</small>@enderror
              </div>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group form-group-default required @error('old_password') has-error @enderror">
                <label>Old Password</label>
                <input type="password" class="form-control" name="old_password" placeholder="Type your old password.">
                @error('old_password')<small class="text-danger">{{ $message }}</small>@enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group form-group-default required @error('new_password') has-error @enderror">
                <label>New Password</label>
                <input type="password" class="form-control" name="new_password" placeholder="Type your new password.">
                @error('new_password')<small class="text-danger">{{ $message }}</small>@enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group form-group-default required @error('confirm_password') has-error @enderror">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" placeholder="Type new password again.">
                @error('confirm_password')<small class="text-danger">{{ $message }}</small>@enderror
                </div>
            </div>
        </div>
        <br><br>
        <div class="clearfix"></div>
        <button class="btn btn-primary" type="submit">Update Password</button>
        <a class="btn btn-complete" href="{{ URL::previous() }}">Go Back</a>
        </form>
        <!-- END card -->
      </div>  
    </div>
    </div>
    
  </div>
  <div class="col-lg-1"></div>
</div>

@endsection