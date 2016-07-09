@extends('layouts.admin')
@section('title','Create Posts')

@section('content')



<div id="page-wrapper">

    <div class="container-fluid">

               <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

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

                                         



                                      <div class="form-group"> 
                                       <label>Tags:</label>
                                        <select class="selectpicker" multiple data-selected-text-format="count"  name="tags[]" class="form-control">
                                           @foreach($tags_list as $tag_list)
                                             <option value="{{$tag_list->id}}">{{$tag_list->name}}</option>
                                           @endforeach
                                        </select>
                                      </div>  
                                        


                                       <button type="submit" class="btn btn-default">Create Post</button>
                                </form>


                                 

        
            <script src="{{asset('js/jquery.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

@stop
