<?php

namespace App\Http\Controllers\Site;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PracevlashtuvannyaPraktikaController extends Controller
{
    public function index(Request $request){
        $locale = $request['locale'];
        $subcategory = DB::table("subcategory")->where('link','pracevlashtuvannya-praktika')->get()->toArray();

        $documents = DB::table('documents')->orderBy('title_ua','asc')->get()->toArray();
//        $documents = DB::table('documents')->get()->toArray();

        $category = DB::table("category")->get()->toArray();

        $subCategories = DB::table('subcategory')
            ->where('link', 'pracevlashtuvannya-praktika')
            ->where('type','!=','type1')->get()->toArray();

        $header = DB::table('header')->get()->toArray();
        $left_footer = DB::table('footer')
            ->where([
                ['type', '=', 'left_column'],
            ])
            ->orderBy('footer_id', 'asc')
            ->get()
            ->toArray();

        $about_footer = DB::table('footer')
            ->where([
                ['type', '=', 'about_as'],
            ])
            ->orderBy('footer_id', 'desc')
            ->limit(1)
            ->get()
            ->toArray();

        $right_footer = DB::table('footer')
            ->where([
                ['type', '=', 'social'],
            ])
            ->orderBy('footer_id', 'asc')
            ->limit(7)
            ->get()
            ->toArray();

        $data=[
            'documents' => $documents,
            'subcategories' => $subCategories,
            'category' => $category,
            'subcategory' => $subcategory,
            'header' => $header,
            'locale' => $locale,
            'left_footer' => $left_footer,
            'about_footer' => $about_footer,
            'right_footer' => $right_footer,

        ];
        
    	return view('site/documents',compact('data'));
     
    }
}
