<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use File;

class SubcatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $catSelect = $request->subcatSelect;
        if($catSelect == 'external') {
                $type ='type1';
                $link = $request->subcatLink;
        }
        else {
            $type ='type2';
            $link = $catSelect;
        }
        $id = DB::table('subcategory')->insertGetId([
            'category_id' => $request->categoryId,
            'type' => $type,
            'link' => $link,
            'title_ua' => $request->title_ua,
            'title_ru' => $request->local_ru ? $request->title_ru : null,
            'title_us' => $request->local_us ? $request->title_us : null,]);


        $categoryId = DB::table('subcategory')->where('subcategory_id',$id)->value('category_id');
        $category = DB::table('category')->where('category_id',$categoryId)->get();
        $subcategories = DB::table('subcategory')->where('category_id',$categoryId)->get()->toArray();
        $data = [
            'category' => $category[0],
            'subcategories' => $subcategories,
        ];
        return redirect('admin/nav/'.$request->categoryId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $categoryId = DB::table('subcategory')->where('subcategory_id',$id)->value('category_id');

        $category = DB::table('category')->where('category_id',$categoryId)->get();
        $subcategory = DB::table('subcategory')->where('subcategory_id',$id)->get();
        $data = [
            'category' => $category[0],
            'subcategory' => $subcategory[0],
        ];

        return view('admin.menu.menu_edit',compact('data'));
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
        DB::table('subcategory')->where('subcategory_id',$id)->update([
            'title_ua'=>$request->title_ua,
            'title_ru' => $request->local_ru ? $request->title_ru : null,
            'title_us' => $request->local_us ? $request->title_us : null,]);

        $catSelect = $request->subcatSelect;

        if($catSelect == 'external') {
            DB::table('subcategory')->where('subcategory_id',$id)->update([
                'type' => 'type1',
                'link' => $request->subcatLink
            ]);
        }
        else {
            DB::table('subcategory')->where('subcategory_id',$id)->update([
                'type' => 'type2',
                'link' => $catSelect
            ]);
        }
        $categoryId = DB::table('subcategory')->where('subcategory_id',$id)->value('category_id');
        $category = DB::table('category')->where('category_id',$categoryId)->get();
        $subcategories = DB::table('subcategory')->where('category_id',$categoryId)->get()->toArray();
        $data = [
            'category' => $category[0],
            'subcategories' => $subcategories,
        ];
        return redirect('admin/nav/'.$request->categoryId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $categoryId = DB::table('subcategory')->where('subcategory_id',$id)->value('category_id');
        $category = DB::table('category')->where('category_id',$categoryId)->get();
        $documents = DB::table('documents')->where('subcategory_id',$id)->get();

        foreach ($documents as $document){
            $file = $document->file_link;
            File::delete($file);
        }
        DB::table('subcategory')->where('subcategory_id',$id)->delete();
        DB::table('documents')->where('subcategory_id',$id)->delete();

        $subcategories = DB::table('subcategory')->where('category_id',$categoryId)->get()->toArray();
        $data = [
            'category' => $category[0],
            'subcategories' => $subcategories,
        ];

        return redirect('admin/nav/'.$categoryId);
    }
}
