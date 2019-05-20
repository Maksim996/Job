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

        $subCategories = DB::table('subcategory')->whereIn('subcategory_id',$ids)->get()->toArray();


        $data=[
            'documents' => $documents,
            'subcategories' => $subCategories,
        ];

    	return view('site/documents',compact('data'));
    }
}
