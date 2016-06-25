@extends('layouts.fileupload')
@section('title','Upload Media')

 

@section('content')

                <div id="page-wrapper">

                    <div class="container-fluid">

               


                            <!-- Page Heading -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 class="page-header">
                                        Upload <small> Images </small>
                                    </h1>
                                    <ol class="breadcrumb">
                                        <li class="active">
                                            <i class="fa fa-dashboard"></i> Drag and Drop
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <!-- /.row -->
                            
                                 @include('errors.form_errors')


                       <form id="my-awesome-dropzone" class="dropzone"  action="{{ url('/admin/media') }}" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{csrf_token()}}" />

                                       
                                       <!--<input type="file" name="file" /> -->

                                    
                                         
                                      
                                       
                                      
                             </form>







        			 

                          
  
@endsection 


 