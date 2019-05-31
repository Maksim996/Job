<?php

namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AnnouncementController extends Controller
{
    public function index($id, $title){
        $announcement = DB::table('inner_news')
        ->select('*')
        ->where([
            ['type', '=', 'announcement'],
            ['inner_news_id', '=', $id],
        ])
        ->first();

        $slider_announcements = DB::table('inner_news')
        ->leftJoin('slider_news', 'inner_news.inner_news_id', '=', 'slider_news.inner_news_id')
        ->where([
            ['type', '=', 'announcement'],
            ['inner_news.inner_news_id', '=', $id],
        ])
        ->get()
        ->toArray();

        $category = DB::table("category")->get()->toArray();
        $subcategory = DB::table("subcategory")->get()->toArray();

    	$data = [
            'new' => $announcement,
            'slider' => $slider_announcements,
            'category' => $category,
            'subcategory' => $subcategory,
        ];

    	return view('site/post', compact('data'));
    }
}
