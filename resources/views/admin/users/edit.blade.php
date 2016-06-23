@extends('layouts.admin')
@section('title','Edit User')

@section('content')



<div id="page-wrapper">

    <div class="container-fluid">

                                <!-- Page Heading -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h1 class="page-header">
                                            Edit <small> User </small>
                                        </h1>
                                        <ol class="breadcrumb">
                                            <li class="active">
                                                <i class="fa fa-dashboard"></i> Below
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                                <!-- /.row -->

                                @include('errors.form_errors')


                      <div class="col-sm-3">
                      
                   <div class="form-group">
                             
                         <img width=250 class="img-rounded" height=180 src="{{$user->photo?$user->photo->file:'http://placehold.it/350x150'}}">
                            
                         <p>{{$user->photo?$user->photo->file:'No Profile Photo'}}</p>
                      </div>



                      </div>


                      <div class="col-sm-9">

                                <form role="form" action= "/admin/users/{{$user->id}}"  method="POST" enctype="multipart/form-data">
                                 <input type="hidden" name="_method" value="PATCH">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                        <div class="form-group">
                                          <label>Name:</label>
                                          <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                        </div>

                                        <div class="form-group">
                                            <label>Email:</label>
                                          <input type="email" name="email" class="form-control" value="{{$user->email}}">
                                        </div>

                                        <div class="form-group">
                                            <label>Password:</label>
                                          <input type="password" name="password" class="form-control">
                                        </div>


                                        <div class="form-group">
                                           <label>Role:</label>
                                           <select class="form-control" name="role_id">
                                             <option value="{{ $user->role_id }}">{{ $user->role->name }}</option>
                                           @if($roles->count() > 0)
                                                                                    
                                            @foreach($roles as $role)
                                              @if($role->id!=$user->role_id)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                              @endif
                                            @endforeach
                                           

                                            @else
                                            <p>No Roles Found</p>
                                            @endif
                                           </select>
                                        </div>



                                       <div class="form-group">
                                          <label>Status:</label>
                                          <select class="form-control" name="is_active">
                                          
                                           @if($user->is_active==1)
                                             <option value="1">Active</option>
                                             <option value="0">Not Active</option>
                                           @endif         
                                           
                                           @if($user->is_active==0)
                                             <option value="0">Not Active</option>
                                             <option value="1">Active</option>
                                           @endif
                                            
                                          </select>
                                        </div>

                                        <div class="form-group">
                                          <label>Choose another Picture?</label>
                                          <label for="exampleInputFile">File input</label>
                                             <input type="file" name="photo_id">
                                            
                                        </div>

                                       <button type="submit" class="btn btn-primary">Update User</button>
                                </form>

                                <form role="form" action= "/admin/users/{{$user->id}}"  method="POST">
                                 <input type="hidden" name="_method" value="DELETE">
                                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <div class="form-group">
                                       <button  type="submit" class="btn btn-danger">Delete User</button>
                                  </div>
                                </form>
























                       </div>   


  </div>
  <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

@stop
