<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
     public function index($id)
    {

    	$data = [];


    	return view('site/post', compact('data'));
    }

}
