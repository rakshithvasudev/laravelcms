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
                   {{count($posts)}} Post(s) for <span class="text-navy">{{$user->name}}</span>
                    </h2>
                    
               
                  
                    <div class="hr-line-dashed"></div>
                        
                            @foreach($posts as $post)
                                <div class="search-result">
                                    <h3><a href="/post/{{$post->slug}}">{{$post->title}}</a></h3>
                                    <a href="/post/{{$post->slug}}" class="search-link">http://localhost:8000/post/{{$post->slug}}</a>
                                    <p>
                                    {{str_limit($post->body,$limit = 100,$end = '...')}}
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