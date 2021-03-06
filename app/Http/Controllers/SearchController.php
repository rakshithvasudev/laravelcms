<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use App\Tag;

use App\Http\Requests\SearchRequest;

use App\Category;

use App\User;



class SearchController extends Controller
{
    public function search(Request $request){

    	$searchterm=$request->searchquery;

    	$postresults=Post::where('title','LIKE','%'.$searchterm.'%')->orWhere('body','LIKE','%'.$searchterm.'%')->get();

   		$tagresults=Tag::where('name','LIKE','%'.$searchterm.'%')->get();

      $userresults=User::where('name','LIKE','%'.$searchterm.'%')->get();

 
    	return view('search.search')->with('postresults',$postresults)->with('tagresults',$tagresults)->with('searchterm',$searchterm)->with( 'userresults',$userresults);

    }




  public function searchcategory($categoryslug){

  
  $category=Category::findBySlugOrFail($categoryslug);

  $categoryname=$category->name;

  $categoryresults=Post::whereCategoryId($category->id)->get();

  return view('search.categorysearch')->with('categoryresults',$categoryresults)->with('categoryname',$categoryname);

  }


 public function searchuser($userslug){

  
  $user=User::findBySlugOrFail($userslug);

  $posts=$user->posts;
 
  return view('search.usersearch')->with('posts',$posts)->with('user',$user);

  }





}
