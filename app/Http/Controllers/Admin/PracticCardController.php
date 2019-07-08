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

//        do not change id practice_intership_card


        for($i = 1; $i<=3; $i++ ) {
            $key = 'img_path' . $i;
            if($request->file($key)){
                $filePath = 'card_img-'. $key .  '.' . $request->file($key)->getClientOriginalExtension();
                $path = $request->file($key)->storeAs('images/uploads_practic_cards',$filePath,'public');
            }
            else {
                $path = DB::table('practice_intership_card')->where('card_id', $i)->value('img_path');
            }

            DB::table('practice_intership_card')
                ->where('card_id', $i)
                ->update([
                    'card_link' => $request->{'card_link' . $i},
                    'img_path' => $path,
                    'card_title_ua' => $request->{'card_title' . $i. '_ua'} ,
                    'card_title_ru' => $request->{'local' . $i. '_ru'} ? $request->{'card_title' . $i. '_ru'} : null,
                    'card_title_us' => $request->{'local' . $i. '_us'} ? $request->{'card_title' . $i. '_us'} : null,
                    'card_description_ua' => $request->{'card_description' . $i. '_ua'},
                    'card_description_ru' => $request->{'local' . $i. '_ru'} ? $request->{'card_description' . $i. '_ru'} : null,
                    'card_description_us' => $request->{'local' . $i. '_us'} ? $request->{'card_description' . $i. '_us'} : null,
                ]);

        }



        $practicCards = PracticeIntershipCard::all();

        $data = [
            'practicCards' => $practicCards
        ];
        return redirect()->route('ad_practic-cards.practic-cards.index');
    }
}
