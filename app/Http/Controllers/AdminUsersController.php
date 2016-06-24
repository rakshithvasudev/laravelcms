<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Role;
use App\Photo;

use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersCreateRequest;



class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

          $roles = Role::all();
         return view('admin.users.create')->with('roles',$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersCreateRequest $request)
    {
         $user = new User;
         $user->id =$request->id;
         $user->role_id =$request->role_id;
         $user->is_active =$request->is_active;
         $user->name =$request->name;
         $user->email =$request->email;
         $user->password=bcrypt($request->password);



         if($file=$request->file('photo_id')){

           $name=time().$file->getClientOriginalName();
           $file->move('images',$name);

         //  $photo=Photo::create(["file"=>$name]);
         //  $input['photo_id']=$photo->id;

          $photo=new Photo;
          $photo->file=$name;
          $photo->save();
          $user->photo_id=$photo->id;



          }

          $user->save();
         return redirect (url('/admin/users'));



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user= User::findOrFail($id);
         $roles = Role::all();

         return view('admin.users.edit')->with('user',$user)->with('roles',$roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        
        $user=User::findOrFail($id);

         $user->role_id =$request->role_id;
         $user->is_active =$request->is_active;
         $user->name =$request->name;
         $user->email =$request->email;
 
          if(trim($request->password)!=''){
         $user->password=bcrypt($request->password);
         }
         elseif(trim($request->password)=='') {
             
             $user->password=User::findOrFail($id)->password;
         }
           

         if($file=$request->file('photo_id')){

            $name=time().$file->getClientOriginalName();

            $file->move('images',$name);

          if($user->photo_id==0)
          {
                 $photo=new Photo;
          }  
         else{
                 $photo =Photo::findOrFail($user->photo_id);
                 unlink(public_path().$user->photo->file);

         }

          $photo->file=$name;
          $photo->save();
          $user->photo_id=$photo->id;


         }

     $user->update();
 
     return redirect (url('/admin/users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
         $user=User::findOrFail($id);
         
         if($user->photo_id!=0){
           unlink(public_path()."/images/".$user->photo->file);
         }

   

        
         $user->delete();

        if($user->photo_id!=0){
         $userphoto=Photo::findOrFail($user->photo->id);
         $userphoto->delete();
        }

         $request->session()->flash('deleted_user','The user was deleted');
         return redirect('admin/users');

    }

}
