 @extends('layouts.admin')
@section('title','All Media')

@section('content')

<div id="page-wrapper">

    <div class="container-fluid">

               


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
                                            </tr>
                                        </thead>

                                        
                                          @foreach($photos as $photo)
                                        <tbody>
                                            <tr>
                                              <td>{{$photo->id}}</td>
                                          
                                            
                                              <td><img width=120 height=100 src="{{$photo->file}}"></td>
                                                      
                                              <td>{{$photo->created_at->diffForHumans()}}</td>
                                              <td>{{$photo->updated_at->diffForHumans()}}</td>

                                            </tr>
                                            @endforeach
                                         
                                        </tbody>
                                    </table>
                                </div>



                            @endif
                                
                                <div class="text-right">
                                    <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                    </div>
                </div>
           
  

@endsection
