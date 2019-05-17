<?php

namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnnouncementsController extends Controller
{
    public function index(){
    	$announcements = DB::table('inner_news')->select('*')->where([
    		['type', '=', 'announcement'],
    	])->get();
    	return view('site/announcements', array('announcements' => $announcements));
    }
}
