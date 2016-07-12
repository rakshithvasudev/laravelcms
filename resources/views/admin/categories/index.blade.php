@extends('layouts.admin')
@section('title','Users')

@section('content')

<div id="page-wrapper">

    <div class="container-fluid">

              @if(Session::has('deleted_user'))
                {{session('deleted_user')}}
              @endif


        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Categories <small> Index </small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Categories Available
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
                                                <th>Owner</th>
                                                <th>Created</th>
                                                <th>Updated</th>
                                                <th>Slug</th>
                                            </tr>
                                        </thead>

                                        @if($categories)
                                          @foreach($categories as $category)
                                        <tbody>
                                            <tr>
                                              <td>{{$category->id}}</td>
                                              <td><a href="/admin/categories/{{$category->id}}/edit">{{$category->name}}</a></td>
                                              @if($category->user_id!=0)
                                              <td>{{$category->user->name}}</td>
                                              @else
                                              <td>"Update User"</td>
                                              @endif
                                              <td>{{$category->created_at->diffForHumans()}}</td>
                                              <td>{{$category->updated_at->diffForHumans()}}</td>
                                              <td>{{$category->slug}}</td>
                                            </tr>
                                            @endforeach
                                          @endif
                                        </tbody>
                                    </table>
                                </div>
                           
                            </div>
                    </div>
                </div>
           
  

@endsection
