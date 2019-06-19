<?php

namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class NewController extends Controller
{
    public function index($id, $title){
        $locale = $request['locale'];
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
        $left_footer = DB::table('footer')
            ->where([
                ['type', '=', 'left_column'],
            ])
            ->orderBy('footer_id', 'asc')
            ->get()
            ->toArray();

        $about_footer = DB::table('footer')
            ->where([
                ['type', '=', 'about_as'],
            ])
            ->orderBy('footer_id', 'desc')
            ->limit(1)
            ->get()
            ->toArray();

        $right_footer = DB::table('footer')
            ->where([
                ['type', '=', 'social'],
            ])
            ->orderBy('footer_id', 'asc')
            ->limit(7)
            ->get()
            ->toArray();
    	$data = [
            'new' => $new,
            'slider' => $slider_news,
            'category' => $category,
            'subcategory' => $subcategory,
            'header' => $header,
            'locale' => $locale,
            'left_footer' => $left_footer,
            'about_footer' => $about_footer,
            'right_footer' => $right_footer,

        ];

    	return view('site/post', compact('data'));
    }
}
