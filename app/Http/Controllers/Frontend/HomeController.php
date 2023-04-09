<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


      $makale=Post::homepage(limit:6,type:'post')->Homeposttype(posttype:'sohbet')->get();
      $video=Post::homepage(limit:6,type:'video')->get();

      return view('welcome',compact('makale','video'));
    }


}
