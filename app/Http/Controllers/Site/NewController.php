<?php

namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class NewController extends Controller
{
    public function index($id, $title){
    	$new = DB::table('inner_news')
        ->select('*')
        ->where([
            ['type', '=', 'new'],
    		['inner_news_id', '=', $id],
    	])
        ->first();

        $slider_news = DB::table('inner_news')
        ->leftJoin('slider_news', 'inner_news.inner_news_id', '=', 'slider_news.inner_news_id')
        ->where([
            ['type', '=', 'new'],
            ['inner_news.inner_news_id', '=', $id],
        ])
        ->get()
        ->toArray();
        //dump($slider_news);die;

        $category = DB::table("category")->get()->toArray();
        $subcategory = DB::table("subcategory")->get()->toArray();
        $header = DB::table('inner_news')->where('inner_news_id',$id)->get()->toArray();

    	$data = [
            'new' => $new,
            'slider' => $slider_news,
            'category' => $category,
            'subcategory' => $subcategory,
            'header' => $header,
        ];

    	return view('site/post', compact('data'));
    }
}
