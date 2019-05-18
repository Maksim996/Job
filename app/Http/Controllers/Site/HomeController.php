<?php

namespace App\Http\Controllers\Site;
use DB;
use Carbon\Carbon;
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
        $date = Carbon::now()->toDateTimeString();
        $practice = DB::select("SELECT * FROM `practice_intership_card`");

        $news = DB::table('inner_news')->select('*')->where([
            ['type', '=', 'new'],
            ['date', '<', $date],
        ])
        ->orderBy('date', 'desc')
        ->limit(5)
        ->get()
        ->toArray();

        $ids = [];
        $i = 0;
        foreach($news as $one) {
            $ids[$i++] = $one->inner_news_id;
        }
        dump($ids);
        $announcements = DB::table('inner_news')->select('*')->where([
            ['type', '=', 'announcement'],
            ['date', '>', $date],
        ])
        ->orderBy('date', 'desc')
        ->limit(4)
        ->get()
        ->toArray();

        $previews = DB::table('preview')->select('*')
        ->whereIn('inner_news_id', $ids)
        ->get()
        ->toArray();

        $slider = DB::select("SELECT * FROM `partners`");

        $data = [
            'practice_intership_card' => $practice,
            'announcements' => $announcements,
            'previews' => $previews,
            'news' => $news,
            'slider' => $slider,
        ];
        // echo "<pre>";
        // print_r($data['previews']);
        // echo "</pre>";
        // die;

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
