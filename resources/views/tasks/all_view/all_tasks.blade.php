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
            <li class="breadcrumb-item link"><a href="{{ route('task.all_tasks') }}">All View</a></li>
            <li class="breadcrumb-item active link"><a href="{{ route('task.all_tasks') }}">All Tasks</a></li>
        </ol>
        <!-- END BREADCRUMB -->
        </div>
    </div>
</div>
<!-- END JUMBOTRON -->

<div class="container-fluid  container-fixed-lg">
    <!-- <h3><span class="semi-bold"  style="margin-left: 2%;">Tasks</span> Panel</h3>  -->
    <div class="card card-transparent ">
    <!-- Nav tabs -->

        <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
            <li class="nav-item">
                <a href="#" class="active"><span>All Tasks</span></a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane slide-left active">
                <div class=" container-fluid container-fixed-lg">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-lg-7 col-md-4 col-sm-12 m-b-10">
                                    <div class="card-title ">Choose or Search Task</div> 
                                </div>
                                <div class="col-lg-5 col-md-8 col-sm-12">  
                                    <form method="post" action="{{ route('task.all_tasks') }}" id="task-search" role="form">                                                                                                                 
                                            @csrf
                                        <div class="row">                                           
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 m-b-10">
                                                <input type="text" value="{{ old('task_search') }}" placeholder="Task ID or Name here" class="form-control" id="task_search" name="task_search">
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 m-b-10 no-padding sm-text-center">
                                                <button type="submit" class="btn btn-primary btn-large fs-15">Search</button>
                                            </div>                                        
                                        </div>
                                    </form>                                                                                                                                                               
                                </div>
                            </div>
                        </div>

                        @if(count($tasks)==0)
                            <div class="card-block text-center">No Results Available</div>
                        @else
                            <div class="card-block">

                                @if(session()->get('success_all'))
                                    <div class="alert alert-success message" role="alert">
                                    <button class="close" data-dismiss="alert"></button>
                                    <strong>Success: </strong>
                                        {{ session()->get('success_all') }}  
                                    </div>
                                @endif
                                
                                <table class="table table-hover table-responsive-block" id="">
                                    <thead>
                                        <tr>
                                            <th class="task_th_10">Task ID</th>
                                            <th class="task_th_20">Title</th>
                                            <th class="task_th_20">type</th>
                                            <th class="task_th_20">priority</th>
                                            <th class="task_th_20">Estimate Hours</th>
                                            <th class="task_th_10">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tasks as $task)
                                        <tr>
                                            <td class="v-align-middle">
                                                <p class="link"><a href="/tasks/view_task/{{$task->id}}"></i>{{$task->task_code}}</a></p>
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
                                            <td class="v-align-middle">
                                                <span class="label label-info">{{ $task->task_status }}</span>                                                                    
                                            </td>     
                                        </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right align-links">
                                    {!! $tasks->links() !!}
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- END card -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

@include('custom/js')

@endsection