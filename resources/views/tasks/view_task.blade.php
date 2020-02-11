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
        <li class="breadcrumb-item link active"><a href="#">View Task</a></li>
      </ol>
      <!-- END BREADCRUMB -->
    </div>
  </div>
</div>
<!-- END JUMBOTRON -->

<div class="container-fluid container-fixed-lg">
  <!-- START card -->
  <div class="row box">
    <div class="card card-transparent col-lg-12 col-md-12">
      <ul class="nav nav-tabs nav-tabs-fillup">
          <li class="nav-item">
              <a href="#" class="active" data-toggle="tab" data-target="#slide1"><span>View {{  $task->task_status }} Task</span></a>
          </li>
      </ul> 
      <div class="tab-content">
        <div class="tab-pane slide-left active" id="slide1">
         <!-- START card -->
          <div class="container-fluid container-fixed-lg">
            <div class="row">
              <div class="col-lg-4 col-md-6 col-sm-12">
                <table class="table table-hover table-condensed dataTable no-footer" id="condensedTable" role="grid">
                  <tbody> 
                    <tr role="row" class="odd">
                      <td class="v-align-middle semi-bold sorting_1"><span class="title">Task Code :</span></td>                            
                      <td class="v-align-middle semi-bold">{{ $task->task_code }}</td>
                    </tr>
                    <tr role="row" class="even">
                      <td class="v-align-middle semi-bold sorting_1"><span class="title">Catagory :</span></td>                            
                      <td class="v-align-middle semi-bold">
                        @foreach($catagories as $catagory)
                          @if ($task->catagory == $catagory->code) {{$catagory->name}} @endif
                        @endforeach
                      </td>
                    </tr>                
                    <tr role="row" class="odd">
                      <td class="v-align-middle semi-bold sorting_1"><span class="title">Estimated Hours :</span></td>                            
                      <td class="v-align-middle semi-bold">{{ $task->estimated_hours }}</td>
                    </tr>                                    
                  </tbody>
                </table>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12">
              <table class="table table-hover table-condensed dataTable no-footer" id="condensedTable" role="grid">
                  <tbody> 
                    <tr role="row" class="odd">
                      <td class="v-align-middle semi-bold sorting_1"><span class="title">Title :</span></td>                            
                      <td class="v-align-middle semi-bold">{{ $task->title }}</td>
                    </tr>
                    <tr role="row" class="even">
                      <td class="v-align-middle semi-bold sorting_1"><span class="title">Priority :</span></td>                            
                      <td class="v-align-middle semi-bold">@if ($task->priority == 'LW') low @elseif ($task->priority == 'MD') Medium @elseif ($task->priority == 'HG') High @endif</td>
                    </tr>                
                    <tr role="row" class="odd">
                      <td class="v-align-middle semi-bold sorting_1"><span class="title">Task Creator :</span></td>                            
                      <td class="v-align-middle semi-bold">
                      @foreach($users as $user)
                        @if($task->created == $user->id)
                          {{$user->user_id}}
                        @endif
                      @endforeach
                      </td>
                    </tr>                                  
                  </tbody>
                </table>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12">
                <table class="table table-hover table-condensed dataTable no-footer" id="condensedTable" role="grid">
                  <tbody> 
                    <tr role="row" class="odd">
                      <td class="v-align-middle semi-bold sorting_1"><span class="title">Status :</span></td>                            
                      <td class="v-align-middle semi-bold"><span class="label label-info">{{ $task->task_status }}</span></td>
                    </tr>
                    <tr role="row" class="even">
                      <td class="v-align-middle semi-bold sorting_1"><span class="title">Department :</span></td>                            
                      <td class="v-align-middle semi-bold">
                        @foreach($departments as $department)
                          @if($task->department == $department->id)
                            {{$department->dep_id}}
                          @endif
                        @endforeach
                      </td>
                    </tr>                
                    <tr role="row" class="odd">
                      <td class="v-align-middle semi-bold sorting_1"><span class="title">Task Assignee :</span></td>                            
                      <td class="v-align-middle semi-bold">
                      @if($task->task_status == 'new')
                        <a href="javascript:;" data-id="{{$task->id}}" data-title="{{$task->title}}" data-task_code="{{$task->task_code}}" data-url="{{ route('task.assign_task', $task->id) }}" data-toggle="modal" data-target="#assign-task" class="btn btn-success btn-xs assignTask"><i class="fa fa-paper-plane"></i> Assign</a>
                      @else
                        @foreach($users as $user)
                          @if($task->assign == $user->id)
                            {{$user->user_id}}
                          @endif
                        @endforeach
                      @endif                    
                      </td>
                    </tr>                                    
                  </tbody>
                </table>
              </div>
            </div>

            <div class="m-b-5 des_hover">
                  <p class="bold sm-p-t-20">Description :</p>
                  <p>{{ $task->description }}</p> 
            </div>  
                                      
            <div class="clearfix pull-right">
                <a href="javascript:;" data-id="{{$task->id}}" data-title="{{$task->title}}" data-task_code="{{$task->task_code}}" data-url="{{ route('taskComment.save_comment') }}" data-toggle="modal" data-target="#add-comment" class="btn btn-primary addComment"><i class="fa fa-comment"></i></a>              
              @if ($task->task_status == 'new' && $task->created == Auth::user()->id) 
                <a class="btn btn-warning" href="{{ route('task.edit_task', $task->id) }}"><i class="fa fa-edit"></i></a>
                <a href="javascript:;" data-task_code="{{$task->task_code}}" data-url="{{ route('task.destroy_task', $task->id) }}" data-toggle="modal" data-target="#delete-task" class="btn btn-danger deleteTask"><i class="fa fa-trash"></i></a>                
              @elseif ($task->task_status == 'assigned' && $task->assign == Auth::user()->id)               
                <a href="javascript:;" data-id="{{$task->id}}" data-title="{{$task->title}}" data-task_code="{{$task->task_code}}" data-url="{{ route('task.accept_task', $task->id) }}" data-toggle="modal" data-target="#accept-task" class="btn btn-success acceptTask"><i class="fa fa-check-circle"></i></a>
                <a href="javascript:;" data-id="{{$task->id}}" data-title="{{$task->title}}" data-task_code="{{$task->task_code}}" data-url="{{ route('task.cancel_task', $task->id) }}" data-toggle="modal" data-target="#cancel-task" class="btn btn-warning cancelTask"><i class="fa fa-times-circle"></i></a>
              @elseif ($task->task_status == 'active' && $task->assign == Auth::user()->id)                              
                <a href="javascript:;" data-task_id="{{$task->task_id}}" data-title="{{$task->title}}" data-task_code="{{$task->task_code}}" data-url="{{ route('task.complete_task', $task->id) }}" data-toggle="modal" data-target="#complete-task" class="btn btn-success completeTask"><i class="fa fa-cart-arrow-down"></i></a>
                <a href="javascript:;" data-task_id="{{$task->task_id}}" data-title="{{$task->title}}" data-task_code="{{$task->task_code}}" data-url="{{ route('task.onhold_task', $task->id) }}" data-toggle="modal" data-target="#onhold-task" class="btn btn-warning onholdTask"><i class="fa fa-pause"></i></a>
              @elseif ($task->task_status == 'onhold' && $task->assign == Auth::user()->id)              
                <a href="javascript:;" data-id="{{$task->id}}" data-title="{{$task->title}}" data-task_code="{{$task->task_code}}" data-url="{{ route('task.unhold_task', $task->id) }}" data-toggle="modal" data-target="#unhold-task" class="btn btn-success unholdTask"><i class="fa fa-play"></i></a>          
              @elseif ($task->task_status == 'completed' && $task->created == Auth::user()->id)              
                <a href="javascript:;" data-id="{{$task->id}}" data-title="{{$task->title}}" data-task_code="{{$task->task_code}}" data-url="{{ route('task.reassign_task', $task->id) }}" data-toggle="modal" data-target="#reassign-task" class="btn btn-success reassignTask"><i class="fa fa-undo"></i></a>
              @else
                
              @endif              
                <a class="btn btn-complete" href="{{ URL::previous() }}"><i class="fa fa-arrow-left"></i></a>
            </div>
          </div>
            <!-- END card -->
        </div>  
      </div>
    </div>
  </div>                      
</div>
  
<div class="container-fluid container-fixed-lg">
  <div class="row box">              
    <div class="col-lg-1 col-md-1"></div>
    <div class="col-lg-10 col-md-10 col-sm-12">
        @if(session()->get('comment_added'))
          <div class="alert alert-success message" role="alert">
            <button class="close" data-dismiss="alert"></button>
            <strong>Success: </strong>
              {{ session()->get('comment_added') }}  
          </div>
        @endif
        @if(count($comments)>0)
        <h5 class="title semi-bold p-b-5">comment section :-</h5>
        @endif
        @foreach($comments as $comment)
          <div class="card social-card share full-width">
            <div class="circle" data-toggle="tooltip" title="" data-container="body" data-original-title="Label"></div>
            <div class="card-header clearfix">
              <div class="user-pic">
                <img alt="Profile Image" width="33" height="33" data-src-retina="/assets/img/profiles/{{ $comment->type }}.png" data-src="/assets/img/profiles/{{ $comment->type }}.png" src="/assets/img/profiles/{{ $comment->type }}.png">
              </div>
              <h5>{{ Str::title($comment->name) }}</h5>
              <h6>Wrote 
                @if($comment->created == $comment->id)
                  <span style="font-weight: bold;">(Task creator)</span>
                @elseif($comment->assign == $comment->id)
                  <span style="font-weight: bold;">(Task assignee)</span>
                @else
                  <span style="font-weight: bold;">(Other user)</span>
                @endif
                on 
                {{ \Carbon\Carbon::parse($comment->created_at)->format('d/m/Y')}}
                at
                {{ \Carbon\Carbon::parse($comment->created_at)->format('h:i A')}}
                <!-- <span class="location semi-bold"><i class="fa fa-map-marker"></i> SF, California</span> -->
              </h6>
            </div>
            <div class="card-description">
              <p>{{ $comment->comments }}</p>   
              <!--  <div class="via">
                
              </div>  -->
            </div>
          </div>
    @endforeach 
    </div>
    <div class="col-lg-1 col-md-1"></div>
</div>
<!-- END card -->

@include('inc/modal')

@endsection

@section('script')

@include('custom/js')

@endsection