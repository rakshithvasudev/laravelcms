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
                    Users <small> All </small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Comments Available
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->




                            
                            </div>
                    </div>
                </div>
           
  

@endsection
