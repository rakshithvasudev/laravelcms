@extends('layouts.admin')
@section('title','Edit Posts')

@section('content')



<div id="page-wrapper">

    <div class="container-fluid">

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

 



  </div>
  <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

@stop
