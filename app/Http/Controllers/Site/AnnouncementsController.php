<?php

namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class AnnouncementsController extends Controller
{
    public function index(){
    	$date = Carbon::now()->toDateTimeString();
        $announcements = DB::table('inner_news')->select('*')->where([
            ['type', '=', 'announcement'],
            ['date', '>', $date],
        ])
        ->orderBy('date', 'desc')->paginate(2);


        $ids = [];
        $i = 0;
        foreach($announcements as $one) {
            $ids[$i++] = $one->inner_news_id;
        }

        $previews = DB::table('preview')->select('*')
        ->whereIn('inner_news_id', $ids)
        ->get()
        ->toArray();

        $data = [
            'announcements' => $announcements,
            'previews' => $previews,
        ];

    	return view('site/announcements', compact('data'));
    }
}
