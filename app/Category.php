<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Category extends Model
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




    protected $fillable=[

    'name',


    ];


	public function user(){
		return $this->belongsTo('App\User');
	}

}
