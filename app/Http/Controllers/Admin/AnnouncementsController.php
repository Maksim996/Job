<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\InnerNews;
use App\Http\Requests\InnerNewsRequest;
use DB;
use Illuminate\Support\Facades\Storage;

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
        $announcement = DB::table('inner_news')
        ->where([
            ['type', '=', 'announcement'],
            ['inner_news_id', '=', 0],
        ])
        ->get();

        $data = [
            'announcement' => $announcement,
        ];

        return view('admin.announcement', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InnerNewsRequest $request)
    {
        $img_path = $request->file('mainImage')->store('images/uploads_announcements','public');

        $last_id = DB::table('inner_news')
        ->insertGetId([
            'type' => 'announcement',
            'title' => $request->formTitle,
            'date' => $request->dateMeeting,
            'full_location' => $request->fullLocation,
            'full_description' => $request->fullDescription,
            'keywords' => $request->additionalInfo,
            'description' => $request->pageDescription
        ]);

        DB::table('preview')
        ->insert([
            'inner_news_id' => $last_id,
            'img_path' => $request->mainImage,
            'short_location' => $request->shortLocation,
            'short_description' => $request->shortDescription,
        ]);

        $fNames = [];

        $sliderImageBase64 = $request->sliderImageBase64;

        dd(unserialize($sliderImageBase64));
        $cnt = count($request->sliderImageBase64);

        for ($i = 0; $i < $cnt; $i++) {
            $image = $request->sliderImageBase64[$i];
            $imageInfo = explode(";base64,", $image);
            $imgExt = str_replace('data:image/', '', $imageInfo[0]);
            $image = str_replace(' ', '+', $imageInfo[1]);
            $fileName = 'announcement' . '_' . $last_id . '_' . $i . '.' . $imgExt;
            Storage::disk('public')->put('images/uploads_slider/' . $fileName, base64_decode($image));
            // $convertedBase64 = str_replace(' ', '+', $request->sliderImageBase64[$i]);
            // $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $convertedBase64));
            // $fileName = 'announcement' . '-' . $sliderId . '-' . $i . $extension;
            // $fileName = 'announcement' . '_' . $last_id . '_' . $i . $extension;
            // dump($fileName);die;
            // Storage::disk('public')->put('images/uploads_slider/' . $fileName, $image);

            $imgPath = Storage::url('images/uploads_slider/' . $fileName);

            // $path = $request->file('files')[$i]->store('images/uploads_slider', 'public');
            // DB::table('slider_news')
            // ->where('id', $sliderId)
            // ->update([
            //     'img_path' => $imgPath
            // ]);

            $fNames[] = $fileName;

            DB::table('slider_news')
            ->insert([
                'inner_news_id' => $last_id,
                'img_path' => $imgPath
            ]);
        }
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

        $slider = DB::table('slider_news')
        ->where('inner_news_id', '=', $id)
        ->get();

        $data = [
            'announcement' => $announcement,
            'slider' => $slider
        ];

        return view('admin.announcement', compact('data'));
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
        $request->img_path = $request->file('img_path')->store('images/uploads_announcements','public');

        DB::table('inner_news')
        ->where([
            ['inner_news_id', '=', $id],
        ])
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

        return redirect()->route('ad_announcements.announcements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcement = InnerNews::findOrFail($id);
        $announcement->delete();
        return redirect()->route('ad_announcements.announcements.index')->with('success', 'Анонс видалено успішно');
    }
}
