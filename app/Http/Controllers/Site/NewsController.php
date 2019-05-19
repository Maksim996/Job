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
        ])->orderBy('date', 'desc')->paginate(2);
        $ids = [];
        $i = 0;
        foreach($news as $one) {
            $ids[$i++] = $one->inner_news_id;
        }
        $previews = DB::table('preview')->select('*')->whereIn('inner_news_id', $ids)
        ->get()->toArray();
        $data = [
            'news' => $news,
            'previews' => $previews,
        ];
        return view('site/news', compact('data'));
    }
}
