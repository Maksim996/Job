<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PracticeIntershipCard;
use App\Http\Requests\PracticeIntershipCardRequest;
use DB;

class PracticCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $practicCards = PracticeIntershipCard::all();

        $data = [
            'practicCards' => $practicCards,
        ];

        return view('admin.practic-cards', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        $img_path1 = 'http://job.sumdu.edu.ua/card1.png';
//        $img_path2 = 'http://job.sumdu.edu.ua/card2.png';
//        $img_path3 = 'http://job.sumdu.edu.ua/card3.png';
//
//        $request->merge(['img_path1' => $img_path1]);
//        $request->merge(['img_path2' => $img_path2]);
//        $request->merge(['img_path3' => $img_path3]);
//
//        $card_link1 = $request->get('card_link1');
//        $img_path1 = $request->get('img_path1');
//        $card_title1 = $request->get('card_title1');
//        $card_description1 = $request->get('card_description1');
//
//        $card_link2 = $request->get('card_link2');
//        $img_path2 = $request->get('img_path2');
//        $card_title2 = $request->get('card_title2');
//        $card_description2 = $request->get('card_description2');
//
//        $card_link3 = $request->get('card_link2');
//        $img_path3 = $request->get('img_path3');
//        $card_title3 = $request->get('card_title3');
//        $card_description3 = $request->get('card_description3');

        $request->img_path1 = $request->file('img_path1')->store('images/uploads_practic_cards','public');
        $request->img_path2 = $request->file('img_path2')->store('images/uploads_practic_cards','public');
        $request->img_path3 = $request->file('img_path3')->store('images/uploads_practic_cards','public');

//        dd($request);
        DB::table('practice_intership_card')
        ->where('card_id', 1)
        ->update([
            'card_link' => $request->card_link1,
            'img_path' => $request->img_path1,
            'card_title_ua' => $request->card_title1_ua,
            'card_title_ru' => $request->local1_ru ? $card_title1_ru : null,
            'card_title_us' => $request->local1_us ? $card_title1_us : null,
            'card_description_ua' => $request->card_description1_ua,
            'card_description_ru' => $request->card_description1_ru,
            'card_description_us' => $request->card_description1_us,
        ]);

        DB::table('practice_intership_card')
        ->where('card_id', 2)
        ->update([
            'card_link' => $request->card_link2,
            'img_path' => $request->img_path2,
            'card_title_ua' => $request->card_title2_ua,
            'card_title_ru' => $request->card_title2_ru,
            'card_title_us' => $request->card_title2_us,
            'card_description_ua' => $request->card_description2_ua,
            'card_description_ru' => $request->card_description2_ru,
            'card_description_us' => $request->card_description2_us,
        ]);

        DB::table('practice_intership_card')
        ->where('card_id', 3)
        ->update([
            'card_link' => $request->card_link3,
            'img_path' => $request->img_path3,
            'card_title_ua' => $request->card_title3_ua,
            'card_title_ru' => $request->card_title3_ru,
            'card_title_us' => $request->card_title3_us,
            'card_description_ua' => $request->card_description3_ua,
            'card_description_ru' => $request->card_description3_ru,
            'card_description_us' => $request->card_description3_us,
        ]);

        $practicCards = PracticeIntershipCard::all();

        $data = [
            'practicCards' => $practicCards
        ];

        return view('admin.practic-cards', compact('data'));
    }
}
