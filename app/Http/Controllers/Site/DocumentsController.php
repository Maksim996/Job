<?php

namespace App\Http\Controllers\Site;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentsController extends Controller
{
    public function index(){
        $documents = DB::table('documents')->get()->toArray();

        $queryIdDocuments = DB::table('documents')
            ->get(['subcategory_id'])
            ->toArray();

        $ids = [];
        foreach ($queryIdDocuments as $item) {
            array_push($ids, $item->subcategory_id);
        }

        $category = DB::table("category")->get()->toArray();
        $subcategory = DB::table("subcategory")->get()->toArray();
        $subCategories = DB::table('subcategory')->whereIn('subcategory_id',$ids)->where('type','!=','type1')->get()->toArray();


        $data=[
            'documents' => $documents,
            'subcategories' => $subCategories,
            'category' => $category,
            'subcategory' => $subcategory,
        ];

    	return view('site/documents',compact('data'));
    }
}
