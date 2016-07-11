<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use App\Photo;

use App\User;

use App\Category;

use  App\Comment;

use App\Tag;
use App\Http\Requests\PostsCreateRequest;
use Auth;
use DB;

use Flash;



class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
       $posts=Post::paginate(5);
       return view('admin.posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $categories=Category::all();
          $tags_list=Tag::all();
          return view ('admin.posts.create')->with('categories',$categories)->with('tags_list',$tags_list);
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

               $file->move(public_path().'/images/posts/',$name);
               
                $photo = new Photo;
                $photo->file="/images/posts/".$name;
                $photo->save();
                $post->photo_id =$photo->id;

              }

              $post->user_id=Auth::user()->id;
              $post->title=$request->title;
              $post->body=$request->body;
              $post->category_id=$request->category_id;
              $post->storedtags_ids=implode(",",$request->tags);
              $post->save();
              $post->tags()->attach($request->tags);
             

      flash()->success('Post Created Successfully');        
      
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
            $post_tags_ids=explode(",",$post->storedtags_ids);
            $tags_list=Tag::all();
            return view ('admin.posts.edit')->with('post',$post)->with('categories',$categories)->with('tags_list',$tags_list)->with('post_tags_ids',$post_tags_ids);



      
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

               $file->move(public_path().'/images/posts/',$name);
               
                //$photo = new Photo;
             
               if($post->photo_id==0){
                    
                 $photo =new Photo;
                }

               else{
                $photo =Photo::findOrFail($post->photo_id);
                 unlink(public_path().$post->photo->file);

               }

                $photo->file="/images/posts/".$name;
                $photo->save();
                $post->photo_id =$photo->id;

              }

              $post->user_id=Auth::user()->id;
              $post->title=$request->title;
              $post->body=$request->body;
              $post->category_id=$request->category_id;
              $post->storedtags_ids=implode(",",$request->tags);
              $post->update();
              $post->tags()->sync($request->tags);
                
                      
              flash()->success('Post Edited Successfully');     
              return redirect('/admin/posts');

    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
         $post=Post::findOrFail($id);
         if($post->photo_id!=0){
         unlink(public_path().$post->photo->file);
         }
        
         if($post->photo_id!=0){ 
         $photo=Photo::findOrFail($post->photo_id);
         $photo->delete();
         }

         $post->delete();

        flash()->success('Post Deleted Successfully');     
        return redirect('admin/posts');


    }
 
  public function post($slug){

     
    //$post=Post::findOrFail($id);
      $post=Post::findBySlugOrFail($slug);
   // $comments=DB::table('comments')->where('post_id',$id)->get();
      $categories=Category::groupBy('id')->having('id', '>', 0)->get();
      $comments=$post->comments()->whereIsActive(1)->get();
      return view('post')->with('post',$post)->with('comments',$comments);

//return  $comments;
  }
}
