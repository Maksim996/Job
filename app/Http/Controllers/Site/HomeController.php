<?php

namespace App\Http\Controllers\Site;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $practice = DB::select("SELECT * FROM `practice_intership_card`");
        $announcements_news = DB::select("SELECT * FROM `inner_news`");
        $announcements_news = DB::select("SELECT * FROM `inner_news`");

        $news = DB::table('inner_news')->select('*')->where([
            ['type', '=', 'new'],
        ])->get()->toArray();
        $announcements = DB::table('inner_news')->select('*')->where([
            ['type', '=', 'announcement'],
        ])->get()->toArray();
        $previews = DB::table('preview')->select('*')->orderBy('preview_id', 'desc')->limit(5)
        ->get()->toArray();

        $slider = DB::select("SELECT * FROM `partners`");
        $data = [
            'practice_intership_card' => $practice,
            'announcements_news' => $announcements_news,
            'slider' => $slider,
            'news' => $news,
            'announcements' => $announcements,
            'previews' => $previews,
        ];
        // dump($practice);
        return view('site/home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
