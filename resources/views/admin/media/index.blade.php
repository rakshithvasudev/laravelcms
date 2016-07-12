 @extends('layouts.admin')
@section('title','All Media')

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
                    Media <small> All </small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Images Available
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->


        				@if($photos)

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Created</th>
                                                <th>Updated</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>

                                        
                                          @foreach($photos as $photo)
                                        <tbody>
                                            <tr>
                                              <td>{{$photo->id}}</td>
                                          
                                            
                                              <td><img width=120 height=100 src="{{$photo->file}}"></td>
                                                      
                                              <td>{{$photo->created_at->diffForHumans()}}</td>
                                              <td>{{$photo->updated_at->diffForHumans()}}</td>
                                              
                                              <td>
                                                    <form role="form" action= "/admin/media/{{$photo->id}}"  method="POST">
                                                         <input type="hidden" name="_method" value="DELETE">
                                                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                          <div class="form-group">
                                                               <button  type="submit" class="btn btn-danger">Delete Photo</button>
                                                          </div>
                                                   </form>
                                              </td>

                                            </tr>
                                            @endforeach
                                         
                                        </tbody>
                                    </table>
                                </div>



                            @endif



                                
                                 {{$photos->links() }}
                                 
                            </div>
                    </div>
                </div>
           
  



@endsection
