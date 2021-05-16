<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\DownlaodController;
use App\Http\Controllers\deleteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Home');
});


Route::get('/upload', function () {
    return view('upload');
});
  Route::post('/fileup',[UploadController::class,'onUpload']);
 // Route::post('/fileUp',[UploadController::class,'onUpload']);
  Route::get('/filedownload/{FolderPath}/{name}',[DownlaodController::class,'OnDownload']);
  Route::get('/fileList',[DownlaodController::class,'onSelectFilelist']);
  Route::get('/filedelete',[deleteController::class,'Ondelete']);
