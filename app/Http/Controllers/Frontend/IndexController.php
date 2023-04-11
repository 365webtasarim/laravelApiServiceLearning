<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function search(Request $request){

        if($request->query==""){

            $query="";

            $results = Post::where('title','like','%'.$request->query.'%')
                ->where('status',true)
                ->where('post_type','!=',"article")
                ->orWhere('description','like','%'.$request->query.'%')

                ->orWhere('content','like','%'.$request->query.'%')

                ->paginate(21);

            return view('search',compact('results','query'));

        }else{

            return redirect()->to('/arama-sonuclari/'.$request->query);

        }

    }



    public function searchQuery(Request $request,$query){


        $results = Post::where('title','like','%'.$query.'%')
            ->where('status',1)
            ->orWhere('description','like','%'.$query.'%')
            ->where('post_type','!=',"article")
            ->paginate(21);

        return view('search',compact('results','query'));

    }
    public function contact(){


        return view('contact');

    }
    public function contactPost(Request $request){

        $details = [
            'name' => $request->name,
            'message' => $request->message,
            'emailAddress' => $request->emailAddress,
        ];

        \Mail::to('365webtasarim@gmail.com')->send(new \App\Mail\Iletisim($details));

        dd("Email is Sent.");
        return view('contact');

    }
    public function info(){
        $results = Post::where('title','hayati')->first();

        return view('info',compact('results'));

    }
}
