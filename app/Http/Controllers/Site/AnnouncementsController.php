<?php

namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class AnnouncementsController extends Controller
{
    /**
     * Выполняет транслитерацию на английский
     * @param string $s строка для транслитерации
     * @return string транслитерированная строка
     */
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

    public function index(){
    	$date = Carbon::now()->toDateTimeString();
        $announcements = DB::table('inner_news')->select('*')->where([
            ['type', '=', 'announcement'],
            ['date', '>', $date],
        ])
        ->orderBy('date', 'desc')->paginate(2);

        $ids = [];
        $i = 0;
        foreach($announcements as $one) {
            $ids[$i++] = $one->inner_news_id;
        }

        $previews = DB::table('preview')->select('*')
        ->whereIn('inner_news_id', $ids)
        ->get()
        ->toArray();

        for($i = 0; $i < count($announcements); $i++) {
            $announcements[$i]->trans_title = $this->transliterate($announcements[$i]->title);
        }

        $data = [
            'announcements' => $announcements,
            'previews' => $previews,
        ];

    	return view('site/announcements', compact('data'));
    }
}
