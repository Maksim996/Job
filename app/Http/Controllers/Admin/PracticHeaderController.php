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
    public function index()
    {
        $practicContent = PracticeIntershipContent::all();

        $data = [
            'practicContent' => $practicContent,
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
    public function update(PracticeIntershipContentRequest $request, $id)
    {
        $practicContent = PracticeIntershipContent::findOrfail($id);

        $practicContent->update($request->all());

        $practicContent = PracticeIntershipContent::all();

        $data = [
            'practicContent' => $practicContent,
        ];

        return view('admin.practic-header', compact('data'));
    }
}
