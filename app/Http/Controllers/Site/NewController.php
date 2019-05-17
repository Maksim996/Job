<?php

namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewController extends Controller
{
    public function index($id){

    	return view('site/post',array('id'=>$id));
    }
}
