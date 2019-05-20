<?php

namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class NewController extends Controller
{
    public function index($id, $title){
    	$new = DB::table('inner_news')->select('*')->where([
    		['inner_news_id', '=', $id],
    	])->first();

    	$slider = DB::table('slider_news')
        ->select('*')
        ->where('inner_news_id', $new->inner_news_id)
        ->get()
        ->toArray();

    	$data = [
            'new' => $new,
            'slider' => $slider,
            'id' => $id,
            'title' => $title,
        ];

    	return view('site/post', compact('data'));
    }
}
