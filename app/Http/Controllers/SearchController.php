<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use App\Tag;

class SearchController extends Controller
{
    public function search(Request $request){

    	$searchterm=$request->searchquery;

    	$postresults=Post::where('title','LIKE','%'.$searchterm.'%')->orWhere('body','LIKE','%'.$searchterm.'%')->get();

   		$tagresults=Tag::where('name','LIKE','%'.$searchterm.'%')->get();
 
    	return view('search.search')->with('postresults',$postresults)->with('tagresults',$tagresults)->with('searchterm',$searchterm);

    }
}
