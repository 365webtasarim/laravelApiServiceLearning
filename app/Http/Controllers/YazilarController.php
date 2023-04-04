<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Koseyazilari;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class YazilarController extends Controller
{

    public function index(){
        $makale=Post::where('status',1)->where('c_id','2')->orderBy('id','desc')->get();
        return view('koseyazilari',compact('makale'));
    }
    public function yazi($slug){
        $makale=Post::where('slug',$slug)->where('status',1)->where('type','article')->first();
        if (isset($makale)){
            $makale->hit++;
            $makale->save();
            $related = Post::where('id','!=',$makale->id)->where('c_id','2')->inRandomOrder()->take(3)->where('status',1)->get();
            return view('yaziShow',compact('makale','related'));
        }
        else{
            return redirect()->route('home');
        }
    }
}
