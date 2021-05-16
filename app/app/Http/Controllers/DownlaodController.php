<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DownlaodController extends Controller
{
   function  OnDownload($FolderPath,$name){
       return Storage::download($FolderPath."/".$name);
   }

    function onSelectFilelist(){
        $result= DB::table('myfile')->get();
        return $result;
    }
}
