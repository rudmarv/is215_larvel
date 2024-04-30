<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AwsUploadController extends Controller
{
    //
     function index(){
        return view('upload');
    }
    function store(Request $request){
        try {

            $file = $request->file(key: 'file');
            $fileName = time().$file->getClientOriginalName();
            $res = Storage::put(path: '/', contents: $file, options: $fileName);
         //    return back();
          dd($res);
          } catch (\Exception $e) {
          
              dd($e);
          }
      
    }
}
