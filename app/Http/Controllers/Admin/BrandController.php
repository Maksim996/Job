<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/admin/partners');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function sendPartner(Request $request)
    {  
        /*$newId = DB::table('Partners')->insertGetId(['name_brand' => $request->title, 'img_path' => $request->img,'link' => $request->link]);*/
         $newId = 1;

         dump($request);
         $image = $request;
         $folder = '/images/partners/';
         $name = 'brandImage_'.$newId;
         $imageName = $name. '.' . $image->getClientOriginalExtension();
        dump($imageName);
        // request()->image->move(public_path('/images/partners/'), $imageName);
        
          //dump($filePath);
        //$imageName = $request->img->getClientOriginalExtension();

      
        return "naksda";
        //
    }

    public function store(Request $request)
    {

       /* DB::table('Partners')->insert(['name_brand' => $request.title, 'img_path' => $request.img,'link' => $request.link]);
        return "naksda";*/
        //
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
        //
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
    }
}
