<?php

namespace App\Http\Controllers\admin\telegram;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use File;
use App;
class telegramResController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $telegram = DB::table('inner_news')
            ->where([
                ['type', '=', 'telegram'],
            ])
            ->get();

        $data = [
            'telegram' => $telegram,
        ];
        return view('admin.telegram.telegram_list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
//        $telegram = DB::table('inner_news')->leftJoin('preview','inner_news.inner_news_id','preview.inner_news_id')
//            ->where([
//                ['type', '=', 'telegram'],
////                ['inner_news_id', '=', 0],
//            ])
//            ->get();
//
//        $data = [
//            'telegram' => $telegram,
//        ];

//        return view('admin.telegram.telegram_create', compact('data'));
        return view('admin.telegram.telegram_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $inner_news = new App\InnerNews;

        $inner_news->type = 'telegram';
        $inner_news->title_ua = $request->title_ua;
        $inner_news->title_ru= $request->local_ru ? $request->title_ru : null;
        $inner_news->title_us= $request->local_us ? $request->title_us : null;
        $inner_news->date = date('Y-m-d H:i:s', strtotime($request->date));
        $inner_news->full_location_ua =  $request->full_location_ua;
        $inner_news->full_location_ru= $request->local_ru ? $request->full_location_ru: null;
        $inner_news->full_location_us= $request->local_us ? $request->full_location_us: null;
        $inner_news->full_description_ua = $request->full_description_ua;
        $inner_news->full_description_ru =  $request->local_ru ? $request->full_description_ru: null;
        $inner_news->full_description_us = $request->local_us ? $request->full_description_us: null;
        $inner_news->keywords = $request->keywords;
        $inner_news->description = $request->description;
        $inner_news->link= $request->link;
        $inner_news->save();
//        dd($inner_news->inner_news_id);

//        dd($request);
//        $last_id = DB::table('inner_news')
//            ->insertGetId([
//                'type' => 'telegram',
//                'title_ua' => $request->title_ua,
//                'title_ru' => $request->local_ru ? $request->title_ru : null,
//                'title_us' =>$request->local_us ? $request->title_us : null,
//                'date' => date('Y-m-d H:i:s', strtotime($request->date)),
//                'full_location_ua' => $request->full_location_ua,
//                'full_location_ru' => $request->local_ru ? $request->full_location_ru: null,
//                'full_location_us' => $request->local_us ? $request->full_location_us: null,
//                'full_description_ua' => $request->full_description_ua,
//                'full_description_ru' => $request->local_ru ? $request->full_description_ru: null,
//                'full_description_us' =>$request->local_us ? $request->full_description_us: null,
//                'keywords' => $request->keywords,
//                'description' => $request->description,
//                'link' => $request->link,
//            ]);

//        $previewPhotoInfo = explode(";base64,", $request->mainImage);
//        $previewPhotoExt =preg_replace('/\+[A-Za-z]*/i', '', str_replace('data:image/', '', $previewPhotoInfo[0]));
//        $previewPhoto = str_replace(' ', '+', $previewPhotoInfo[1]);
//        $previewFileName = 'preview' . '_' . $last_id . '.' . $previewPhotoExt;
//        Storage::disk('public')->put('images/uploads_announcements/' . $previewFileName, base64_decode($previewPhoto));
//        $previewPhotoPath = Storage::url('images/uploads_announcements/' . $previewFileName);
//        $previewPhotoPath = str_replace('/storage/', '', $previewPhotoPath);

//        if($request->file('img_path')){

//        $filePath = 'telegram-'.$last_id.'.'.$request->file('img_path')->getClientOriginalExtension();
//        $path = $request->file('img_path')->storeAs('images/uploads_telegram',$filePath,'public');
//        $request->img_path = $path;

            $filePath = 'telegram-'.$inner_news->inner_news_id.'.'.$request->file('img_path')->getClientOriginalExtension();
            $path = $request->file('img_path')->storeAs('images/uploads_telegram',$filePath,'public');
            $request->img_path = $path;

//        }
//        else
//            $path = DB::table('header')->where('id', '=', $id)->value('img_path');
        DB::table('preview')
            ->insert([
                'inner_news_id' => $inner_news->inner_news_id,
                'img_path' => $path,
                'short_location_ua' => $request->short_location_ua,
                'short_location_ru' => $request->local_ru ? $request->short_location_ru : null,
                'short_location_us' =>$request->local_us ? $request->short_location_us : null,
                'short_description_ua' => $request->short_description_ua,
                'short_description_ru' => $request->local_ru ? $request->short_description_ru : null,
                'short_description_us' =>$request->local_us ? $request->short_description_us : null,
            ]);


//            $post = new App\InnerNews;
//        $post -> setAttribute('full_description_ua',$request->full_description_ua);
//        $post -> setAttribute('title_ua',$request->title_ua);
////        $post->save();
//        }
        return redirect()->route('ad_telegram.telegram.index');
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
        $telegram = DB::table('inner_news')
            ->leftJoin('preview','inner_news.inner_news_id', '=','preview.inner_news_id')
            ->where([
                ['type', '=', 'telegram'],
                ['inner_news.inner_news_id', '=', $id],
            ])
            ->get();
        $data = [
            'telegram' => $telegram,
            'id'=>$id
        ];
//        dd($data);
        return view('admin.telegram.telegram_edit', compact('data'));

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

        if($request->file('img_path')){
            $filePath = 'telegram-'.$id.'.'.$request->file('img_path')->getClientOriginalExtension();
            $path = $request->file('img_path')->storeAs('images/uploads_telegram',$filePath,'public');
            $request->img_path = $path;

        }
        else $path = DB::table('preview')->where('inner_news_id', '=', $id)->value('img_path');

        $inner_news = App\InnerNews::find($id);

        $inner_news->type = 'telegram';
        $inner_news->title_ua = $request->title_ua;
        $inner_news->title_ru= $request->local_ru ? $request->title_ru : null;
        $inner_news->title_us= $request->local_us ? $request->title_us : null;
        $inner_news->date = date('Y-m-d H:i:s', strtotime($request->date));
        $inner_news->full_location_ua =  $request->full_location_ua;
        $inner_news->full_location_ru= $request->local_ru ? $request->full_location_ru: null;
        $inner_news->full_location_us= $request->local_us ? $request->full_location_us: null;
        $inner_news->full_description_ua = $request->full_description_ua;
        $inner_news->full_description_ru =  $request->local_ru ? $request->full_description_ru: null;
        $inner_news->full_description_us = $request->local_us ? $request->full_description_us: null;
        $inner_news->keywords = $request->keywords;
        $inner_news->description = $request->description;
        $inner_news->link= $request->link;
        $inner_news->save();

//        DB::table('inner_news')->where('inner_news_id',$id)->update([
//            'type' => 'telegram',
//            'title_ua' => $request->title_ua,
//            'title_ru' => $request->local_ru ? $request->title_ru : null,
//            'title_us' =>$request->local_us ? $request->title_us : null,
//            'date' => date('Y-m-d H:i:s', strtotime($request->date)),
//            'full_location_ua' => $request->full_location_ua,
//            'full_location_ru' => $request->local_ru ? $request->full_location_ru: null,
//            'full_location_us' => $request->local_us ? $request->full_location_us: null,
//            'full_description_ua' => $request->full_description_ua,
//            'full_description_ru' => $request->local_ru ? $request->full_description_ru: null,
//            'full_description_us' =>$request->local_us ? $request->full_description_us: null,
//            'keywords' => $request->keywords,
//            'description' => $request->description,
//            'link' => $request->link,
//        ]);



        DB::table('preview')->where('inner_news_id',$id)->update([
            'img_path' => $path,
            'short_location_ua' => $request->short_location_ua,
            'short_location_ru' => $request->local_ru ? $request->short_location_ru : null,
            'short_location_us' =>$request->local_us ? $request->short_location_us : null,
            'short_description_ua' => $request->short_description_ua,
            'short_description_ru' => $request->local_ru ? $request->short_description_ru : null,
            'short_description_us' =>$request->local_us ? $request->short_description_us : null,
        ]);
        return redirect()->route('ad_telegram.telegram.index');
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
        $file = DB::table('preview')
            ->where(
                [
                    ['inner_news_id', '=', $id],

                ])->value('img_path');
        File::delete($file);


        $order = App\InnerNews::find($id);

        $order->delete();
//        DB::table('inner_news')->where('inner_news_id', $id)->delete();

        return redirect()->route('ad_telegram.telegram.index');
    }
}
