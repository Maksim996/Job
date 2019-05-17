<?php

namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class NewController extends Controller
{
    public function index($id){
    	$new = DB::table('inner_news')->select('*')->where([
    		['inner_news_id', '=', $id],
    		['type', '=', 'new'],
    	])->get();

    	return view('site/post',array('id'=>$id, 'new' => $new));
    }
}
