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
                   {{count($categoryresults)}} Post(s) for <span class="text-navy">{{$categoryname}}</span>
                    </h2>
                    
               
                  
                    <div class="hr-line-dashed"></div>
                        
                            @foreach($categoryresults as $categoryresult)
                                <div class="search-result">
                                    <h3><a href="/post/{{$categoryresult->slug}}">{{$categoryresult->title}}</a></h3>
                                    <a href="/post/{{$categoryresult->slug}}" class="search-link">http://localhost:8000/post/{{$categoryresult->slug}}</a>
                                    <p>
                                    {{$categoryresult->body,30}}
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