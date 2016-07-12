 <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/blog-post.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Rakshith Blog</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>

                 
                 
                   
                <div class="col-sm-3 col-md-3">
                     <form class="navbar-form" role="search" action="/search" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="searchquery">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
              

          

          

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


 


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

            @yield('content')

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
              <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">                            
                              
                              @for($i=0; $i<(count($categories))/2; $i++)
                                <li><a href="/category/{{$categories[$i]->slug}}">{{$categories[$i]->name}}</a>
                                </li>
                              @endfor
                          
                                
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                                   
                              
                              @for($i=(count($categories))/2; $i<count($categories); $i++)

                                <li><a href="/category/{{$categories[$i]->slug}}">{{$categories[$i]->name}}</a>
                                </li>
                                
                              @endfor

                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Tags Available</h4>
                      <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">                            
                              
                              @for($i=0; $i<(count($tags))/2; $i++)
                                <li><a href="#">{{$tags[$i]->name}}</a>
                                </li>
                              @endfor
                          
                                
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                                   
                              
                              @for($i=(count($tags))/2; $i<count($tags); $i++)

                                <li><a href="#">{{$tags[$i]->name}}</a>
                                </li>
                                
                              @endfor

                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Rakshith 2016</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="{{asset('js/jquery.js')}}"></script>

  

   <script src="{{asset('js/bootstrap.min.js')}}"></script>

</body>

</html>
