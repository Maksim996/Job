<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
class telegramController extends Controller
{
    //
    function transliterate($s) {
        $s = (string) $s;
        $s = strip_tags($s);
        $s = str_replace(array("\n", "\r"), " ", $s);
        $s = preg_replace("/\s+/", ' ', $s);
        $s = trim($s);
        $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s);
        $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','и'=>'i','з'=>'z','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','і'=>'i','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ій'=>'ij','їй'=>'jij','ії'=>'iji','ь'=>''));
        $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s);
        $s = str_replace(" ", "-", $s);
        return $s;
    }

   public function index(Request $request){
       $locale = $request['locale'];
       $date = Carbon::now()->toDateTimeString();
       $telegram = DB::table('inner_news')
           ->leftJoin('preview', 'inner_news.inner_news_id', '=', 'preview.inner_news_id')
           ->where([
               ['type', '=', 'telegram'],
               // ['date', '>', $date],
           ])
           ->orderBy('date', 'desc')
           ->paginate(8);



       for($i = 0; $i < count($telegram); $i++) {
           $telegram[$i]->trans_title = $this->transliterate($telegram[$i]->{'title_ua'});
       }

       $category = DB::table("category")->get()->toArray();
       $subcategory = DB::table("subcategory")->get()->toArray();
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
       $data = [
           'telegram' => $telegram,
           'category' => $category,
           'subcategory' => $subcategory,
           'header' => $header,
           'locale' => $locale,
           'left_footer' => $left_footer,
           'about_footer' => $about_footer,
           'right_footer' => $right_footer,

       ];

        return view('site/telegram', compact('data'));
    }
    public function show(Request $request, $id){
        $locale = $request['locale'];
        $telegram = DB::table('inner_news')
            ->where('inner_news.inner_news_id',$id)

            ->leftJoin('preview','inner_news.inner_news_id','preview.inner_news_id')
            ->get()
            ->first();
//        dd($telegram);
        $category = DB::table("category")->get()->toArray();
        $subcategory = DB::table("subcategory")->get()->toArray();
        $header = DB::table('inner_news')->where('inner_news_id',$id)->get()->toArray();
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
        $data = [
            'new' => $telegram,
            'category' => $category,
            'subcategory' => $subcategory,
            'header' => $header,
            'locale' => $locale,
            'left_footer' => $left_footer,
            'about_footer' => $about_footer,
            'right_footer' => $right_footer,

        ];

        return view('site/post', compact('data'));
    }
}
