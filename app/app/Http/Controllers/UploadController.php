<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    function  onUpload(Request $request){
        $path =$request->file('Filekey')->store('images');
       $result= DB::table('myfile')->insert(['filepath'=>$path]);
       if($result==true){
           return 1;
       }else{
          return 0;
       }
        return $path;
      //p  $request->Filekey->store('images');

    }
}
