@extends('layouts.master')

@section('content')

<style>
  .has-error { background-color: rgba(245, 87, 83, 0.1);}
  .link a { color:blue; }
  .link a:hover { color:#6DC0F9; }
  .box{ margin:5px; }
</style>

<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
  <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="inner">
      <!-- START BREADCRUMB -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item link"><a href="{{ route('user.users') }}">Users</a></li>
        <li class="breadcrumb-item link active"><a href="#">Edit User</a></li>
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
      <a href="#" class="active" data-toggle="tab" data-target="#slide1"><span>Edit User</span></a>
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

        <form method="post" action="{{ route('user.update_user', $users->id) }}">
        {{csrf_field()}}
        @method('PUT')
        <div class="row clearfix">
          <div class="col-md-10">
            <div class="form-group form-group-default required @error('name') has-error @enderror" aria-required="true">
              <label>Name</label>
              <input type="text" value="{{ $users->name }}" class="form-control" name="name"  placeholder="Enter name here">
              @error('name')<small class="text-danger">{{ $message }}</small>@enderror
            </div>
          </div>
          <div class="col-md-2">
              <div class="form-group form-group-default required @error('title') has-error @enderror">
                <label>User ID</label>
                <input style="color:gray;" type="text" value="{{ $users->user_id }}" class="form-control" name="user_id" readonly>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group form-group-default required @error('email') has-error @enderror">
              <div class="form-input-group">
                  <label>Email</label>
                  <input type="email" value="{{ $users->email }}" class="form-control" name="email" placeholder="Enter your Email address here">
                  @error('email')<small class="text-danger">{{ $message }}</small>@enderror
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group form-group-default required form-group-default-select2 @error('status') has-error @enderror">
              <label>Status</label>
              <select class="full-width" name="status" data-placeholder="Select Status" data-init-plugin="select2">                                      
                  <option value="active" @if ($users->status == 'active') selected @endif>Active</option>
                  <option value="deactive" @if ($users->status == 'deactive') selected @endif>Deactive</option>                                                              
              </select>
              @error('status')<small class="text-danger">{{ $message }}</small>@enderror
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group form-group-default required form-group-default-select2 @error('type') has-error @enderror">
              <label>Type</label>
              <select class="full-width" name="type" data-placeholder="Select Type" data-init-plugin="select2">    
                  <option value="Choose...">---- Choose ----</option>                                    
                  <option value="admin" @if ($users->type == 'admin') selected @endif>Admin</option>
                  <option value="manager" @if ($users->type == 'manager') selected @endif>Manager</option>                                                
                  <option value="user" @if ($users->type == 'user') selected @endif>User</option>                
              </select>
              @error('type')<small class="text-danger">{{ $message }}</small>@enderror
            </div>
          </div>
        </div>
        <br><br>
        <div class="clearfix"></div>
        <button class="btn btn-primary" type="submit">Update User</button>
        <a class="btn btn-warning" href="{{ route('user.edit_pass', $users->id) }}">Change Password</a>
        <a class="btn btn-danger" href="javascript:;" onclick="deleteData({{$users->id}})" data-toggle="modal" data-target="#delete-user">Delete User</a>
        <a class="btn btn-complete" href="{{ URL::previous() }}">Go Back</a>
        </form>
        <!-- END card -->
      </div>  
    </div>
    </div>
    
  </div>
  <div class="col-lg-1"></div>

  <!-- /.start modal -->
  <div class="modal fade stick-up" id="delete-user" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="" method="post" id="deleteForm">
            <div class="modal-header clearfix ">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
              </button>
              <h4 class="p-b-5"><span class="semi-bold">Delete</span> Confirmation</h4>
            </div>
            <div class="modal-body">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
              <p>Are you sure want to delete this User....</p>                  
            </div>
            <div class="modal-footer">
                <!-- <input type="hidden" name="task_id" id="task_id" value=""> -->
                <button type="submit" class="btn btn-danger">Yes, Delete It</button>
                <button type="button" name="" class="btn btn-primary" data-dismiss="modal">No, Keep It</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  </div><!-- /.end modal -->

</div>

<script type="text/javascript">

  function deleteData(id)
  {
    var id = id;
    var url = '{{ route("user.destroy_user", ":id") }}';
    url = url.replace(':id', id);
    $("#deleteForm").attr('action', url);
  }

</script>

@endsection