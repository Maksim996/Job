<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\InnerNews;
use App;
class NewsController extends Controller
{
    /**
     * Выполняет транслитерацию на английский
     * @param string $s строка для транслитерации
     * @return string транслитерированная строка
     */


    public function index(Request $request){
        $locale = $request['locale'];
        $news = $this->filter($request);

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
            'news' => $news,
            'category' => $category,
            'subcategory' => $subcategory,
            'header' => $header,
            'locale' => $locale,
            'left_footer' => $left_footer,
            'about_footer' => $about_footer,
            'right_footer' => $right_footer,
        ];

        return view('site/news', compact('data'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    protected function filter(Request $request)
    {
        $query = InnerNews::with('Preview')

            ->where('type', 'new')

            ->whereHas('Preview',function ($query) use ($request) {
                $query->where('title_ua', 'like', '%' . $request->search . '%')
                    ->orWhere('title_ru', 'like', '%' . $request->search . '%')
                    ->orWhere('title_us', 'like', '%' . $request->search . '%')
                    ->orWhere('full_description_ua', 'like', '%' . $request->search . '%')
                    ->orWhere('full_description_ru', 'like', '%' . $request->search . '%')
                    ->orWhere('full_description_us', 'like', '%' . $request->search . '%')
                    ->orWhere('short_description_ua', 'like', '%' . $request->search . '%')
                    ->orWhere('short_description_ru', 'like', '%' . $request->search . '%')
                    ->orWhere('short_description_us', 'like', '%' . $request->search . '%');
            })

        ;

        switch ($request['sort']) {
            case 'last-week':
                $sortDate = now()->subDay(7);
                break;
            case 'last-month':
                $sortDate = now()->subDay(30);
                break;
            default:
                $sortDate = null;
        }

        if ($sortDate) {
            $query->whereBetween('date', [$sortDate, now()]);
        }


        return $query->latest('date')
            ->paginate(10)
            ->appends($request->all());
    }

}
