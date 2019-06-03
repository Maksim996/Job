<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\InnerNews;
use App\Http\Requests\InnerNewsRequest;
use DB;

class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = DB::table('inner_news')
        ->leftJoin('preview', 'inner_news.inner_news_id', '=', 'preview.inner_news_id')
        ->where([
            ['type', '=', 'announcement'],
        ])
        ->get();

        $data = [
            'announcements' => $announcements,
        ];

        return view('admin.announcements', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "create announcements";
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
        echo "announcement_store";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $announcement = DB::table('inner_news')
        ->leftJoin('preview', 'inner_news.inner_news_id', '=', 'preview.inner_news_id')
        ->where([
            ['type', '=', 'announcement'],
            ['inner_news.inner_news_id', '=', $id],
        ])
        ->get();

        $data = [
            'announcement' => $announcement,
        ];

        return view('admin.announcement', compact('data'));
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
    public function update(InnerNewsRequest $request, $id)
    {
        $request->merge(['full_location' => 'SumDU-Announcements']);
        $request->merge(['full_description' => 'Lorem ipsum announcements']);
        $request->merge(['img_path' => '/images/main/brands/cisco.png']);
        $request->merge(['short_location' => 'Short-Location-Announcements-SumDU']);

        $full_location = $request->get('SumDU');
        $full_description = $request->get('Lorem ipsum');
        //dump($request->all());die;

        DB::table('inner_news')
        ->where([
            //['type', '=', 'announcement'],
            ['inner_news_id', '=', $id],
        ])
        ->update([
            'title' => $request->get('title'),
            'date' => $request->get('date'),
            'full_location' => $request->get('full_location'),
            'full_description' => $request->get('full_description'),
            'keywords' => $request->get('keywords'),
            'description' => $request->get('description'),
        ]);

        DB::table('preview')
        ->where([
            //['type', '=', 'announcement'],
            ['inner_news_id', '=', $id],
        ])
        ->update([
            'img_path' => $request->get('img_path'),
            'short_location' => $request->get('short_location'),
            'short_description' => $request->get('short_description'),
        ]);

        $announcement = DB::table('inner_news')
        ->leftJoin('preview', 'inner_news.inner_news_id', '=', 'preview.inner_news_id')
        ->where([
            ['type', '=', 'announcement'],
            ['inner_news.inner_news_id', '=', $id],
        ])
        ->get();

        $data = [
            'announcement' => $announcement,
        ];

        return view('admin.announcement', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $announcement = InnerNews::findOrFail($id);
        // $announcement->delete();
        // return redirect()->route('admin.announcements')->with('success', 'Анонс видалено успішно');
    }
}
