@extends('layouts.admin')
@section('title','Create User')

@section('content')



<div id="page-wrapper">

    <div class="container-fluid">

                                <!-- Page Heading -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h1 class="page-header">
                                            Create <small> User </small>
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


                                <form role="form" action="{{ url('/admin/users') }}" method="post" enctype="multipart/form-data">
                                  <input type="hidden" name="_token" value="{{csrf_token()}}" />

                                        <div class="form-group">
                                          <label>Name:</label>
                                          <input type="text" name="name" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Email:</label>
                                          <input type="email" name="email" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Password:</label>
                                          <input type="password" name="password" class="form-control">
                                        </div>


                                        <div class="form-group">
                                           <label>Role:</label>
                                           <select class="form-control" name="role_id">
                                                     <option></option>
                                           @if($roles->count() > 0)
                                            @foreach($roles as $role)
                                             <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                            @else
                                            No Roles Found
                                            @endif
                                           </select>
                                        </div>



                                       <div class="form-group">
                                          <label>Status:</label>
                                          <select class="form-control" name="is_active">
                                                    <option></option>
                                            <option value="1">Active</option>
                                            <option value="0">Not Active</option>
                                          </select>
                                        </div>


                                        <div class="form-group">
                                          <label for="exampleInputFile">File input</label>
                                          <input type="file" name="photo_id">

                                        </div>


                                        <button type="submit" class="btn btn-default">Create User</button>
                                </form>



  </div>
  <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

@stop
