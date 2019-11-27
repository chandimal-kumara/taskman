@extends('layouts.master')

@section('content')

<style>
  .box { margin:5px; }
  .title { font-weight:bold; color:#626262; }
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
        <li class="breadcrumb-item link"><a href="{{ route('task.tasks') }}">Tasks</a></li>
        <li class="breadcrumb-item link active"><a href="#">View Task</a></li>
      </ol>
      <!-- END BREADCRUMB -->
    </div>
  </div>
</div>
<!-- END JUMBOTRON -->

<div class=" container-fluid   container-fixed-lg">
  <!-- <h3><span class="semi-bold"  style="margin:5px;">Tasks</span> Panel</h3><br> -->
            <!-- START card -->
  <div class="row box">
    <div class="col-lg-1"></div>
    <div class="card card-transparent col-lg-10 col-md-12">
      <ul class="nav nav-tabs nav-tabs-fillup">
          <li class="nav-item">
              <a href="#" class="active" data-toggle="tab" data-target="#slide1"><span>View {{  $tasks->task_status }} Task</span></a>
          </li>
      </ul> 
      <div class="tab-content">
        <div class="tab-pane slide-left active" id="slide1">
          <div class=" container-fluid container-fixed-lg">
            <!-- START card -->
            <table class="table table-hover table-condensed dataTable no-footer" id="condensedTable" role="grid">
              <tbody>                                                                                                                         
                <tr role="row" class="odd">
                  <td class="v-align-middle semi-bold sorting_1"><span class="title">Task Code :</span></td>                            
                  <td class="v-align-middle semi-bold">{{ $tasks->task_code }}</td>
                </tr>
                <tr role="row" class="even">
                  <td class="v-align-middle semi-bold sorting_1"><span class="title">Title :</span></td>                            
                  <td class="v-align-middle semi-bold">{{ $tasks->title }}</td>
                </tr>
                <tr role="row" class="odd">
                  <td class="v-align-middle semi-bold sorting_1"><span class="title">Type :</span></td>                            
                  <td class="v-align-middle semi-bold">
                    @foreach($types as $type)
                      @if ($tasks->type == $type->code) {{$type->name}} @endif
                    @endforeach
                  </td>
                </tr>
                <tr role="row" class="even">
                  <td class="v-align-middle semi-bold sorting_1"><span class="title">Priority :</span></td>                            
                  <td class="v-align-middle semi-bold">@if ($tasks->priority == 'LW') low @elseif ($tasks->priority == 'MD') Medium @elseif ($tasks->priority == 'HG') High @endif</td>
                </tr>
                <tr role="row" class="odd">
                  <td class="v-align-middle semi-bold sorting_1"><span class="title">Estimated Hours :</span></td>                            
                  <td class="v-align-middle semi-bold">{{ $tasks->estimated_hours }}</td>
                </tr>
              </tbody>
            </table>  
            <div style="padding:10px 20px;">
                  <p class="bold sm-p-t-20">Description :</p>
                  <p>{{ $tasks->description }}</p> 
            </div>                      
            <div class="clearfix" style="padding:0px 20px;">
              @if ($tasks->task_status == 'created') 
              <a class="btn btn-primary" href="{{ route('task.edit_task', $tasks->id) }}">Edit Task</a>
              <a href="javascript:;" data-id="{{$tasks->id}}" data-title="{{$tasks->title}}" data-task_code="{{$tasks->task_code}}" data-url="{{ route('task.assign_task', $tasks->id) }}" data-toggle="modal" data-target="#assign-task" class="btn btn-success assignTask"><i class="fa fa-paper-plane"></i> Assign</a>
              @elseif ($tasks->task_status == 'pending') 
              <a href="javascript:;" data-id="{{$tasks->id}}" data-title="{{$tasks->title}}" data-task_code="{{$tasks->task_code}}" data-url="{{ route('task.action_task', $tasks->id) }}" data-toggle="modal" data-target="#action-task" class="btn btn-success actionTask">Action</a>
              @elseif ($tasks->task_status == 'active')
              <a href="javascript:;" data-id="{{$tasks->id}}" data-title="{{$tasks->title}}" data-task_code="{{$tasks->task_code}}" data-url="{{ route('taskComment.save_comment') }}" data-toggle="modal" data-target="#add-comment" class="btn btn-primary addComment">Add comment</a>
              <a href="javascript:;" data-task_id="{{$tasks->task_id}}" data-title="{{$tasks->title}}" data-task_code="{{$tasks->task_code}}" data-url="{{ route('task.action2_task', $tasks->id) }}" data-toggle="modal" data-target="#action2-task" class="btn btn-success action2Task">Action</a>
              @elseif ($tasks->task_status == 'onhold')
              <a href="javascript:;" data-id="{{$tasks->id}}" data-title="{{$tasks->title}}" data-task_code="{{$tasks->task_code}}" data-url="{{ route('taskComment.save_comment') }}" data-toggle="modal" data-target="#add-comment" class="btn btn-primary addComment">Add comment</a>
              <a href="javascript:;" data-id="{{$tasks->id}}" data-title="{{$tasks->title}}" data-task_code="{{$tasks->task_code}}" data-url="{{ route('task.unhold_task', $tasks->id) }}" data-toggle="modal" data-target="#unhold-task" class="btn btn-success unholdTask">UnHold</a>          
              @elseif ($tasks->task_status == 'completed')
              <a href="javascript:;" data-id="{{$tasks->id}}" data-title="{{$tasks->title}}" data-task_code="{{$tasks->task_code}}" data-url="{{ route('taskComment.save_comment') }}" data-toggle="modal" data-target="#add-comment" class="btn btn-primary addComment">Add comment</a>
              <a href="javascript:;" data-id="{{$tasks->id}}" data-title="{{$tasks->title}}" data-task_code="{{$tasks->task_code}}" data-url="{{ route('task.reassign_task', $tasks->id) }}" data-toggle="modal" data-target="#reassign-task" class="btn btn-success reassignTask">Reassign</a>
              @else
              <a href="javascript:;" data-id="{{$tasks->id}}" data-title="{{$tasks->title}}" data-task_code="{{$tasks->task_code}}" data-url="{{ route('taskComment.save_comment') }}" data-toggle="modal" data-target="#add-comment" class="btn btn-primary addComment">Add comment</a>
              @endif
              <a class="btn btn-complete" href="{{ URL::previous() }}">Go Back</a>
            </div>
            <!-- END card -->
          </div>  
        </div>
      </div>
    </div>                      
  </div>
  <div class="col-lg-1"></div>
  
  <div class="row box">              
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
              @if(session()->get('comment_added'))
                <div class="alert alert-success message" role="alert">
                  <button class="close" data-dismiss="alert"></button>
                  <strong>Success: </strong>
                    {{ session()->get('comment_added') }}  
                </div>
              @endif
    @if(count($comments)>0)
    <h5 class="semi-bold p-b-5">comment section :-</h5>
    @endif
    @foreach($comments as $comment)
      <div class="card social-card share full-width">
        <div class="circle" data-toggle="tooltip" title="" data-container="body" data-original-title="Label">
        </div>
        <div class="card-header clearfix">
          <div class="user-pic">
            <img alt="Profile Image" width="33" height="33" data-src-retina="/assets/img/profiles/{{ $comment->type }}.png" data-src="/assets/img/profiles/{{ $comment->type }}.png" src="/assets/img/profiles/{{ $comment->type }}.png">
          </div>
          <h5>{{ Str::title($comment->name) }}</h5>
          <h6>User
            <!-- <span class="location semi-bold"><i class="fa fa-map-marker"></i> SF, California</span> -->
          </h6>
        </div>
        <div class="card-description">
          <p>{{ $comment->comments }}</p>   
          <div class="via">
            {{ \Carbon\Carbon::parse($comment->created_at)->format('d/m/Y')}}
            at
            {{ \Carbon\Carbon::parse($comment->created_at)->format('H:i A')}}
          </div>
        </div>
      </div>
    @endforeach 

    </div>
    <div class="col-lg-1"></div>
  </div> 
</div>

<!-- END card -->

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
          <form action="{{ route('task.action_task', $tasks->id) }}" method="post" id="actionForm">
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
          <form action="{{ route('task.action2_task', $tasks->id) }}" method="post" id="action2Form">
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
          <form action="{{ route('task.unhold_task', $tasks->id) }}" method="post" id="unholdForm">
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

<!--add comment Modal -->
<div class="modal fade slide-up disable-scroll" id="add-comment" tabindex="-1" role="dialog" aria-hidden="false">
  <div class="modal-dialog ">
    <div class="modal-content-wrapper">
      <div class="modal-content">
        <div class="modal-header clearfix text-left">
        <button type="button" style="position: absolute; right: 0; padding: 2px 4px; margin-right:25px;" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>        
          <h4 class="m-b-25">Add your <span class="semi-bold">comment</span></h4>
          <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
        </div>
        <div class="modal-body">
          <form action="{{ route('taskComment.save_comment') }}" method="post" id="addComment">
          {{ csrf_field() }}
          {{ method_field('POST') }}
            <div class="form-group-attached">
              <!-- <div class="row m-b-20">
                <div class="col-md-4">
                  <div class=" ">
                    <label><b>Task ID :</b></label>
                    <span id="add_comment_task_code"></span>                                
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="">
                    <label><b>Task Name :</b></label>
                    <span id="add_comment_task_title"></span>               
                  </div>
                </div>
              </div> -->
              <div class="row m-b-20">
                <div class="col-md-12">
                    <label><b>Comment :</b></label>
                    <div class="form-group required @error('comment') has-error @enderror">
                    <textarea class="form-control" style="height:100px;" name="comment" id="comment" placeholder="Type your Comment...." required>{{ old('comment') }}</textarea>
                    @error('comment')<small id="ageHelp" class="text-danger">{{ $message }}</small>@enderror
                  </div>
                </div>
                <input type="hidden" id="add_comment_task_id" value="{{ $tasks->id }}" name="task_id">
              </div>              
              <div class="pull-right">
                <button type="submit" name="submit" class="btn btn-complete">Add Comment</button>            
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
          <form action="{{ route('task.reassign_task', $tasks->id) }}" method="post" id="reassignForm">
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
$(window).bind("load", function() {
  $(document).on("click", ".actionTask", function () {        
      //var url = $(this).data('url');
      var task_code = $(this).data('task_code');
      var title = $(this).data('title');
      //alert(title);
      //$("#actionForm").attr('action', url);
      $('#action_task_code').text(task_code);
      $('#action_task_title').text(title);
  });
});

// action2 modal script
$(window).bind("load", function() {
  $(document).on("click", ".action2Task", function () {        
    //var url = $(this).data('url');
    var task_code = $(this).data('task_code');
    var title = $(this).data('title');
    //alert(title);
    //$("#action2Form").attr('action', url);
    $('#action2_task_code').text(task_code);
    $('#action2_task_title').text(title);
  });
});

// unhold modal script
$(document).on("click", ".unholdTask", function () {        
    //var url = $(this).data('url');
    var task_code = $(this).data('task_code');
    var title = $(this).data('title');
    //alert(title);
    //$("#unholdForm").attr('action', url);
    $('#unhold_task_code').text(task_code);
    $('#unhold_task_title').text(title);
  });

// add comment modal script
$(window).bind("load", function() {
  $(document).on("click", ".addComment", function () {        
    //var url = $(this).data('url');
    var task_id = $(this).data('task_id');
    var task_code = $(this).data('task_code');
    var title = $(this).data('title');
    //alert(title);
    //$("#addComment").attr('action', url);
    $('#add_comment_task_id').text(task_id);
    $('#add_comment_task_code').text(task_code);
    $('#add_comment_task_title').text(title);
  });
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