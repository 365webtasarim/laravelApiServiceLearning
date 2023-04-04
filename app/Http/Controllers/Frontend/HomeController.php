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
      $makale=Post::take(6)->where('status',1)->where('post_type','sohbet')->where('type','post')->Orderby('created_at','desc')->get();
      $video=Post::take(6)->where('status',1)->where('type','video')->Orderby('created_at','desc')->get();

      return view('welcome',compact('makale','video'));
    }


}
