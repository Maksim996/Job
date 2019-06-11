<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\InnerNews;
use App\Http\Requests\InnerNewsRequest;
use DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = DB::table('inner_news')
        ->leftJoin('preview', 'inner_news.inner_news_id', '=', 'preview.inner_news_id')
        ->where([
            ['type', '=', 'new'],
        ])
        ->get();

        $data = [
            'news' => $news,
        ];
        //dump($data['news']);die;

        return view('admin.news', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'type' => "0",
        ];
        return view('admin.new',compact('data'));
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
        echo "news_store";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $new = DB::table('inner_news')
        ->leftJoin('preview', 'inner_news.inner_news_id', '=', 'preview.inner_news_id')
        ->where([
            ['type', '=', 'new'],
            ['inner_news.inner_news_id', '=', $id],
        ])
        ->get();

        $data = [
            'type' => "1",
            'new' => $new,
        ];

        return view('admin.new', compact('data'));
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
        $request->merge(['full_location' => 'SumDU news']);
        $request->merge(['full_description' => 'Lorem ipsum news']);
        $request->merge(['img_path' => '/images/main/brands/cisco.png']);
        $request->merge(['short_location' => 'Short-Location-News-SumDU']);

        $full_location = $request->get('SumDU');
        $full_description = $request->get('Lorem ipsum');

        if($id != 0){
        DB::table('inner_news')
        ->where('inner_news_id', '=', $id)
        ->update([
            'title' => $request->get('title'),
            'date' => $request->get('date'),
            'full_location' => $request->get('full_location'),
            'full_description' => $request->get('full_description'),
            'keywords' => $request->get('keywords'),
            'description' => $request->get('description'),
        ]);

        DB::table('preview')
        ->where('inner_news_id', '=', $id)
        ->update([
            'img_path' => $request->get('img_path'),
            'short_location' => $request->get('short_location'),
            'short_description' => $request->get('short_description'),
        ]);
        }
        else{
            $newId = DB::table('inner_news')
                ->insertGetId([
                    'title' => $request->get('title'),
                    'date' => $request->get('date'),
                    'type' => 'new',
                    'full_location' => $request->get('full_location'),
                    'full_description' => $request->get('full_description'),
                    'keywords' => $request->get('keywords'),
                    'description' => $request->get('description'),
                ]);

            DB::table('preview')
                ->insert([
                    'inner_news_id' => $newId,
                    'img_path' => $request->get('img_path'),
                    'short_location' => $request->get('short_location'),
                    'short_description' => $request->get('short_description'),
                ]);
        }

        $news = DB::table('inner_news')
            ->leftJoin('preview', 'inner_news.inner_news_id', '=', 'preview.inner_news_id')
            ->where([
                ['type', '=', 'new'],
            ])
            ->get();

        $data = [
            'news' => $news,
        ];


        return view('admin.news', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table('inner_news')->where('inner_news_id', $request->id)->delete();
    }
}
