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

                <!-- Post Content -->
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>
               
                <p>{{$post->body}}</p>

                <hr>

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
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img width="75" height="75" class="media-object" src="{{$comment->photo}}" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$comment->author}}
                                <small>{{$comment->created_at->diffForHumans()}}</small>
                            </h4>
                            {{$comment->body}}
                        </div>
                    </div>
                  @endforeach
            @else

                <h2>No Comments</h2>


            @endif
           
            
                <!-- Comment -->
              <!--   <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="{{$comment->photo}}" alt="">
                    </a>


                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.   -->
                        <!-- Nested Comment -->
                          <!-- <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>  -->
                        <!-- End Nested Comment -->
               <!--       </div> 
                        

                </div>
     


                            
                            </div>-->
                    </div>
                </div>
           
  

@endsection
