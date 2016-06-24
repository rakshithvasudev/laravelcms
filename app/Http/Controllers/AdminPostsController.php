<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use App\Photo;

use App\User;

use App\Category;



use App\Http\Requests\PostsCreateRequest;
use Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $posts=Post::all();
       return view ('admin.posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories=Category::all();
      return view ('admin.posts.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {

        $user=Auth::user();
        $post=new Post;

        if($file=$request->file('photo_id')){

            $name=time().$file->getClientOriginalName();

               $file->move('images/posts',$name);
               
                $photo = new Photo;
                $photo->file=$name;
                $photo->save();
                $post->photo_id =$photo->id;

              }

              $post->user_id=Auth::user()->id;
              $post->title=$request->title;
              $post->body=$request->body;
              $post->category_id=$request->category_id;
              $post->save();
              
      
      return redirect('/admin/posts/');

        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $categories=Category::all();      
         $post = Post::findOrFail($id);
         return view ('admin.posts.edit')->with('post',$post)->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
            $user=Auth::user();
            $post=Post::findOrFail($id);

        if($file=$request->file('photo_id')){

            $name=time().$file->getClientOriginalName();

               $file->move('images/posts',$name);
               
                //$photo = new Photo;
             
               if($post->photo_id==0){
                    
                 $photo =new Photo;
                }

               else{
                $photo =Photo::findOrFail($post->photo_id);
                 unlink(public_path().$post->photo->file);

               }

                $photo->file=$name;
                $photo->save();
                $post->photo_id =$photo->id;

              }

              $post->user_id=Auth::user()->id;
              $post->title=$request->title;
              $post->body=$request->body;
              $post->category_id=$request->category_id;
              $post->update();
            
    return redirect('/admin/posts');

    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
