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
        $headers = Header::all();

        $data = [
            'header' => $headers,
        ];

        return view('admin.header', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('admin.header');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HeaderRequest $request)
    {
        // $img_path = 'image_path';
        // $request->request->add(['img_path' => $img_path]);
        // dump($request);die;
        $header = Header::create($request->validated());
        $header->save();

        $data = [
            'header' => $header,
        ];

        return view('admin.header', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $header = Header::findorFail($id);
        // $data = [
        //     'header' => $header
        // ];
        //return view('admin.header', compact('data'));
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
        $header = Header::findOrfail($id);

        $header->update($request->validated());

        $data = [
            'header' => $header
        ];
        
        return view('admin.header', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $header = Header::findOrFail($id);
        // $header->delete();
        // return view('admin.header');
    }
}
