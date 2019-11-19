@extends('layouts.master')

@section('content')

<style>
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
        <li class="breadcrumb-item active link"><a href="{{ route('task.tasks') }}">Tasks</a></li>
      </ol>
      <!-- END BREADCRUMB -->
    </div>
  </div>
</div>
<!-- END JUMBOTRON -->

<div class=" container-fluid   container-fixed-lg">
<!-- <h3><span class="semi-bold"  style="margin-left: 2%;">Tasks</span> Panel</h3>  -->

<div class="card card-transparent ">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
    <li class="nav-item">
      <a href="#" class="@if (empty($tabName) || $tabName == 'created') active @endif" data-toggle="tab" data-target="#slide1"><span>Created Tasks</span></a>
    </li>
    <li class="nav-item">
      <a href="#" class="@if (!empty($tabName) && $tabName == 'pending') active @endif" data-toggle="tab" data-target="#slide2"><span>Pending Tasks</span></a>
    </li>
    <li class="nav-item">
      <a href="#" class="@if (!empty($tabName) && $tabName == 'assigned') active @endif" data-toggle="tab" data-target="#slide3"><span>Working in Progress Tasks</span></a>
    </li>
    <li class="nav-item">
      <a href="#" class="@if (!empty($tabName) && $tabName == 'completed') active @endif" data-toggle="tab" data-target="#slide4"><span>Completed Tasks</span></a>
    </li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane slide-left active" id="slide1">
      <div class="container-fluid container-fixed-lg">
            <!-- START card -->
            <div class="card card-transparent">
              <div class="card-header">
                <div class="card-title">Created not Assigned
                </div>
                <div class="pull-right">
                  <div class="col-xs-12">
                    <a href="{{ route('task.add_task') }}" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i>&nbsp;Create Task</a>
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
                      <th class="task_th_10">Task ID</th>
                      <th class="task_th_20">Title</th>
                      <th class="task_th_20">type</th>
                      <th class="task_th_10">priority</th>
                      <th class="task_th_10">Estimate Hours</th>
                      <th class="task_th_30">Assign</th>
                      <th class="task_th_5">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($created as $task)
                    <tr>
                      <td class="v-align-middle">
                        <p class="link"><a href="/tasks/view_task/{{$task->id}}">{{$task->task_code}}</a></p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{str_limit($task->title, 25)}}</p>
                      </td>
                      <td class="v-align-middle">
                        @foreach($types as $type)
                        <p>@if ($task->type == $type->code) {{$type->name}} @endif</p> 
                        @endforeach
                      </td>
                      <td class="v-align-middle">
                        <p>@if ($task->priority == 'LW') low @endif @if ($task->priority == 'MD') Medium @endif @if ($task->priority == 'HG') High @endif</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{$task->estimated_hours}}</p>
                      </td> 
                      <td class="v-align-middle">
                        <form action="{{ route('task.assign_task', $task->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                          <div class="form-group @error('users') has-error @enderror">    
                            <select style="width:120px;" name="users" data-placeholder="Select Priority" data-init-plugin="select2">   
                              <option value="Choose...">-- Choose --</option><!--selected by default-->
                            @foreach($users as $user) 
                              <option value="{{ $user->id }}"> {{ $user->name }} </option>                                            
                            @endforeach
                            </select>
                            <!-- <a href="" class="btn btn-success"><i class="fa fa-paper-plane"></i></a> -->
                            <button class="btn btn-success" type="submit" name="submit"><i class="fa fa-paper-plane"></i></button>  
                          </div>
                        </form>                       
                        
                      </td> 
                      <td class="v-align-middle">            
                        <p><a href="javascript:;" onclick="deleteData({{$task->id}})" data-toggle="modal" data-target="#delete-task" class="btn btn-danger"><i class="fa fa-trash"></i></a></p>
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
                <div class="card-title">Pending for Accept
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="card-block">

             <!--  @if(session()->get('success'))
                <div class="alert alert-success" role="alert">
                  <button class="close" data-dismiss="alert"></button>
                  <strong>Success: </strong>
                    {{ session()->get('success') }}  
                </div>
              @endif -->

                <table class="table table-hover demo-table-dynamic table-responsive-block" id="tableWithDynamicRows">
                  <thead>
                    <tr>
                      <th class="task_th_10">Task ID</th>
                      <th class="task_th_20">Title</th>
                      <th class="task_th_20">type</th>
                      <th class="task_th_20">priority</th>
                      <th class="task_th_20">Estimate Hours</th>
                      <th class="task_th_10">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($pending as $task)
                    <tr>
                      <td class="v-align-middle">
                      <p class="link"><a href="/tasks/view_task/{{$task->id}}"></i>{{$task->task_code}}</a></p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{str_limit($task->title, 25)}}</p>
                      </td>
                      <td class="v-align-middle">
                        @foreach($types as $type)
                        <p>@if ($task->type == $type->code) {{$type->name}} @endif</p> 
                        @endforeach
                      </td>
                      <td class="v-align-middle">
                        <p>@if ($task->priority == 'LW') low @endif @if ($task->priority == 'MD') Medium @endif @if ($task->priority == 'HG') High @endif</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{$task->estimated_hours}}</p>
                      </td> 
                      <td class="v-align-middle">
                        <a href="javascript:;" onclick="deleteData({{$task->id}})" data-toggle="modal" data-target="#delete-task" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
                <div class="card-title">User accepted Working in Progress
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="card-block">

             <!--  @if(session()->get('success'))
                <div class="alert alert-success" role="alert">
                  <button class="close" data-dismiss="alert"></button>
                  <strong>Success: </strong>
                    {{ session()->get('success') }}  
                </div>
              @endif -->

                <table class="table table-hover demo-table-dynamic table-responsive-block" id="tableWithDynamicRows">
                  <thead>
                    <tr>
                      <th class="task_th_10">Task ID</th>
                      <th class="task_th_20">Title</th>
                      <th class="task_th_20">type</th>
                      <th class="task_th_20">priority</th>
                      <th class="task_th_20">Estimate Hours</th>
                      <th class="task_th_10">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($active as $task)
                    <tr>
                      <td class="v-align-middle">
                      <p class="link"><a href="/tasks/view_task/{{$task->id}}"></i>{{$task->task_code}}</a></p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{str_limit($task->title, 25)}}</p>
                      </td>
                      <td class="v-align-middle">
                        @foreach($types as $type)
                        <p>@if ($task->type == $type->code) {{$type->name}} @endif</p> 
                        @endforeach
                      </td>
                      <td class="v-align-middle">
                        <p>@if ($task->priority == 'LW') low @endif @if ($task->priority == 'MD') Medium @endif @if ($task->priority == 'HG') High @endif</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{$task->estimated_hours}}</p>
                      </td> 
                      <td class="v-align-middle">
                        <a href="javascript:;" onclick="deleteData({{$task->id}})" data-toggle="modal" data-target="#delete-task" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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


    
    <div class="tab-pane slide-left" id="slide4">
    <div class=" container-fluid container-fixed-lg">
            <!-- START card -->
            <div class="card card-transparent">
              <div class="card-header ">
                <div class="card-title">All Completed Tasks
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="card-block">

             <!--  @if(session()->get('success'))
                <div class="alert alert-success" role="alert">
                  <button class="close" data-dismiss="alert"></button>
                  <strong>Success: </strong>
                    {{ session()->get('success') }}  
                </div>
              @endif -->

                <table class="table table-hover demo-table-dynamic table-responsive-block" id="tableWithDynamicRows">
                  <thead>
                    <tr>
                      <th class="task_th_10">Task ID</th>
                      <th class="task_th_20">Title</th>
                      <th class="task_th_20">type</th>
                      <th class="task_th_20">priority</th>
                      <th class="task_th_20">Estimate Hours</th>
                      <th class="task_th_10">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($completed as $task)
                    <tr>
                      <td class="v-align-middle">
                        <p class="link"><a href="/tasks/view_task/{{$task->id}}">{{$task->task_code}}</a></p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{str_limit($task->title, 25)}}</p>
                      </td>
                      <td class="v-align-middle">
                        @foreach($types as $type)
                        <p>@if ($task->type == $type->code) {{$type->name}} @endif</p> 
                        @endforeach
                      </td>
                      <td class="v-align-middle">
                        <p>@if ($task->priority == 'LW') low @endif @if ($task->priority == 'MD') Medium @endif @if ($task->priority == 'HG') High @endif</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{$task->estimated_hours}}</p>
                      </td> 
                      <td class="v-align-middle">
                        <a href="javascript:;" onclick="deleteData({{$task->id}})" data-toggle="modal" data-target="#delete-task" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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

  <!-- /.start modal delete modal-->
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
  </div><!-- /.end modal -->
</div>

<script type="text/javascript">

  function deleteData(id)
  {
    var id = id;
    var url = '{{ route("task.destroy_task", ":id") }}';
    url = url.replace(':id', id);
    $("#deleteForm").attr('action', url);
  }

</script>


@endsection
