<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos=Post::with('catagory')->where('type','video')->Orderby('created_at','desc')->paginate(12);
        return view('videos',compact('videos'));
    }
    public function izle($slug)
    {
        $videos=Post::with('catagory')->where('type','video')->where('slug',$slug)->first();

        if (isset($videos)){
            $videos->hit++;
            $videos->save();
            $related = Post::whereHas('tags', function ($q) use ($videos) {
                return $q->whereIn('tags', $videos->tags()->pluck('tags'));
            })->where('type','video')->where('id','!=',$videos->id)->take(3)->get();
            return view('videoShow',compact('videos','related'));
        }
        else{
            return redirect()->route('home');
        }

    }

}
