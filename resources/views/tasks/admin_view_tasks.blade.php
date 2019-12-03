@extends('layouts.master')

@section('content')

<style>
.box{ margin:5px; }
.link a { color:blue; }
.link a:hover { color:#6DC0F9; }
.table-hover thead tr th {  color: gray; font-weight: bold; font-size:12px;}
.table-hover thead { background-color: #F1F1F1;}
.align-links { margin-right:20px; }
</style>

<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
        <!-- START BREADCRUMB -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item link"><a href="#">Tasks</a></li>
            <li class="breadcrumb-item active link"><a href="{{ route('task.admin_view_tasks') }}">Admin View</a></li>
        </ol>
        <!-- END BREADCRUMB -->
        </div>
    </div>
</div>
<!-- END JUMBOTRON -->

<div class="container-fluid box container-fixed-lg">
    <!-- <h3><span class="semi-bold"  style="margin-left: 2%;">Tasks</span> Panel</h3>  -->
    <div class="card card-transparent ">
    <!-- Nav tabs -->
        @php

            $tabName = session()->get('tabName');

        @endphp
  
        <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
            <li class="nav-item">
                <a href="#" class="@if (empty($tabName) || $tabName == 'new') active @endif" data-toggle="tab" data-target="#slide1"><span>New Tasks</span></a>
            </li>
            <li class="nav-item">
                <a href="#" class="@if (!empty($tabName) && $tabName == 'assigned') active @endif" data-toggle="tab" data-target="#slide2"><span>Dispatched Tasks</span></a>
            </li>
        </ul>

<!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane slide-left @if (empty($tabName) || $tabName == 'new') active @endif" id="slide1">
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

                    @if(session()->get('success_new'))
                        <div class="alert alert-success message" role="alert">
                        <button class="close" data-dismiss="alert"></button>
                        <strong>Success: </strong>
                            {{ session()->get('success_new') }}  
                        </div>
                    @endif

                        <table class="table table-hover table-responsive-block" id="">
                          <thead>
                            <tr>
                                <th class="task_th_10">Task ID</th>
                                <th class="task_th_20">Title</th>
                                <th class="task_th_20">type</th>
                                <th class="task_th_10">priority</th>
                                <th class="task_th_15">Estimate Hours</th>
                                <th class="task_th_25">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($new as $task)
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

                    <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right align-links">
                                    {!! $new->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- END card -->
                </div>  
            </div>

            <div class="tab-pane slide-left @if (!empty($tabName) && $tabName == 'assigned') active @endif" id="slide2">
                <div class=" container-fluid container-fixed-lg">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-header ">
                            <div class="card-title">Pending for Action
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-block">

                        @if(session()->get('success_assign'))
                            <div class="alert alert-success message" role="alert">
                            <button class="close" data-dismiss="alert"></button>
                            <strong>Success: </strong>
                                {{ session()->get('success_assign') }}  
                            </div>
                        @endif

                            <table class="table table-hover table-responsive-block" id="">
                                <thead>
                                    <tr>
                                        <th class="task_th_10">Task ID</th>
                                        <th class="task_th_20">Title</th>
                                        <th class="task_th_20">type</th>
                                        <th class="task_th_20">priority</th>
                                        <th class="task_th_15">Estimate Hours</th>
                                        <th class="task_th_15">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($assigned as $task)
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
                                        <span class="label label-info">{{ $task->task_status }}</span>
                                        <!-- <a href="javascript:;" onclick="deleteData({{$task->id}})" data-toggle="modal" data-target="#delete-task" class="btn btn-danger"><i class="fa fa-trash"></i></a> -->
                                        <!-- <a style="margin-bottom: 2px;" href="javascript:;" data-id="{{$task->id}}" data-title="{{$task->title}}" data-task_code="{{$task->task_code}}" data-url="{{ route('task.action_task', $task->id) }}" data-toggle="modal" data-target="#action-task" class="btn btn-success actionTask">Action</a> -->
                                    </td>     
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right align-links">
                                    {!! $assigned->links() !!}
                                </div>
                            </div>
                        </div>

                    </div>
                    </div>
                    <!-- END card -->
                </div>
            </div>
        </div>
    </div>
<!-- container-fluid  -->
</div>

<!-- / delete modal-->
<div class="modal fade stick-up" id="delete-task" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <form action="{{ route('task.destroy_task', $task->id) }}" method="post" id="deleteForm">
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
</div><!-- /.end modal -->

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
          <form action="{{ route('task.assign_task', $task->id) }}" method="post" id="assignForm">
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

</script>

@endsection