 @extends('layouts.admin')
@section('title','Users')

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
                    Comments <small> All </small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Comments Available
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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Post</th>
                                                <th>Status</th>
                                                <th>Created</th>
                                                <th>Updated</th>
                                                <th>Approve</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>

                                        @if(count($comments)>0)
                                          @foreach($comments as $comment)
                                        <tbody>
                                            <tr>
                                              <td><a href="/admin/comments/{{$comment->id}}">{{$comment->id}}</a></td>
                                              <td>{{$comment->author}} </td>
                                              <td>{{$comment->email}}</td>
                                              <td>{{$comment->post->title}} </td>
                                              <td>{{$comment->is_active==1?'Active':'Not Active'}}</td>
                                              <td>{{$comment->created_at->diffForHumans()}}</td>
                                              <td>{{$comment->updated_at->diffForHumans()}}</td>
                                              <td> 

                                                  <form role="form" action= "/admin/comments/{{$comment->id}}"  method="GET">
                                                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                              <div class="form-group">
                                                                   <button  type="submit" class="btn btn-success">Approve</button>
                                                              </div>
                                                 </form>

                                              </td>
                                              <td> 

                                                    <form role="form" action= "/admin/comments/{{$comment->id}}"  method="POST">
                                                         <input type="hidden" name="_method" value="DELETE">
                                                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                          <div class="form-group">
                                                               <button  type="submit" class="btn btn-danger">Delete Comment</button>
                                                          </div>
                                                   </form>


                                              </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <h2 class="text-center">No Comments to Display</h2>
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
                </div>
           
  

@endsection
