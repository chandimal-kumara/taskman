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
        <li class="breadcrumb-item active link"><a href="{{ route('task_catagories.task_catagories') }}">Task Catagories</a></li>
      </ol>
      <!-- END BREADCRUMB -->
    </div>
  </div>
</div>

<div class="container-fluid container-fixed-lg box">
  <div class="row">
    <div class="col-lg-1"></div>
      <!-- START card -->
      <div class="card card-transparent col-lg-10 col-md-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-tabs-fillup">
          <li class="nav-item">
            <a href="#" class="active" data-toggle="tab" data-target="#slide1"><span>Task Catagories</span></a>
          </li>
        </ul>
        
      <div class="card-block" style="background-color:white;">
        <div class="pull-right">
          <div class="col-xs-12">
            <a href="{{ route('task_catagories.add_task_catagory') }}" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i>&nbsp;Add Catagory</a>
          </div>
        </div>

        <div class="table-responsive">
          <div id="detailedTable_wrapper" class="dataTables_wrapper no-footer">
          <br>
          @if(session()->get('success'))
              <div class="alert alert-success message" role="alert">
                <button class="close" data-dismiss="alert"></button>
                <strong>Success: </strong>
                  {{ session()->get('success') }}  
              </div>
            @endif 
                                        <!-- table-detailed  demo-table-dynamic table-responsive-block-->
            <table class="table table-hover table-responsive-block table-condensed dataTable no-footer" id="detailedTables" role="grid">
              <thead>
                <tr role="row">
                  <th style="width:20%" class="sorting_disabled" rowspan="1" colspan="1">Code</th>
                  <th style="width:30%" class="sorting_disabled" rowspan="1" colspan="1">Name</th>
                  <th style="width:50%" class="sorting_disabled" rowspan="1" colspan="1">Description</th>
                </tr>
              </thead>
              <tbody>  
                @foreach($task_catagories as $task_catagory)          
                  <tr role="row">
                    <td class="v-align-middle link"><a href="/users/edit_user/{{$task_catagory->id}}">{{$task_catagory->code}}</a></td>
                    <td class="v-align-middle">{{$task_catagory->name}}</td>
                    <td class="v-align-middle">{{$task_catagory->description}}</td>            
                @endforeach 
              </tbody>
            </table>  
          </div>
        </div>
      </div>
    </div>
      <!-- END card -->
    <div class="col-lg-1"></div>
  </div>
</div>

@include('custom/js')

@endsection
    