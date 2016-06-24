@extends('layouts.admin')
@section('title','Users')

@section('content')

<div id="page-wrapper">

    <div class="container-fluid">

              @if(Session::has('deleted_user'))
                {{session('deleted_user')}}
              @endif


        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Users <small> Index </small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Users Available
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->




                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Created</th>
                                                <th>Updated</th>
                                            </tr>
                                        </thead>

                                        @if($users)
                                          @foreach($users as $user)
                                        <tbody>
                                            <tr>
                                              <td>{{$user->id}}</td>
                                          
                                             @if($user->photo)
                                              <td><img width=120 height=100 src="/images/{{$user->photo?$user->photo->file:'http://placehold.it/350x150'}}"></td>
                                            @else
                                             <td><img width=120 height=100 src="http://placehold.it/350x150"></td>
                                            @endif 

                                              <td><a href="/admin/users/{{$user->id}}/edit">{{$user->name}}</a></td>
                                              <td>{{$user->email}}</td>
                                              <td>{{$user->role->name}}</td>
                                              <td>{{$user->is_active==1?'Active':'Not Active'}}</td>
                                              <td>{{$user->created_at->diffForHumans()}}</td>
                                              <td>{{$user->updated_at->diffForHumans()}}</td>

                                            </tr>
                                            @endforeach
                                          @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                    </div>
                </div>
           
  

@endsection
