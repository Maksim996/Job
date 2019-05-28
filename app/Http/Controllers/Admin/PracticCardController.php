<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PracticeIntershipCard;
use App\Http\Requests\PracticeIntershipCardRequest;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('admin.practic-cards');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PracticeIntershipCardRequest $request)
    {
        // $requestData = $request->all();
        // dump($requestData);die;
        $practicCard = PracticeIntershipCard::create($request->validated());
        $practicCard->save();

        $data = [
            'practicCard' => $practicCard,
        ];

        return view('admin.practic-cards', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $practicCard = PracticeIntershipCard::findOrFail($id);

        $data = [
            'practicCard' => $practicCard
        ];

        return view('admin.practic-cards', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return view('admin.practic-cards');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PracticeIntershipCardRequest $request, $id)
    {
        $practicCard = PracticeIntershipCard::findOrfail($id);

        $practicCard->update($request->validated());

        $data = [
            'practicCard' => $practicCard
        ];

        return view('admin.practic-cards', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $practicCard = PracticeIntershipCard::findOrfail($id);
        // $practicCard->delete();
        // return view('admin.practic-cards');
    }
}
