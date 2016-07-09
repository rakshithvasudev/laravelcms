@extends('layouts.admin')
@section('title','Edit Posts')

@section('content')



<div id="page-wrapper">

    <div class="container-fluid">

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
                                <!-- Page Heading -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h1 class="page-header">
                                            Edit <small> Posts </small>
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





                                  <form role="form" action="/admin/posts/{{$post->id}}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_method" value="PATCH"> 
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />

                                  
                                    <div class="col-sm-9">
                                      <div class="form-group">

                                          @if($post->photo)  
                                          <img width=250 class="img-rounded" height=180 src="{{$post->photo?$post->photo->file:'http://placehold.it/350x150'}}">
                                          @else
                                          <img width=250 class="img-rounded" height=180 src="http://placehold.it/350x150">
                                          @endif

                                          <p>{{$post->photo?$post->photo->file:'No Profile Photo'}}</p>
                                          <label for="exampleInputFile">Photo</label>
                                          <input type="file" name="photo_id">
                                      </div>                       
                                   </div>  


                                    <div class="col-sm-9">
                                        <div class="form-group">
                                          <label>Title:</label>
                                          <input type="text" name="title" class="form-control" value="{{$post->title}}">
                                        </div>

                                       
                                        <div class="form-group">
                                           <label>Category:</label>
                                          
                                           <select class="form-control" name="category_id">
                                                 @if($post->category_id!=0)
                                                     <option value="{{$post->category_id}}">{{$post->category->name}}</option>

                                                            @foreach($categories as $category)
                                                                 @if($category->id!=$post->category_id)     
                                                                     <option value="{{$category->id}}">{{$category->name}}</option>
                                                                 @endif
                                                            @endforeach
                                                  

                                                 @elseif($post->category_id==0)
                                                 <h2>No categories <h2>
                                                 @endif
                                                            
                                                  
                                           </select>
                                      </div>
                         

                                         <div class="form-group">
                                          <label>Description:</label>
                                            <textarea name="body" class="form-control" rows="8" id="comment">{{$post->body}}</textarea>
                                        </div>
                                    
                   
                               

                                    <div class="form-group"> 
                                       <label>Tags:</label>
                                        <select  class="selectpicker" multiple data-selected-text-format="count"  name="tags[]" class="form-control">   @foreach($tags as $tag)
                                             <option value="{{$tag->id}}">{{$tag->name}}</option>
                                           @endforeach
                                        </select>
                                    </div>  

                                   
                                 <button type="submit" class="btn btn-success">Update Post</button>

                                       </div>   
                                 </form>

                               
                                 <form role="form" action= "/admin/posts/{{$post->id}}"  method="POST">
                                     <input type="hidden" name="_method" value="DELETE">
                                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <div class="form-group">
                                           <button  type="submit" class="btn btn-danger">Delete Post</button>
                                      </div>
                                </form>

 
 
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

@stop
