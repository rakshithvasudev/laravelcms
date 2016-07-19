<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use  Sluggable;
    use  SluggableScopeHelpers;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password','role_id','is_active','photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function role(){
      return $this->belongsTo('App\Role');
    }


   public function photo(){
     return $this->belongsTo('App\Photo');
   }



   public function isAdmin(){

    if($this->role->name=="Administrator" && $this->is_active==1){

           return true; 
        
        }

     return false;   
   
    }


   public function posts(){

    return $this->hasMany('App\Post');

   } 


   public function category(){

    return $this->hasMany('App\Category');

   }



}
