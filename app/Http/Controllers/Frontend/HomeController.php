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
        $makale = Post::homePosts(limit: 6,type: 'post', post_type: 'sohbet')->get();

        $video = Post::homePosts(limit: 6,type: 'video')->get();

        return view('welcome', compact('makale', 'video'));
    }


}
