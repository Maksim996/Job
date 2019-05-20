<?php

namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AnnouncementController extends Controller
{
    public function index($id, $title){
    	$announcement = DB::table('inner_news')->select('*')->where([
    		['inner_news_id', '=', $id],
    	])->first();

    	$slider = DB::table('slider_news')
        ->select('*')
        ->where('inner_news_id', $announcement->inner_news_id)
        ->get()
        ->toArray();

    	$data = [
            'new' => $announcement,
            'slider' => $slider,
            'id' => $id,
            'title' => $title,
        ];

    	return view('site/post', compact('data'));
    }
}
