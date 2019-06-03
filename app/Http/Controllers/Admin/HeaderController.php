<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Header;
use App\Http\Requests\HeaderRequest;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $header = Header::all();

        $data = [
            'header' => $header,
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
    public function update(HeaderRequest $request, $id)
    {
        $img_path = 'http://job.sumdu.edu.ua/header.svg';
        $request->merge(['img_path' => $img_path]);
        //dump($request->all());die;

        $header = Header::findOrfail($id);

        $header->update($request->validated());

        $header = Header::all();

        $data = [
            'header' => $header
        ];
        
        return view('admin.header', compact('data'));
    }
}
