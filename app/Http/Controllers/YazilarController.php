<?php

namespace App\Http\Controllers;

use App\Http\Resources\SliderResource;
use App\Models\Article;
use App\Models\Koseyazilari;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function MongoDB\BSON\toJSON;

class YazilarController extends Controller
{

    public function index(){
        $makale=Post::where('status',1)->where('type','article')->orderBy('id','desc')->paginate(12);
        $related = Post::where('type','article')->take(3)->where('status',1)->orderBy('hit','desc')->get();
        return view('koseyazilari',compact('makale','related'));
    }
    public function yazi($slug){
        $makale=Post::where('slug',$slug)->where('status',1)->where('type','article')->first();
        if (isset($makale)){
            $makale->hit++;
            $makale->save();
            $related = Post::where('id','!=',$makale->id)->where('type','article')->inRandomOrder()->take(3)->where('status',1)->get();
            return view('yaziShow',compact('makale','related'));
        }
        else{
            return redirect()->route('home');
        }
    }


    public function getPost($type){

        $posts = Post::where('type', $type)->orderBy('created_at', 'desc')->get();
        return SliderResource::collection($posts);
    }
}
