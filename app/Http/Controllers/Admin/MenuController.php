<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Header;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $locale = $request['locale'];
        $category = DB::table('category')->where('category_id',$id)->get();
        $subcategories = DB::table('subcategory')->where('category_id',$id)->get()->toArray();
        $data = [
            'category' => $category[0],
            'subcategories' => $subcategories,
            'locale' => $locale,

        ];
        return view('/admin/menu',compact('data'));
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
         $header = Header::all();

        $data = [
            'header' => $header,
        ];

       

        $catTitle = $request->catTitle;
        
            $catSelect = $request->catSelect;
            if($catSelect == 'external') {
                $catLink = $request->catLink;
                DB::table('category')->where('category_id',$id)->update(['title' => $catTitle, 'type' => 'type2', 'link' => $catLink]);
            }
            else {
                DB::table('category')->where('category_id',$id)->update(['title' => $catTitle, 'type' => 'type1', 'link' => $catSelect]);
            }
        
            $subIds = $request->id;
            $subTitles = $request->subcatTitle;
            $subSelects = $request->subcatSelect;
            $subLinks = $request->subcatLink;
            foreach($subIds as $position=>$subId){
                
                if($subSelects[$position] == 'external'){
                    if($subIds[$position] == 0)
                         DB::table('subcategory')->insert(['title' => $subTitles[$position], 'type' => 'type1', 'link' => $subLinks[$position],'category_id' => $id]);
                    else DB::table('subcategory')->where('subcategory_id',$subIds[$position])->update(['title' => $subTitles[$position], 'type' => 'type1', 'link' => $subLinks[$position],'category_id' => $id]);
                
                }
                else {
                    if($subIds[$position] == 0)
                        DB::table('subcategory')->insert(['title' => $subTitles[$position], 'type' => 'type2', 'link' => $subSelects[$position],'category_id' => $id]);
                    else
                        DB::table('subcategory')->where('subcategory_id',$subIds[$position])->update(['title' => $subTitles[$position], 'type' => 'type2', 'link' => $subSelects[$position],'category_id' => $id]);
                
                }
            }
            
            
        
     return view('admin.header', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($request)
    {
        dump($request);
        //
    }
     public function deleteSubcategory(Request $request)
    {
        DB::table('subcategory')->where('subcategory_id',$request->id)->delete();

        return Response(200, 200);
        //
    }
}
