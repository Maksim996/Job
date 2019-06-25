<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use File;
use App\Footer;
use App\Http\Requests\FooterRequest;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footers = Footer::all();

        //$types = DB::table('footer')->where('footer_id',$id)->get()->toArray();
        $data = [
            'footer' => $footers,
			//'types' => $types,
        ];

        //dump($headers);die;

        return view('admin/footer', compact('data'));
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
    public function store(FooterRequest $request)
    {
        $footer = Footer::create($request->validated());
        $footer->save();

        $data = [
            'footer' => $footer,
        ];

        return view('/admin/footer', compact('data'));
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
    public function edit(FooterRequest $request, $id)
    {
		/*DB::table('footer')
		->where('footer_id', '=', $id)		
		->insert([
			'img_path' => $request->img_path,   
            'link' => $request->link,
            'content' => $request->content,
            'type' => $request->type,
            'name' => $request->name,
            'color_bg' => $request->color_bg,
		]);*/
		
		//$footer = Footer::findOrfail($id);
        //$data = [
        //    'footer' => $footer
        //];
        //dump($header);die;
		
        //return view('/admin/footer', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

		$leftSideData = json_decode($request->leftSide);
		$aboutSideData = json_decode($request->aboutUs);
		$socialSideData = json_decode($request->socialNetworks);

		foreach($leftSideData as $left_item) {

	        $id = $left_item->id;
            $img_key = 'left-column-image' . '-' . $id;

            if($img_path = $request->file($img_key) == null) {
                $img_path = $left_item->img;
            } else {
                $img_path = $request->file($img_key)->store('images/uploads_footer','public');
            }

            if (DB::table('footer')->where('footer_id', $id)->exists()) {
                DB::table('footer')
                    ->where('footer_id', $id)
                    ->update([
                        'img_path' => $img_path,
                        'link' => $left_item->link,
                        'content_ua' => $left_item->content_ua,
                        'content_ru' => $left_item->content_ru,
                        'content_us' => $left_item->content_us,
                        'name' => $left_item->name,
                    ]);
            }
            else {
                DB::table('footer')
                    ->insert([
                        'footer_id' => $id,
                        'img_path' => $img_path,
                        'link' => $left_item->link,
                        'content_ua' => $left_item->content_ua,
                        'content_ru' => $left_item->content_ru,
                        'content_us' => $left_item->content_us,
                        'type' => 'left_column',
                        'name' => $left_item->name,
                    ]);
            }
		}


		DB::table('footer')
            ->where('footer_id', $aboutSideData->id)
            ->update([
                'link' => $aboutSideData->link
            ]);
			
		foreach($socialSideData as $social_item) {
            $id = $social_item->id;
            $img_key = 'social-column-image' . '-' . $id;
            if($img_path = $request->file($img_key) == null) {
                $img_path = $social_item->img;
            } else {
                $img_path = $request->file($img_key)->store('images/uploads_footer','public');
            }

            if (DB::table('footer')->where('footer_id', $id)->exists()) {
                DB::table('footer')
                    ->where('footer_id', $id)
                    ->update([
                        'img_path' => $img_path,
                        'name' => $social_item->name,
                        'link' => $social_item->link,
                        'color_bg' => $social_item->color,
                    ]);
            } else {
                DB::table('footer')
                    ->insert([
                        'footer_id' => $id,
                        'img_path' => $img_path,
                        'name' => $social_item->name,
                        'link' => $social_item->link,
                        'type' => 'social',
                        'color_bg' => $social_item->color,
                    ]);
            }


		}

		return response($request, 200);
		
        //dump($footer);die;
		//dump($request);
		//exit;		
			
		
		
        /*$request()->validate([
            'img_path' => 'required|mimes:svg|max:200',           
            'link' => 'nullable|max:200',
            'content' => 'required|max:200',
            'type' => 'required|max:200',
            'name' => 'required|max:200',
            'color_bg' => 'nullable|max:200',
        ]);*/
		
		//$footerIds = $request->footer_id;
		//$types = $request->type;
		//dump($footerIds);
		//exit;
		
		
		//foreach($footerIds as $position=>$footerId){
		
		
		
		
		
		
		
		
		/*else if($types[$position] == 'about_as'){
		if($footerIds[$position] == 0)	
		}*/
		
		/*else if($types[$position] == 'social'){
		if($footerIds[$position] == 0)	
		
		
		}*/
				
        /*$footer = Footer::all();
		
        $data = [
            'footer' => $footer
        ];*/
        
		return view('/admin/footer', compact('data'));
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $elem = DB::table('footer')->select('img_path')->where('footer_id', $request->id)->get();
        unlink(public_path(stristr($elem[0]->img_path, 'i')));
        DB::table('footer')->where('footer_id',$request->id)->delete();
        return Response(200, 200);
    }
}
