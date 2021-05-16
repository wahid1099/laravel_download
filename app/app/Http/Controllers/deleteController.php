<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class deleteController extends Controller
{
  function Ondelete(){
      Storage::delete('images/1KQ9cbSzCdeQ8fNW4PWBOq6WtbUbaulKZ3E9NbFI.png');
  }
}
