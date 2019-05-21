<?php

namespace App\Http\Controllers\Site;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::now()->toDateTimeString();
        $practice = DB::select("SELECT * FROM `practice_intership_card`");

        $news = DB::table('inner_news')->select('*')->where([
            ['type', '=', 'new'],
            // ['date', '<', $date],
        ])
        ->orderBy('date', 'desc')
        ->limit(5)
        ->get()
        ->toArray();

        $ids = [];
        $i = 0;
        foreach($news as $one) {
            $ids[$i++] = $one->inner_news_id;
        }

        $previews_news = DB::table('preview')->select('*')
        ->whereIn('inner_news_id', $ids)
        ->get()
        ->toArray();

        $announcements = DB::table('inner_news')->select('*')->where([
            ['type', '=', 'announcement'],
            // ['date', '>', $date],
        ])
        ->orderBy('date', 'desc')
        ->limit(4)
        ->get()
        ->toArray();

        $ids = [];
        $i = 0;
        foreach($announcements as $one) {
            $ids[$i++] = $one->inner_news_id;
        }

        $previews_annoucements = DB::table('preview')->select('*')
        ->whereIn('inner_news_id', $ids)
        ->get()
        ->toArray();

        for($i = 0; $i < count($news); $i++) {
            $news[$i]->trans_title = $this->transliterate($news[$i]->title);
        }

        for($i = 0; $i < count($announcements); $i++) {
            $announcements[$i]->trans_title = $this->transliterate($announcements[$i]->title);
        }

        $slider = DB::select("SELECT * FROM `partners`");

        $data = [
            'practice_intership_card' => $practice,
            'announcements' => $announcements,
            'previews_news' => $previews_news,
            'previews_annoucements' => $previews_annoucements,
            'news' => $news,
            'slider' => $slider,
        ];

        // echo "<pre>";
        // print_r($data['previews']);
        // echo "</pre>";
        // die;

        return view('site/home', compact('data'));
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
