@extends('layouts.admin')
@section('title','Create Posts')

@section('content')



<div id="page-wrapper">

    <div class="container-fluid">

               
                                <!-- Page Heading -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h1 class="page-header">
                                            Create <small> Posts </small>
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


                                  <form role="form" action="{{ url('/admin/posts') }}" method="post" enctype="multipart/form-data">
                                  <input type="hidden" name="_token" value="{{csrf_token()}}" />

                                        <div class="form-group">
                                          <label>Title:</label>
                                          <input type="text" name="title" class="form-control">
                                        </div>

                                       
                                        <div class="form-group">
                                           <label>Category:</label>
                                          
                                           <select class="form-control" name="category_id">
                                                     <option>Select Your Category</option>
                                                    @foreach($categories as $category)
                                                     <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                           </select>
                                        </div>


                                        <div class="form-group">
                                          <label for="exampleInputFile">Photo</label>
                                          <input type="file" name="photo_id">
                                        </div>

                                         <div class="form-group">
                                          <label>Description:</label>
                                          <textarea name="body" class="form-control" rows="8" id="comment"></textarea>
                                        </div>
                                        
                                       
                                       <button type="submit" class="btn btn-default">Create Post</button>
                                </form>




 



  </div>
  <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

@stop
