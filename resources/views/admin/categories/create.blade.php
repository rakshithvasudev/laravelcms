@extends('layouts.admin')
@section('title','Create Categories')

@section('content')



<div id="page-wrapper">

    <div class="container-fluid">

               
                                <!-- Page Heading -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h1 class="page-header">
                                            Create <small> Category </small>
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


                                  <form role="form" action="{{ url('/admin/categories') }}" method="post">
                                  <input type="hidden" name="_token" value="{{csrf_token()}}" />

                                        <div class="form-group">
                                          <label>Category Name:</label>
                                          <input type="text" name="name" class="form-control">
                                        </div>
                                                                                                    
                                       
                                       <button type="submit" class="btn btn-success">Create Category</button>
                                </form>




 



  </div>
  <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

@stop

