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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $new = DB::table('inner_news')
        ->where([
            ['type', '=', 'new'],
            ['inner_news.inner_news_id', '=', 0],
        ])
        ->get();

        $data = [
            'new' => $new,
        ];

        return view('admin.new', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InnerNewsRequest $request)
    {
        $request->img_path = $request->file('img_path')->store('images/uploads_news','public');

        $last_id = DB::table('inner_news')
        ->insertGetId([
            'type' => 'new',
            'title' => $request->title,
            'date' => $request->date,
            'full_location' => $request->full_location,
            'full_description' => $request->full_description,
            'keywords' => $request->keywords,
            'description' => $request->description
        ]);

        DB::table('preview')
        ->insert([
            'inner_news_id' => $last_id,
            'img_path' => $request->img_path,
            'short_location' => $request->short_location,
            'short_description' => $request->short_description,
        ]);

        $cnt = count($request->file('files'));
        for ($i = 0; $i < $cnt; $i++) { 
            $path = $request->file('files')[$i]->store('images/uploads_slider', 'public');
            DB::table('slider_news')
            ->insert([
                'inner_news_id' => $last_id,
                'img_path' => $path
            ]);
        }

        return redirect()->route('ad_news.news.index');
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

        $slider = DB::table('slider_news')
        ->where('inner_news_id', '=', $id)
        ->get();

        $data = [
            'new' => $new,
            'slider' => $slider
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
        $request->img_path = $request->file('img_path')->store('images/uploads_news','public');

        DB::table('inner_news')
        ->where('inner_news_id', '=', $id)
        ->update([
            'title' => $request->title,
            'date' => $request->date,
            'full_location' => $request->full_location,
            'full_description' => $request->full_description,
            'keywords' => $request->keywords,
            'description' => $request->description
        ]);

        DB::table('preview')
        ->where('inner_news_id', '=', $id)
        ->update([
            'img_path' => $request->img_path,
            'short_location' => $request->short_location,
            'short_description' => $request->short_description,
        ]);

        $cnt = count($request->file('files'));
        for ($i = 0; $i < $cnt; $i++) { 
            $path = $request->file('files')[$i]->store('images/uploads_slider', 'public');
            DB::table('slider_news')
            ->insert([
                'inner_news_id' => $id,
                'img_path' => $path
            ]);
        }

        return redirect()->route('ad_news.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = InnerNews::findOrFail($id);
        $new->delete();
        return redirect()->route('ad_news.news.index')->with('success', 'Новину видалено успішно');
    }
}
