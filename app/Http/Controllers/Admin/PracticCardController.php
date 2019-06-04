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
    public function store(PracticeIntershipCardRequest $request)
    {
        $request->img_path1 = $request->file('img_path1')->store('images/uploads_practic_cards','public');
        $request->img_path2 = $request->file('img_path2')->store('images/uploads_practic_cards','public');
        $request->img_path3 = $request->file('img_path3')->store('images/uploads_practic_cards','public');

        DB::table('practice_intership_card')
        ->where('card_id', 1)
        ->update([
            'card_link' => $request->card_link1,
            'img_path' => $request->img_path1,
            'card_title' => $request->card_title1,
            'card_description' => $request->card_description1
        ]);

        DB::table('practice_intership_card')
        ->where('card_id', 2)
        ->update([
            'card_link' => $request->card_link2,
            'img_path' => $request->img_path2,
            'card_title' => $request->card_title2,
            'card_description' => $request->card_description2
        ]);

        DB::table('practice_intership_card')
        ->where('card_id', 3)
        ->update([
            'card_link' => $request->card_link3,
            'img_path' => $request->img_path3,
            'card_title' => $request->card_title3,
            'card_description' => $request->card_description3
        ]);

        $practicCards = PracticeIntershipCard::all();

        $data = [
            'practicCards' => $practicCards
        ];

        return view('admin.practic-cards', compact('data'));
    }
}
