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
  @php

    $tabName = session()->get('tabName');

  @endphp
  
  <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
    <li class="nav-item">
      <a href="#" class="@if (empty($tabName) || $tabName == 'created') active @endif" data-toggle="tab" data-target="#slide1"><span>Created Tasks</span></a>
    </li>
    <li class="nav-item">
      <a href="#" class="@if (!empty($tabName) && $tabName == 'pending') active @endif" data-toggle="tab" data-target="#slide2"><span>Pending Tasks</span></a>
    </li>
    <li class="nav-item">
      <a href="#" class="@if (!empty($tabName) && $tabName == 'active') active @endif" data-toggle="tab" data-target="#slide3"><span>Working in Progress Tasks</span></a>
    </li>
    <li class="nav-item">
      <a href="#" class="@if (!empty($tabName) && $tabName == 'onhold') active @endif" data-toggle="tab" data-target="#slide4"><span>Onhold Tasks</span></a>
    </li>
    <li class="nav-item">
      <a href="#" class="@if (!empty($tabName) && $tabName == 'rejected') active @endif" data-toggle="tab" data-target="#slide5"><span>Rejected Tasks</span></a>
    </li>
    <li class="nav-item">
      <a href="#" class="@if (!empty($tabName) && $tabName == 'completed') active @endif" data-toggle="tab" data-target="#slide6"><span>Completed Tasks</span></a>
    </li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane slide-left @if (empty($tabName) || $tabName == 'created') active @endif" id="slide1">
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

              @if(session()->get('success_created'))
                <div class="alert alert-success message" role="alert">
                  <button class="close" data-dismiss="alert"></button>
                  <strong>Success: </strong>
                    {{ session()->get('success_created') }}  
                </div>
              @endif

                <table class="table table-hover demo-table-dynamic table-responsive-block" id="tableWithDynamicRows">
                  <thead>
                    <tr>
                      <th class="task_th_10">Task ID</th>
                      <th class="task_th_25">Title</th>
                      <th class="task_th_20">type</th>
                      <th class="task_th_10">priority</th>
                      <th class="task_th_10">Estimate Hours</th>
                      <th class="task_th_25">Actions</th>
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
                        <a style="margin-bottom: 2px;" href="javascript:;" data-id="{{$task->id}}" data-title="{{$task->title}}" data-task_code="{{$task->task_code}}" data-url="{{ route('task.assign_task', $task->id) }}" data-toggle="modal" data-target="#assign-task" class="btn btn-success assignTask"><i class="fa fa-paper-plane"></i> Assign</a>
                        <a style="margin-bottom: 2px;" href="javascript:;" data-task_code="{{$task->task_code}}" data-url="{{ route('task.destroy_task', $task->id) }}" data-toggle="modal" data-target="#delete-task" class="btn btn-danger deleteTask"><i class="fa fa-trash"></i></a>
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


    <div class="tab-pane slide-left @if (!empty($tabName) && $tabName == 'pending') active @endif" id="slide2">
    <div class=" container-fluid container-fixed-lg">
            <!-- START card -->
            <div class="card card-transparent">
              <div class="card-header ">
                <div class="card-title">Pending for Accept
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="card-block">

              @if(session()->get('success_pending'))
                <div class="alert alert-success message" role="alert">
                  <button class="close" data-dismiss="alert"></button>
                  <strong>Success: </strong>
                    {{ session()->get('success_pending') }}  
                </div>
              @endif

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
                        <!-- <a href="javascript:;" onclick="deleteData({{$task->id}})" data-toggle="modal" data-target="#delete-task" class="btn btn-danger"><i class="fa fa-trash"></i></a> -->
                        <a style="margin-bottom: 2px;" href="javascript:;" data-id="{{$task->id}}" data-title="{{$task->title}}" data-task_code="{{$task->task_code}}" data-url="{{ route('task.action_task', $task->id) }}" data-toggle="modal" data-target="#action-task" class="btn btn-success actionTask">Action</a>
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


    <div class="tab-pane slide-left @if (!empty($tabName) && $tabName == 'active') active @endif" id="slide3">
    <div class=" container-fluid container-fixed-lg">
            <!-- START card -->
            <div class="card card-transparent">
              <div class="card-header ">
                <div class="card-title">User accepted Working in Progress
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="card-block">

              @if(session()->get('success_active'))
                <div class="alert alert-success message" role="alert">
                  <button class="close" data-dismiss="alert"></button>
                  <strong>Success: </strong>
                    {{ session()->get('success_active') }}  
                </div>
              @endif

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
                        <!-- <a href="javascript:;" onclick="deleteData({{$task->id}})" data-toggle="modal" data-target="#delete-task" class="btn btn-danger"><i class="fa fa-trash"></i></a> -->
                        <a style="margin-bottom: 2px;" href="javascript:;" data-id="{{$task->id}}" data-title="{{$task->title}}" data-task_code="{{$task->task_code}}" data-url="{{ route('task.action2_task', $task->id) }}" data-toggle="modal" data-target="#action2-task" class="btn btn-success action2Task">Action</a>
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

    <div class="tab-pane slide-left @if (!empty($tabName) && $tabName == 'onhold') active @endif" id="slide4">
      <div class=" container-fluid container-fixed-lg">
            <!-- START card -->
            <div class="card card-transparent">
              <div class="card-header ">
                <div class="card-title">All Onhold Tasks
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="card-block">

              @if(session()->get('success_onhold'))
                <div class="alert alert-success message" role="alert">
                  <button class="close" data-dismiss="alert"></button>
                  <strong>Success: </strong>
                    {{ session()->get('success_onhold') }}  
                </div>
              @endif

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
                  @foreach($onhold as $task)
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
                        <!-- <a data-title="{{$task->title}}" data-url="{{ route('task.destroy_task', $task->id) }}" data-toggle="modal" data-target="#delete-task" class="btn btn-danger deleteTask"><i class="fa fa-trash"></i></a> -->
                        <a style="margin-bottom: 2px;" href="javascript:;" data-id="{{$task->id}}" data-title="{{$task->title}}" data-task_code="{{$task->task_code}}" data-url="{{ route('task.unhold_task', $task->id) }}" data-toggle="modal" data-target="#unhold-task" class="btn btn-success unholdTask">UnHold</a>
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
    
    <div class="tab-pane slide-left @if (!empty($tabName) && $tabName == 'rejected') active @endif" id="slide5">
    <div class=" container-fluid container-fixed-lg">
            <!-- START card -->
            <div class="card card-transparent">
              <div class="card-header ">
                <div class="card-title">All Rejected Tasks
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
                  @foreach($rejected as $task)
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
                        <!-- <a data-title="{{$task->title}}" data-url="{{ route('task.destroy_task', $task->id) }}" data-toggle="modal" data-target="#delete-task" class="btn btn-danger deleteTask"><i class="fa fa-trash"></i></a> -->
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

    <div class="tab-pane slide-left @if (!empty($tabName) && $tabName == 'completed') active @endif" id="slide6">
    <div class=" container-fluid container-fixed-lg">
            <!-- START card -->
            <div class="card card-transparent">
              <div class="card-header ">
                <div class="card-title">All Completed Tasks
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="card-block">

              @if(session()->get('success_completed'))
                <div class="alert alert-success message" role="alert">
                  <button class="close" data-dismiss="alert"></button>
                  <strong>Success: </strong>
                    {{ session()->get('success_completed') }}  
                </div>
              @endif 

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
                      <a style="margin-bottom: 2px;" href="javascript:;" data-id="{{$task->id}}" data-title="{{$task->title}}" data-task_code="{{$task->task_code}}" data-url="{{ route('task.reassign_task', $task->id) }}" data-toggle="modal" data-target="#reassign-task" class="btn btn-success reassignTask">Reassign</a>
                        <!-- <a data-title="{{$task->title}}" data-url="{{ route('task.destroy_task', $task->id) }}" data-toggle="modal" data-target="#delete-task" class="btn btn-danger deleteTask"><i class="fa fa-trash"></i></a> -->
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

  <!-- / delete modal-->
  <div class="modal fade stick-up" id="delete-task" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="" method="post" id="deleteForm">
            <div class="modal-header clearfix ">              
              <h4 class="p-b-5"><span class="semi-bold">Delete</span> Confirmation</h4>
              <button type="button" style="position: absolute; right: 0; padding: 2px 4px; margin-right:25px;" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
            </div>
            <div class="modal-body">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
              <p>Are you sure want to delete <span class="bold">Task ID : <span id="taskId"></span></span></p>                  
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


<!--assign Modal -->
<div class="modal fade slide-up disable-scroll" id="assign-task" tabindex="-1" role="dialog" aria-hidden="false">
  <div class="modal-dialog ">
    <div class="modal-content-wrapper">
      <div class="modal-content">
        <div class="modal-header clearfix text-left">
        <button type="button" style="position: absolute; right: 0; padding: 2px 4px; margin-right:25px;" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
          <h4>Please select User for <span class="semi-bold">Assign this Task</span></h4>
          <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
        </div><br>
        <div class="modal-body">
          <form action="" method="post" id="assignForm">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
            <div class="form-group-attached">
              <div class="row">
                <div class="col-md-4">
                  <div class=" ">
                    <label><b>Task ID :</b></label>
                    <!-- <span id="taskId"></span> -->
                    <span id="assign_task_code"></span>  
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="">
                    <label><b>Task Name :</b></label>
                    <span id="assign_task_title"></span>                    
                  </div>
                </div>
              </div><br>
              <div class="row">
                <div class="col-md-9 m-b-10">          
                  <div class="form-group form-group-default form-group-default-select2">
                    <!-- <label style="color:black;font-weight:bold;">Assign Task</label> -->
                    <select id="mySelect2" class="full-width" name="user" data-init-plugin="select2" required>
                      <option value="">- Select User -</option>
                    @foreach($users as $user)
                      <option value="{{ $user->id }}"> {{ $user->user_id }} </option>
                    @endforeach
                    </select> 
                  </div>
                </div>
                <div class="col-md-3 m-b-10">
                  <div class="pull-right">
                    <button style="height:55px;" type="submit" name="submit" class="btn btn-success">Assign Now</button>
                  </div>
                </div>    
              </div>
            </div>           
          </form>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.modal-dialog -->

<!--action Modal -->
 <div class="modal fade slide-up disable-scroll" id="action-task" tabindex="-1" role="dialog" aria-hidden="false">
  <div class="modal-dialog ">
    <div class="modal-content-wrapper">
      <div class="modal-content">
        <div class="modal-header clearfix text-left">
        <button type="button" style="position: absolute; right: 0; padding: 2px 4px; margin-right:25px;" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>        
          <h4>Select action for <span class="semi-bold">this Task</span></h4>
          <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
        </div><br>
        <div class="modal-body">
          <form action="" method="post" id="actionForm">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
            <div class="form-group-attached">
              <div class="row">
                <div class="col-md-4">
                  <div class=" ">
                    <label><b>Task ID :</b></label>
                    <!-- <span id="taskId"></span> -->
                    <span id="action_task_code"></span>                                
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="">
                    <label><b>Task Name :</b></label>
                    <span id="action_task_title"></span>               
                  </div>
                </div>
              </div><br>              
              <div class="pull-right">
                <button type="submit" value="1" name="submit" class="btn btn-primary">Accept</button>
                <button type="submit" value="0" name="submit" class="btn btn-warning">Reject</button>
              </div>              
            </div>           
          </form>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.modal-dialog -->

<!--action2 Modal -->
<div class="modal fade slide-up disable-scroll" id="action2-task" tabindex="-1" role="dialog" aria-hidden="false">
  <div class="modal-dialog ">
    <div class="modal-content-wrapper">
      <div class="modal-content">
        <div class="modal-header clearfix text-left">
        <button type="button" style="position: absolute; right: 0; padding: 2px 4px; margin-right:25px;" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>        
          <h4>What do you want to do <span class="semi-bold">this Task</span></h4>
          <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
        </div><br>
        <div class="modal-body">
          <form action="" method="post" id="action2Form">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
            <div class="form-group-attached">
              <div class="row">
                <div class="col-md-4">
                  <div class=" ">
                    <label><b>Task ID :</b></label>
                    <!-- <span id="taskId"></span> -->
                    <span id="action2_task_code"></span>                                
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="">
                    <label><b>Task Name :</b></label>
                    <span id="action2_task_title"></span>               
                  </div>
                </div>
              </div><br>              
              <div class="pull-right">
                <button type="submit" value="1" name="submit" class="btn btn-complete">Complete Task</button>
                <button type="submit" value="0" name="submit" class="btn btn-warning">Hold Task</button>                
              </div>              
            </div>           
          </form>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.modal-dialog -->


<!--unhold Modal -->
<div class="modal fade slide-up disable-scroll" id="unhold-task" tabindex="-1" role="dialog" aria-hidden="false">
  <div class="modal-dialog ">
    <div class="modal-content-wrapper">
      <div class="modal-content">
        <div class="modal-header clearfix text-left">
        <button type="button" style="position: absolute; right: 0; padding: 2px 4px; margin-right:25px;" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>        
          <h4>You can Unhold <span class="semi-bold">this Task</span></h4>
          <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
        </div><br>
        <div class="modal-body">
          <form action="" method="post" id="unholdForm">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
            <div class="form-group-attached">
              <div class="row">
                <div class="col-md-4">
                  <div class=" ">
                    <label><b>Task ID :</b></label>
                    <!-- <span id="taskId"></span> -->
                    <span id="unhold_task_code"></span>                                
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="">
                    <label><b>Task Name :</b></label>
                    <span id="unhold_task_title"></span>               
                  </div>
                </div>
              </div><br>              
              <div class="pull-right">
                <button type="submit" name="submit" class="btn btn-primary">Unhold Task</button>
              </div>              
            </div>           
          </form>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.modal-dialog -->

<!--reassign Modal -->
<div class="modal fade slide-up disable-scroll" id="reassign-task" tabindex="-1" role="dialog" aria-hidden="false">
  <div class="modal-dialog ">
    <div class="modal-content-wrapper">
      <div class="modal-content">
        <div class="modal-header clearfix text-left">
        <button type="button" style="position: absolute; right: 0; padding: 2px 4px; margin-right:25px;" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
          <h4>You can Reassign <span class="semi-bold"> this Task</span></h4>
          <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
        </div><br>
        <div class="modal-body">
          <form action="{{ route('task.reassign_task', $task->id) }}" method="post" id="reassignForm">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
            <div class="form-group-attached">
              <div class="row">
                <div class="col-md-4">
                  <div class=" ">
                    <label><b>Task ID :</b></label>
                    <!-- <span id="taskId"></span> -->
                    <span id="reassign_task_code"></span>  
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="">
                    <label><b>Task Name :</b></label>
                    <span id="reassign_task_title"></span>                    
                  </div>
                </div>
              </div><br>
              <div class="pull-right">
                <button type="submit" name="submit" class="btn btn-primary">Reassign Now</button>
              </div>
            </div>           
          </form>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.modal-dialog -->

@endsection

@section('script')

<script type="text/javascript">

// fade out alert
  window.setTimeout(function() {
      $(".message").fadeTo(1000, 0).slideUp(1000, function(){
          $(this).remove(); 
      });
  }, 3000);

// select2 modal dropdown issue fixed
  $('#mySelect2').select2({
      dropdownParent: $('#assign-task')
  });

// delete modal script
  $(document).on("click", ".deleteTask", function () {        
    var url = $(this).data('url');
    var task_code = $(this).data('task_code');
    $("#deleteForm").attr('action', url);
    $('#taskId').text(task_code);
  });

// assign modal script
  $(document).on("click", ".assignTask", function () {        
    var url = $(this).data('url');
    var task_code = $(this).data('task_code');
    var title = $(this).data('title');
    //alert(task_code);
    $("#assignForm").attr('action', url);
    $('#assign_task_code').text(task_code);
    $('#assign_task_title').text(title);
  });

// action modal script
$(document).on("click", ".actionTask", function () {        
    var url = $(this).data('url');
    var task_code = $(this).data('task_code');
    var title = $(this).data('title');
    //alert(title);
    $("#actionForm").attr('action', url);
    $('#action_task_code').text(task_code);
    $('#action_task_title').text(title);
  });

// action2 modal script
$(document).on("click", ".action2Task", function () {        
    var url = $(this).data('url');
    var task_code = $(this).data('task_code');
    var title = $(this).data('title');
    //alert(title);
    $("#action2Form").attr('action', url);
    $('#action2_task_code').text(task_code);
    $('#action2_task_title').text(title);
  });

// unhold modal script
$(document).on("click", ".unholdTask", function () {        
    var url = $(this).data('url');
    var task_code = $(this).data('task_code');
    var title = $(this).data('title');
    //alert(title);
    $("#unholdForm").attr('action', url);
    $('#unhold_task_code').text(task_code);
    $('#unhold_task_title').text(title);
  });

// reassign modal script
$(document).on("click", ".reassignTask", function () {        
    //var url = $(this).data('url');
    var task_code = $(this).data('task_code');
    var title = $(this).data('title');
    //alert(title);
    //$("#reassignForm").attr('action', url);
    $('#reassign_task_code').text(task_code);
    $('#reassign_task_title').text(title);
  });

</script>

@endsection
