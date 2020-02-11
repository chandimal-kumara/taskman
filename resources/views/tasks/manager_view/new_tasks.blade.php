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
            <li class="breadcrumb-item active link"><a href="{{ route('task.new_tasks') }}">New Tasks</a></li>
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
                                <th class="task_th_25">Title</th>
                                <th class="task_th_25">Catagory</th>
                                <th class="task_th_25">priority</th>
                                <th class="task_th_15">Estimate Hours</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($new_tasks as $task)                          
                              <tr>
                                <td class="v-align-middle">
                                    <p class="link"><a href="/tasks/view_task/{{$task->id}}">{{$task->task_code}}</a></p>
                                </td>
                                <td class="v-align-middle">
                                    <p>{{str_limit($task->title, 25)}}</p>
                                </td>
                                <td class="v-align-middle">
                                    @foreach($catagories as $catagory)
                                    <p>@if ($task->catagory == $catagory->code) {{$catagory->name}} @endif</p> 
                                    @endforeach
                                </td>
                                <td class="v-align-middle">
                                    <p>@if ($task->priority == 'LW') low @endif @if ($task->priority == 'MD') Medium @endif @if ($task->priority == 'HG') High @endif</p>
                                </td>
                                <td class="v-align-middle">
                                    <p>{{$task->estimated_hours}}</p>
                                </td>    
                              </tr>                            
                            @endforeach 
                          </tbody>
                        </table>
                    </div>

                    <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right align-links">
                                    {!! $new_tasks->links() !!}
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