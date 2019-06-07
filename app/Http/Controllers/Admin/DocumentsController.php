<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Documents;
use App\Http\Requests\DocumentsRequest;
use DB;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $documents = DB::table('documents')->get()->toArray();
        $subcats = DB::table('subcategory')->get()->toArray();
        $data = ['documents' => $documents,
                'subcategories' => $subcats,];
        return view('admin.documents',compact('data'));
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
        $document = DB::table('documents')->where('doc_id',$id)->get();
        $subcats = DB::table('subcategory')->where('link','documents')->get()->toArray();
        $data = [
                'document' => $document[0],
                'subcategories' => $subcats,
                    ];
        return view('admin.document_template',compact('data'));
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
        //!!!!no file save!!!!!
       
        DB::table('documents')->where('doc_id',$id)->update(['title' => $request->title, 'doc_date' => date("Y-m-d H:i:s"),'subcategory_id' => $request->cat]);

        $documents = DB::table('documents')->get()->toArray();
        $subcats = DB::table('subcategory')->get()->toArray();
        $data = ['documents' => $documents,
                'subcategories' => $subcats,];
        return view('admin.documents',compact('data'));

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
     public function deleteDocument(Request $request)
    {
        //
        $id = $request->id;
       // DB::table('documents')->where('doc_id',$id)->delete();
    }
}
