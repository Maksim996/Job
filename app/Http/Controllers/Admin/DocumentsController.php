<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Documents;
use App\Http\Requests\DocumentsRequest;
use DB;
use File;
use Storage;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $locale = $request['locale'];

        $documents = DB::table('documents')->get()->toArray();
        $subcats = DB::table('subcategory')->get()->toArray();
        $data = ['documents' => $documents,
                'subcategories' => $subcats,
                'locale' => $locale,];
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

        $subcats = DB::table('subcategory')->whereIn('link',['documents', 'pracevlashtuvannya-praktika'])->get()->toArray();
        $data = [
            'subcategories' => $subcats,
            'type' => "0",
        ];

        return view('admin.document_template',compact('data'));
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
    public function show(Request $request, $id)
    {
        //

        $document = DB::table('documents')->where('doc_id',$id)->get();
        $subcats = DB::table('subcategory')->whereIn('link',['documents','pracevlashtuvannya-praktika'])->get()->toArray();
        $locale = $request['locale'];
        $data = [
            'type' => "1",
            'document' => $document[0],
                'subcategories' => $subcats,
                'locale' => $locale,
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
        // $link = $request->file('file')->store('documents', 'public');



        $type = $request->type; 

        $changedId = $id != 0 ?
                $id :
                DB::table('documents')->insertGetId([
                    'title_ua' => $request->title_ua,
                    'title_ru' => $request->local_ru ? $request->title_ru : null,
                    'title_us' => $request->local_us ? $request->title_us : null,
                    'file_link' => '-' ,
                     'doc_date' => date("Y-m-d H:i:s"),
                     'subcategory_id' => $request->cat,
                     'type' => $type
                     ]);



        //filter files which are contain searcing id
        $filesToDelete = array_filter(Storage::disk('public')->files('documents'), function ($file) use($changedId) {
            $fileName = str_replace('documents/', '', $file);
            $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileName);
            return intval($withoutExt) === intval($changedId);
        });

        //delete filtered files
        foreach($filesToDelete as $file) {
            $fullFilePath = public_path($file);
            unlink($fullFilePath);
        }

        if($type === 'link') {
           $link = $request->link;
        }
        else {
            $file = $request->file('file');
            $link = null;
            if($file) {
                $ext = $request->file->getClientOriginalExtension();
                $fileName = $changedId . '.' . $ext;

                $link = $file->storeAs('documents', $fileName, 'public');
            }
        }


        if($id == 0) {
            DB::table('documents')->where('doc_id', $changedId)->update(['file_link' => $link]);
        }
        else {
            $dataToSave = [
                'title_ua' => $request->title_ua,
                'title_ru' => $request->local_ru ? $request->title_ru : null,
                'title_us' => $request->local_us ? $request->title_us : null,
                'doc_date' => date("Y-m-d H:i:s"),
                'subcategory_id' => $request->cat,
                'type' => $type
            ];

            if($link) {
                $dataToSave['file_link'] = $link;
            }

            DB::table('documents')->where('doc_id', $changedId)->update($dataToSave);
        }


        // $file = $request->type === 'link' ?
            
            



        

        // $documents = DB::table('documents')->get()->toArray();
        // $subcats = DB::table('subcategory')->get()->toArray();
        // $data = ['documents' => $documents,
        //         'subcategories' => $subcats];
        //  return view('admin.documents',compact('data'));
        // Route::redirect('/home');
        return redirect()->route('ad_documents.documents.index');
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
        $id = $request->id;
        $file = DB::table('documents')
        ->where(
            [
                ['doc_id', '=', $id],
                
            ])->value('file_link');
        File::delete($file);
        DB::table('documents')->where('doc_id',$id)->delete();
    }
}
