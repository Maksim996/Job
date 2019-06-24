<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class navMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = DB::table('category')->where('category_id','>','2')->get();
        $data = [
            'categories' => $categories,
        ];
        return view('admin.menu.menus',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
       $id_category = $request->id;
        $category = DB::table('category')->where('category_id',$id_category)->get();
        $data = [
            'category' => $category[0],
        ];

        return view('admin.menu.menu_create',compact('data'));
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
    public function show(Request $request, $id)
    {
        //
        $id_exclude = [1, 2];

        if(in_array($id, $id_exclude)){
            return abort(404);
        }

        $locale = $request['locale'];
        $category = DB::table('category')->where('category_id',$id)->get();
        $subcategories = DB::table('subcategory')->where('category_id',$id)->get()->toArray();
        $data = [
            'category' => $category[0],
            'subcategories' => $subcategories,
            'locale' => $locale,

        ];
        return view('admin.menu.menu',compact('data'));
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
        DB::table('category')
            ->where('category_id', $id)
            ->update([
                'title_ua' => $request->title_ua,
                'title_ru' => $request->title_ru,
                'title_us' => $request->title_us,
            ]);
        $catSelect = $request->catSelect;

        if($catSelect == 'external') {
            DB::table('category')->where('category_id',$id)->update([
                'type' => 'type2',
                'link' => $request->catLink
            ]);
        }
        else {
            DB::table('category')->where('category_id',$id)->update([
                'type' => 'type1',
                'link' => $catSelect
            ]);
        }
        $categories = DB::table('category')->where('category_id','>','2')->get();
        $data = [
            'categories' => $categories,
        ];
        return view('admin.menu.menus',compact('data'));
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
