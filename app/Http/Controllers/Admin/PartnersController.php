<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Partners;
use App\Http\Request\PartnersRequest;
use DB;
use File;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = DB::table('partners')->get()->toArray();
         $data = [
            'partners' => $partners,
         ];
         return view('/admin/partners', compact('data'));
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
    public function store(Request $request)
    {
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
        $partners = DB::table('partners')
        ->where(
            [
                ['id', '=', $id],
                
            ])
        ->get()->toArray();
         $data = [
            'partners' => $partners[0],
         ];
         dump($data);
         return view('/admin/partner', compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $count = count(DB::table('partners')->get());
        if($id!=0){
            $partners = DB::table('partners')
            ->where(
                [
                    ['id', '=', $id],
                    
                ])
            ->get()->toArray();

             $data = [
                'id' => $id,
                'partners' => $partners[0],
                'count' => $count
             ];
         }
          else  
            $data = ['id' => $id, 'count' => $count];
             
        
                    
         
         return view('/admin/partner', compact('data'));
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

       if($request->file('img_path')){

        $filePath = 'partner_img-'.$id.'.' . $request->file('img_path')->getClientOriginalExtension();
        $path = $request->file('img_path')->storeAs('images/partners',$filePath,'public');
        $request->img_path = $path;
        
        }
        else if($id!=0)
            $path =   DB::table('partners')->where('id', '=', $id)->value('img_path');
        else $path = "";

        if($id!=0){
            DB::table('partners')
            ->where(
                [
                    ['id', '=', $id],
                    
                ])
            ->update([
                'name_brand' => $request->name,
                'link' => $request->link,
                'img_path' => $path,
            ]);
        }
        else {
            $id = DB::table('partners')
            ->where(
                [
                    ['id', '=', $id],
                    
                ])
            ->insertGetId([
                'name_brand' => $request->name,
                'link' => $request->link,
                'img_path' => $path,
            ]);
        }
          $partners = DB::table('partners')->get()->toArray();
         $data = [
            'partners' => $partners,
         ];
        return view('/admin/partners', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dump($id);
       $file = DB::table('partners')
        ->where(
            [
                ['id', '=', $id],
                
            ])->value('img_path');
       dump($file);
        File::delete($file);
        DB::table('partners')
        ->where(
            [
                ['id', '=', $id],
                
            ])
        ->delete();
      
    }
}
