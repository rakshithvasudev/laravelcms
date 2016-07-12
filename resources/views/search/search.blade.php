@extends('layouts.blog-post')
@section('title','Search Results')

 

@section('content')
<link href="{{asset('css/searchresults.css')}}" rel="stylesheet">

 
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
            
                    <h2>
                   {{count($postresults)}} Post(s) & {{count($tagresults)}} Tag(s)   Results found for: <span class="text-navy">"{{$searchterm}}"</span>
                    </h2>
                    
               
                  
                    <div class="hr-line-dashed"></div>
                        <h2>Posts</h2>
                            @foreach($postresults as $postresult)
                                <div class="search-result">
                                    <h3><a href="/post/{{$postresult->slug}}">{{$postresult->title}}</a></h3>
                                    <a href="/post/{{$postresult->slug}}" class="search-link">http://localhost:8000/post/{{$postresult->slug}}</a>
                                    <p>
                                    {{$postresult->body,30}}
                                    </p>
                                </div>
                            @endforeach
                    <div class="hr-line-dashed"></div>

                    <div class="hr-line-dashed"></div>
                        <h2>Tags</h2>
                        @foreach($tagresults as $tagresult)
                        <div class="search-result">
                            <h3><a href="#">{{$tagresult->name}}</a></h3>
                            <a href="#" class="search-link">http://localhost:8000/tag/{{$tagresult->name}}</a>
                            <p>
                           None yet
                            </p>
                        </div>
                        @endforeach
                    <div class="hr-line-dashed"></div>
                  
                </div>
            </div>
        </div>
   </div>
</div>

 

@endsection