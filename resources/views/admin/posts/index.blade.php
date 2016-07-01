@extends('layouts.admin')
@section('title','All Posts')

@section('content')



<div id="page-wrapper">

    <div class="container-fluid">

                @if(Session::has('Success_msg'))
                  {{session('Success_msg')}}
                @endif

                                <!-- Page Heading -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h1 class="page-header">
                                            All <small> Posts </small>
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

 
         <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Owner</th>
                                                <th>Category ID</th>
                                                <th>Photo</th>
                                                <th>Created</th>
                                                <th>Updated</th>
                                                <th>View Post</th>
                                                <th>View Comments</th>
                                                <th>Slug</th>

                                            </tr>
                                        </thead>

                                        @if($posts)
                                          @foreach($posts as $post)
                                        <tbody>
                                            <tr>
                                              <td>{{$post->id}}</td>
                                              <td><a href="/admin/posts/{{$post->id}}/edit">{{$post->title}}</a></td>
                                              <td>{{$post->user->name}}</td> 
                                              <td>{{$post->category?$post->category->name:"Uncategorized"}}</td>
                                            
                                             @if($post->photo)
                                              <td><img height="90" width="125" src="{{$post->photo->file}}"></td> 
                                             @else
                                              <td><img height="90" width="125" src="http://placehold.it/350x150"></td> 
                                             @endif   

                                             
                                              <td>{{$post->created_at->diffForHumans()}}</td>
                                              <td>{{$post->updated_at->diffForHumans()}}</td>
                                              <td><a  href="/post/{{$post->slug}}">{{$post->title}}</td>
                                              <td><a href="/admin/comments/{{$post->id}}">View Comments</td>
                                               <td>{{$post->slug}}</td>
                                            </tr>
                                         
                                            </tr>

                                            @endforeach
                                          @endif
                                        </tbody>
                                    </table>
                                </div>
                             





  </div>
  <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

@stop
