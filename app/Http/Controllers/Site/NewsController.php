<?php

namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index(){
    	$news = DB::table('inner_news')->select('*')->where([
    		['type', '=', 'new'],
    	])->get();
    	return view('site/news', array('news' => $news));
    }
}
