@extends('layouts.master')

@section('content')

<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
  <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="inner">
      <!-- START BREADCRUMB -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active">Tasks</li>
      </ol>
      <!-- END BREADCRUMB -->
    </div>
  </div>
</div>
<!-- END JUMBOTRON -->

<div class=" container-fluid   container-fixed-lg">
<h3><span class="semi-bold">Tasks</span> Panel</h3> 
<br>

<div class="card card-transparent ">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
    <li class="nav-item">
      <a href="#" class="active" data-toggle="tab" data-target="#slide1"><span>Created Tasks</span></a>
    </li>
    <li class="nav-item">
      <a href="#" data-toggle="tab" data-target="#slide2"><span>Working Tasks</span></a>
    </li>
    <li class="nav-item">
      <a href="#" data-toggle="tab" data-target="#slide3"><span>Completed Tasks</span></a>
    </li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane slide-left active" id="slide1">
      <div class=" container-fluid container-fixed-lg">
            <!-- START card -->
            <div class="card card-transparent">
              <div class="card-header">
                <div class="card-title">Created not Assigned
                </div>
                <div class="pull-right">
                  <div class="col-xs-12">
                    <a href="{{ '/add' }}" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i>&nbsp;Create Task</a>
                    <!-- <button href="{{ '/add' }}" id="show-modal" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i>&nbsp;Add Task</button> -->
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="card-block">

              @if(session()->get('success'))
                <div class="alert alert-success" role="alert">
                  <button class="close" data-dismiss="alert"></button>
                  <strong>Success: </strong>
                    {{ session()->get('success') }}  
                </div>
              @endif

                <table class="table table-hover demo-table-dynamic table-responsive-block" id="tableWithDynamicRows">
                  <thead>
                    <tr>
                      <th class="task_th">Task ID</th>
                      <th>Title</th>
                      <th>type</th>
                      <th>priority</th>
                      <th>Description</th>
                      <th>Content</th>
                      <th>Estimate Hours</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($task1 as $task)
                    <tr>
                      <td class="v-align-middle">
                        <p>{{$task->task_code}}</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{str_limit($task->title, 10)}}</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{$task->type}}</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{$task->priority}}</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{str_limit($task->description,15)}}</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{str_limit($task->content, 15)}}</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{$task->estimated_hours}}</p>
                      </td> 
                      <td class="v-align-middle">
                          <a href="/assign/{{$task->id}}" class="btn btn-success"><i class="fa fa-paper-plane"></i></a>&nbsp;<a href="/view/{{$task->id}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>&nbsp;<a href="javascript:;" onclick="deleteData({{$task->id}})" data-toggle="modal" data-target="#delete-task" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      </td>     
                    </tr>
                    @endforeach 
                  </tbody>
                </table>
              </div>
            </div>
            <!-- END card -->
      </div>  
    </div>



    <div class="tab-pane slide-left" id="slide2">
    <div class=" container-fluid container-fixed-lg">
            <!-- START card -->
            <div class="card card-transparent">
              <div class="card-header ">
                <div class="card-title">User accepted Working in Progress
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="card-block">

              @if(session()->get('success'))
                <div class="alert alert-success" role="alert">
                  <button class="close" data-dismiss="alert"></button>
                  <strong>Success: </strong>
                    {{ session()->get('success') }}  
                </div>
              @endif

                <table class="table table-hover demo-table-dynamic table-responsive-block" id="tableWithDynamicRows">
                  <thead>
                    <tr>
                      <th class="task_th">Task ID</th>
                      <th>Title</th>
                      <th>type</th>
                      <th>priority</th>
                      <th>Description</th>
                      <th>Content</th>
                      <th>Estimate Hours</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($task2 as $task)
                    <tr>
                      <td class="v-align-middle">
                        <p>{{$task->task_code}}</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{str_limit($task->title, 10)}}</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{$task->type}}</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{$task->priority}}</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{str_limit($task->description,15)}}</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{str_limit($task->content, 15)}}</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{$task->estimated_hours}}</p>
                      </td> 
                      <td class="v-align-middle">
                          <a href="/view/{{$task->id}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>&nbsp;<a href="javascript:;" onclick="deleteData({{$task->id}})" data-toggle="modal" data-target="#delete-task" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      </td>     
                    </tr>
                    @endforeach 
                  </tbody>
                </table>
              </div>
            </div>
            <!-- END card -->
      </div>
    </div>


    
    <div class="tab-pane slide-left" id="slide3">
    <div class=" container-fluid container-fixed-lg">
            <!-- START card -->
            <div class="card card-transparent">
              <div class="card-header ">
                <div class="card-title">All Completed Tasks
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="card-block">

              @if(session()->get('success'))
                <div class="alert alert-success" role="alert">
                  <button class="close" data-dismiss="alert"></button>
                  <strong>Success: </strong>
                    {{ session()->get('success') }}  
                </div>
              @endif

                <table class="table table-hover demo-table-dynamic table-responsive-block" id="tableWithDynamicRows">
                  <thead>
                    <tr>
                      <th class="task_th">Task ID</th>
                      <th>Title</th>
                      <th>type</th>
                      <th>priority</th>
                      <th>Description</th>
                      <th>Content</th>
                      <th>Estimate Hours</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($task3 as $task)
                    <tr>
                      <td class="v-align-middle">
                        <p>{{$task->task_code}}</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{str_limit($task->title, 10)}}</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{$task->type}}</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{$task->priority}}</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{str_limit($task->description,15)}}</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{str_limit($task->content, 15)}}</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{$task->estimated_hours}}</p>
                      </td> 
                      <td class="v-align-middle">
                        <a href="/view/{{$task->id}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>&nbsp;<a href="javascript:;" onclick="deleteData({{$task->id}})" data-toggle="modal" data-target="#delete-task" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      </td>     
                    </tr>
                    @endforeach 
                  </tbody>
                </table>
              </div>
            </div>
            <!-- END card -->
      </div>
    </div>
  </div>

         <!--  <div class="modal fade stick-up" id="addNewAppModal" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header clearfix ">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                  </button>
                  <h4 class="p-b-5"><span class="semi-bold">New</span> App</h4>
                </div>
                <div class="modal-body">
                  <p class="small-text">Create a new app using this form, make sure you fill them all</p>
                  <form role="form">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group form-group-default">
                          <label>name</label>
                          <input id="appName" type="text" class="form-control" placeholder="Name of your app">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group form-group-default">
                          <label>Description</label>
                          <input id="appDescription" type="text" class="form-control" placeholder="Tell us more about it">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group form-group-default">
                          <label>Price</label>
                          <input id="appPrice" type="text" class="form-control" placeholder="your price">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group form-group-default">
                          <label>Notes</label>
                          <input id="appNotes" type="text" class="form-control" placeholder="a note">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button id="add-app" type="button" class="btn btn-primary  btn-cons">Add</button>
                  <button type="button" class="btn btn-cons" data-dismiss="modal">Close</button>
                </div>
              </div>  
            </div>
          </div>
        </div>  -->

        <div class="modal fade stick-up" id="delete-task" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">
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
                    <p>Are you sure want to delete this Task....</p>                  
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
        </div>

</div>

<script type="text/javascript">

  function deleteData(id)
  {
    var id = id;
    var url = '{{ route("task.destroy", ":id") }}';
    url = url.replace(':id', id);
    $("#deleteForm").attr('action', url);
  }

</script>

@endsection
