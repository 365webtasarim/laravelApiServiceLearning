<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class FotografController extends Controller
{
  public function index(){

      return view('photos');
  }
}
