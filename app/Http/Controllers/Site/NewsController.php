<?php

namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function index(){
    	$date = Carbon::now()->toDateTimeString();
    	$news = DB::table('inner_news')->select('*')->where([
            ['type', '=', 'new'],
            ['date', '<', $date],
        ])->orderBy('date', 'desc')->limit(5)->get()->toArray();
        $ids = [];
        $i = 0;
        foreach($news as $one) {
            $ids[$i++] = $one->inner_news_id;
        }
        $previews = DB::table('preview')->select('*')->whereIn('inner_news_id', $ids)
        ->get()->toArray();
    	return view('site/news', array('news' => $news, 'previews' => $previews));
    }
}
