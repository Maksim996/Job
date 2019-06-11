<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DeleteController extends Controller
{
     public function deleteSubcategory(Request $request)
    {
         dump($request->id);

        return Response(200, 200);
        //
    }
}
