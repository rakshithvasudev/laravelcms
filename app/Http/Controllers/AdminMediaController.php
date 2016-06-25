<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Photo;

class AdminMediaController extends Controller
{
 

	public function index(){

		$photos=Photo::all();
		return view('media.index')->with('photos',$photos);
	}

}
