@extends('layouts.master')

@section('content')

<style>
  .box{ margin:5px; }
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
        <li class="breadcrumb-item active link"><a href="{{ route('user.users') }}">Users</a></li>
      </ol>
      <!-- END BREADCRUMB -->
    </div>
  </div>
</div>


<div class="container-fluid  container-fixed-lg box">
  <div class="row">
    <div class="col-lg-1"></div>
      <!-- START card -->
      <div class="card card-transparent col-lg-10 col-md-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-tabs-fillup">
          <li class="nav-item">
            <a href="#" class="active" data-toggle="tab" data-target="#slide1"><span>Users</span></a>
          </li>
        </ul>
        
        <div class="card-block">
        <div class="pull-right">
                  <div class="col-xs-12">
                    <a href="{{ route('user.add_user') }}" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i>&nbsp;Add User</a>
                  </div>
                </div>
          <div class="table-responsive">
            <div id="detailedTable_wrapper" class="dataTables_wrapper no-footer">
            <br>
            @if(session()->get('success'))
                <div class="alert alert-success" role="alert">
                  <button class="close" data-dismiss="alert"></button>
                  <strong>Success: </strong>
                    {{ session()->get('success') }}  
                </div>
              @endif 
                                          <!-- table-detailed  demo-table-dynamic table-responsive-block-->
              <table class="table table-hover table-responsive-block table-condensed dataTable no-footer" id="detailedTables" role="grid">
                <thead>
                  <tr role="row">
                    <th style="width:25%" class="sorting_disabled" rowspan="1" colspan="1">Name</th>
                    <th style="width:25%" class="sorting_disabled" rowspan="1" colspan="1">Email</th>
                    <th style="width:20%" class="sorting_disabled" rowspan="1" colspan="1">Type</th>
                    <th style="width:10%" class="sorting_disabled" rowspan="1" colspan="1">Status</th>
                    <th style="width:20%" class="sorting_disabled" rowspan="1" colspan="1">Last Login</th>
                  </tr>
                </thead>
                <tbody>  
                  @foreach($users as $user)          
                    <tr role="row">
                      <td class="v-align-middle link"><a href="/users/edit_user/{{$user->id}}">{{$user->name}}</a></td>
                      <td class="v-align-middle">{{$user->email}}</td>
                      <td class="v-align-middle">{{$user->type}}</td>
                      <td class="v-align-middle">{{$user->status}}</td>
                    @if($user->last_login == null)
                      <td class="v-align-middle">0000-00-00 00:00:00</td>
                    @else
                      <td class="v-align-middle">{{ $user->last_login }}</td>
                    @endif      
                    </tr>
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

<br><br><br><br><br><br><br><br><br><br>

@endsection
    