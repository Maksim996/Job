<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PracticeIntershipContent;
use App\Http\Requests\PracticeIntershipContentRequest;

class PracticHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $locale = $request['locale'];

        $practicContent = PracticeIntershipContent::all();
        $data = [
            'practicContent' => $practicContent,
            'locale' => $locale,

        ];

        return view('admin.practic-header', compact('data'));
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
        $practicContent = PracticeIntershipContent::findOrfail($id);

        $practicContent->update(
            [
                'title_ua' => $request->title_ua,
                'title_ru' => $request->local_ru ? $request->title_ru : null,
                'title_us' => $request->local_us ? $request->title_us : null,
                'content_ua' => $request->content_ua,
                'content_ru' =>  $request->local_ru ? $request->content_ru : null,
                'content_us' => $request->local_us ? $request->content_us : null,
            ]
        );

        $practicContent = PracticeIntershipContent::all();

        $data = [
            'practicContent' => $practicContent,
        ];

        return view('admin.practic-header', compact('data'));
    }
}
