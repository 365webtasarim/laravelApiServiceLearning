<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;

class FotografController extends Controller
{
  public function index(){
      $galleries =Gallery::orderBy( 'order','asc')->orderBy( 'id','desc')->get();
      return view('photos', compact('galleries'));
  }
}
