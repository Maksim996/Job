<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Header;
use App\Http\Requests\HeaderRequest;
use DB;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $header = Header::all();
        $locale = $request['locale'];
        $data = [
            'header' => $header,
            'locale' => $locale,
        ];

        return view('admin.header', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function update(HeaderRequest $request)
    public function update(Request $request)
    {

        $id =1;
        // ->str_slug($request->input('name'))
        
        if($request->file('img_path')){

        $filePath = 'header_img'.'.' . $request->file('img_path')->getClientOriginalExtension();
        $path = $request->file('img_path')->storeAs('images/uploads_header',$filePath,'public');
        $request->img_path = $path;
        
        }
        else
            $path =   DB::table('header')->where('id', '=', $id)->value('img_path');

        DB::table('header')
        ->where('id', '=', $id)
        ->update([
            'img_path' => $path,
            'title_ua' => $request->title_ua,
            'title_ru' => $request->local_ru ? $request->title_ru : null,
            'title_us' => $request->local_us ? $request->title_us : null,
            'link' => $request->link,
            'content_ua' => $request->content_ua,
            'content_ru' =>  $request->local_ru ? $request->content_ru : null,
            'content_us' => $request->local_us ? $request->content_us : null,
            'keywords' => $request->keywords,
            'description' => $request->description,
        ]);

        $header = Header::all();

        $data = [
            'header' => $header
        ];
        return redirect('admin/header');
//        return view('admin.header', compact('data'));
    }
}
