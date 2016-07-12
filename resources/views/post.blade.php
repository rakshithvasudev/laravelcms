@extends('layouts.blog-post')
@section('title','Posts')

@section('content')

<div id="page-wrapper">

    <div class="container-fluid">



                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                @if($post->photo)
                <img class="img-responsive" src="{{$post->photo->file}}" alt="">
               @else 
                 <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                 @endif
                <hr>

                
                <p>{{$post->body}}</p>

                <hr>

                <h3>Tags</h3>
                  <ul>
                    @foreach($post->tags as $tag)
                     <li>{{$tag->name}}</li>
                     @endforeach
                  </ul>

                <hr>

                <h3>Comment</h3>
                <!-- Blog Comments -->
              @if(Session::has('Success_msg'))
                {{session('Success_msg')}}
              @endif
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    
                    <form role="form" action="{{url('admin/comments')}}" method="POST">
                     <input type="hidden" name="_token" value="{{csrf_token()}}" />
                       <input type="hidden" name="post_id" value="{{$post->id}}" />
                        
                        <div class="form-group">
                            <textarea name="body" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
              @if(count($comments)>0)
                   @foreach($comments as $comment)
                    @if($comment->is_active==1)
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img width="75" height="75" class="media-object" src="{{$comment->photo}}" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$comment->author}}
                                <small>{{$comment->created_at->diffForHumans()}}</small>
                            </h4>
                            {{$comment->body}}
                            
                             
                         @if(count($comment->replies)>0)
                            @foreach($comment->replies as $reply)
                             <div class="comment-reply-container"> 
                                <div class="nested-comment media" >
                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="{{$reply->photo}}" alt="" width="75" height="75">
                                    </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">{{$reply->author}}
                                                <small>{{$reply->created_at->diffForHumans()}}</small>
                                            </h4>
                                         {{$reply->body}}
                                        </div>
                                </div> 
                             </div>   
                            @endforeach
                          @endif 
                                 
                             
                                <form class="form-setup" role="form" action="{{url('comment/reply')}}" method="POST">
                                     <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                      <input type="hidden" name="comment_id" value="{{$comment->id}}" />
                                      
                                        <div class="form-group">
                                            <textarea name="body" class="form-control" rows="3"></textarea>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                  </form>  
                         
                        
                       </div>
                    </div>

                      
                    @endif
                  @endforeach
            @else

                <h2>No Comments</h2>


            @endif
           
            
                                   
                             
                    </div>
                </div>
           
  

@endsection
