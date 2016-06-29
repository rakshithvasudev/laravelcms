<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use  App\Comment;
use Auth;
use DB;
use App\Post;

class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $comments=Comment::all(); 
       return view('admin.comments.index')->with('comments',$comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           
        $user=Auth::user();
        $comment = new Comment;
        $comment->post_id=$request->post_id;
        $comment->author=$user->name;
        $comment->email=$user->email;
        $comment->body=$request->body;
        $comment->photo=$user->photo->file;
        $comment->save();
       
       $request->session()->flash('Success_msg','Your Comment is waiting moderation');
        return back();
        
       
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
         $post=Post::findOrFail($id);
        // $comments=DB::table('comments')->where('post_id',$id)->get();
         $comments=$post->comments;
          return view('admin.comments.show')->with('comments',$comments)->with('post',$post);
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $comment=Comment::findOrFail($id);
         return view('admin.comments.editcomments')->with('comment',$comment);
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
     
     Comment::findOrFail($id)->update($request->all());
     return redirect('/admin/comments');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
      Comment::findOrFail($id)->delete();
      return redirect('/admin/comments');

    }
}
