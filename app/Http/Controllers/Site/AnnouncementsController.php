<?php

namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AnnouncementsController extends Controller
{
    public function index(){
    	$announcements = DB::table('inner_news')->select('*')->where([
    		['type', '=', 'announcement'],
    	])->get()->toArray();
    	return view('site/announcements', array('announcements' => $announcements));
    }
}
