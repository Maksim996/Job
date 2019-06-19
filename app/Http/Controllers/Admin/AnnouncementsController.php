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

        $previewPhotoInfo = explode(";base64,", $request->mainImage);
        $previewPhotoExt = str_replace('data:image/', '', $previewPhotoInfo[0]);
        $previewPhoto = str_replace(' ', '+', $previewPhotoInfo[1]);
        $previewFileName = 'preview' . '_' . $last_id . '.' . $previewPhotoExt;
        Storage::disk('public')->put('images/uploads_announcements/' . $previewFileName, base64_decode($previewPhoto));
        $previewPhotoPath = Storage::url('images/uploads_announcements/' . $previewFileName);
        $previewPhotoPath = str_replace('/storage/', '', $previewPhotoPath);

        DB::table('preview')
        ->insert([
            'inner_news_id' => $last_id,
            'img_path' => $previewPhotoPath,
            'short_location' => $request->shortLocation,
            'short_description' => $request->shortDescription,
        ]);

        $cnt = count($request->sliderImageBase64);

        for ($i = 0; $i < $cnt; $i++) {
            $sliderImage = $request->sliderImageBase64[$i];
            $sliderImageInfo = explode(";base64,", $sliderImage);
            $sliderImageExt = str_replace('data:image/', '', $sliderImageInfo[0]);
            $sliderImage = str_replace(' ', '+', $sliderImageInfo[1]);
            $sliderImageFileName = 'announcement' . '_' . $last_id . '_' . $i . '.' . $sliderImageExt;
            Storage::disk('public')->put('images/uploads_slider/' . $sliderImageFileName, base64_decode($sliderImage));
            $sliderImagePath = Storage::url('images/uploads_slider/' . $sliderImageFileName);
            $sliderImagePath = str_replace('/storage/', '', $sliderImagePath);

            DB::table('slider_news')
            ->insert([
                'inner_news_id' => $last_id,
                'img_path' => $sliderImagePath
            ]);
        }

        return response(200, 200);
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
        ->get()
        ->toArray();

        $preview = DB::table('preview')
        ->where('inner_news_id', '=', $id)
        ->get()
        ->toArray();

        $sliders = DB::table('slider_news')
        ->where('inner_news_id', '=', $id)
        ->get()
        ->toArray();

        $preview_image = array_map(function($prev_img) {
            $preview_path = public_path($prev_img->img_path);
            $mime_type = mime_content_type($preview_path);
            $base64 = base64_encode(file_get_contents($preview_path));
            $prev_img->img_path = 'data:' . $mime_type . ';base64,' . $base64;
            return $prev_img;
        }, $announcement);

        $slider_data = array_map(function($slider) {
            $full_path = public_path($slider->img_path);
            $mime_type = mime_content_type($full_path);
            $base64 = base64_encode(file_get_contents($full_path));
            $slider->img_path = 'data:' . $mime_type . ';base64,' . $base64;
            return $slider;
        }, $sliders);

        $data = [
            'announcement' => $announcement,
            'preview' => $preview,
            'sliders' => $slider_data
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
        DB::table('inner_news')
        ->where([
            ['inner_news_id', '=', $id],
        ])
        ->update([
            'type' => 'announcement',
            'title' => $request->formTitle,
            'date' => $request->dateMeeting,
            'full_location' => $request->fullLocation,
            'full_description' => $request->fullDescription,
            'keywords' => $request->additionalInfo,
            'description' => $request->pageDescription
        ]);

        $preview = DB::table('preview')
        ->where('inner_news_id', '=', $id)
        ->get()
        ->toArray();

        $preview_path = public_path($preview[0]->img_path);
        unlink($preview_path);

        DB::table('preview')
        ->where('inner_news_id', '=', $id)
        ->delete();

        $sliders = DB::table('slider_news')
        ->where('inner_news_id', '=', $id)
        ->get()
        ->toArray();

        foreach ($sliders as $slider) {
            $slider_path = public_path($slider->img_path);
            unlink($slider_path);
        }

        DB::table('slider_news')
        ->where('inner_news_id', '=', $id)
        ->delete();

        $previewPhotoInfo = explode(";base64,", $request->mainImage);
        $previewPhotoExt = str_replace('data:image/', '', $previewPhotoInfo[0]);
        $previewPhoto = str_replace(' ', '+', $previewPhotoInfo[1]);
        $previewFileName = 'preview' . '_' . $id . '.' . $previewPhotoExt;
        Storage::disk('public')->put('images/uploads_announcements/' . $previewFileName, base64_decode($previewPhoto));
        $previewPhotoPath = Storage::url('images/uploads_announcements/' . $previewFileName);
        $previewPhotoPath = str_replace('/storage/', '', $previewPhotoPath);

        DB::table('preview')
        ->insert([
            'inner_news_id' => $id,
            'img_path' => $previewPhotoPath,
            'short_location' => $request->shortLocation,
            'short_description' => $request->shortDescription,
        ]);

        $cnt = count($request->sliderImageBase64);

        for ($i = 0; $i < $cnt; $i++) {
            $sliderImage = $request->sliderImageBase64[$i];
            $sliderImageInfo = explode(";base64,", $sliderImage);
            $sliderImageExt = str_replace('data:image/', '', $sliderImageInfo[0]);
            $sliderImage = str_replace(' ', '+', $sliderImageInfo[1]);
            $sliderImageFileName = 'announcement' . '_' . $id . '_' . $i . '.' . $sliderImageExt;
            Storage::disk('public')->put('images/uploads_slider/' . $sliderImageFileName, base64_decode($sliderImage));
            $sliderImagePath = Storage::url('images/uploads_slider/' . $sliderImageFileName);
            $sliderImagePath = str_replace('/storage/', '', $sliderImagePath);

            DB::table('slider_news')
            ->insert([
                'inner_news_id' => $id,
                'img_path' => $sliderImagePath
            ]);
        }

        return response(200, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(InnerNewsRequest $request)
    {
        $id = $request->id;

        $preview = DB::table('preview')
        ->where('inner_news_id', '=', $id)
        ->get()
        ->toArray();

        $preview_path = public_path($preview[0]->img_path);
        unlink($preview_path);

        $sliders = DB::table('slider_news')
        ->where('inner_news_id', '=', $id)
        ->get()
        ->toArray();

        foreach ($sliders as $slider) {
            $slider_path = public_path($slider->img_path);
            unlink($slider_path);
        }

        DB::table('inner_news')->where('inner_news_id', $id)->delete();
    }
}
