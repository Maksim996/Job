<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
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
        $headers = Header::all();
        $data = [
            'header' => $headers,
        ];
        //dump($headers);die;

        return view('admin.header', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('/admin/header', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HeaderRequest $request)
    {
        $header = Header::create($request->validated());
        $header->save();

        $data = [
            'header' => $header,
        ];

        return view('/admin/header', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $header = Header::find($id);
        // $data = [
        //     'header' => $header
        // ];
        //dump($header);die;
        //return view('/admin/header', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $header = Header::findOrfail($id);
        $data = [
            'header' => $header
        ];
        //dump($header);die;
        return view('/admin/header', compact('data'));
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
        $header = Header::find($id);
        //dump($header);die;

        $request()->validate([
            'img_path' => 'required|max:200',
            'title' => 'required|max:200',
            'link' => 'required|max:200',
            'content' => 'required|max:200',
            'keywords' => 'required|max:200',
            'description' => 'description|max:200',
        ]);

        $header->update($request->all());
        $data = [
            'header' => $header
        ];
        
        //return view('/admin/header', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $header = Header::find($id);
        // $header->delete();
        // return view('/admin/header', compact('data'));
    }
}
