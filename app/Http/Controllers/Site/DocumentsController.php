<?php

namespace App\Http\Controllers\Site;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;

class DocumentsController extends Controller
{
    public function index(){

        $locale = $request['locale'];

        $documents = DB::table('documents')->get()->toArray();
        $subcategory = DB::table("subcategory")->where('link','documents')->get()->toArray();

        $category = DB::table("category")->get()->toArray();
       
        $subCategories = DB::table('subcategory')
            ->where('link','documents')
            ->where('type','!=','type1')
            ->get()
            ->toArray();


        $header = DB::table('header')->get()->toArray();


        $data= [
            'documents' => $documents,
            'subcategories' => $subCategories,
            'category' => $category,
            'subcategory' => $subcategory,
            'header' => $header,
            'locale' => $locale,

        ];

    	return view('site.documents',compact('data'));
    }
}
