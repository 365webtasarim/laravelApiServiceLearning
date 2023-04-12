<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\Iletisim;
use App\Models\Article;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        try {
            $details =array('name' => $request->name,
                'message' => $request->message,
                'emailAddress' => $request->emailAddress);
            Mail::to('365webtasarim@gmail.com')->send(new Iletisim($details));
        }catch (\Exception $e) {

            return response()->json(['error' => $e->getMessage(), 401]);
        }

        return response()->json(['success' => 'success', 200]);

    }
    public function info(){
        $results = Post::where('title','hayati')->first();

        return view('info',compact('results'));

    }
}
