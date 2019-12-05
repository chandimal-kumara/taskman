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
            <li class="breadcrumb-item link"><a href="{{ route('task.new_tasks') }}">Manager View</a></li>
            <li class="breadcrumb-item active link"><a href="{{ route('task.dispatched_tasks') }}">Dispatched Tasks</a></li>
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
        @include('/tasks/manager_view/nav_tabs')
        
<!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane slide-left active">
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
                                        <th class="task_th_25">Title</th>
                                        <th class="task_th_25">type</th>
                                        <th class="task_th_15">priority</th>
                                        <th class="task_th_15">Estimate Hours</th>                                        
                                        <th class="task_th_10">Status</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($dispatched_tasks as $task)
                                @if($task->created == Auth::user()->id || $task->assign == Auth::user()->id)
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
                                        @if($task->task_status == 'completed')
                                            <span class="label label-success">{{ $task->task_status }}</span>
                                        @elseif($task->task_status == 'cancelled')
                                            <span class="label label-warning">{{ $task->task_status }}</span>
                                        @else
                                            <span class="label label-info">{{ $task->task_status }}</span>
                                        @endif
                                      </td>                                        
                                    </tr>
                                    @endif
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right align-links">
                                    {!! $dispatched_tasks->links() !!}
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


@endsection

@section('script')

@include('custom/js')

@endsection