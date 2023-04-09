<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MakaleController extends Controller
{

  public function makaleShow($slug)
    {

        $makale=Post::with('catagory')->where('slug',$slug)->where('status',1)->where('post_type','sohbet')->where('type','post')->first();

        if (isset($makale)){
            $makale->hit++;
            $makale->save();
            $l_makale=Post::where('id','<',$makale->id)->where('status',1)->where('post_type','sohbet')->where('type','post')->first();
            $n_makale=Post::where('id','>',$makale->id)->where('status',1)->where('post_type','sohbet')->where('type','post')->first();

            $related = Post::whereHas('taglari', function ($q) use ($makale) {
                return $q->whereIn('tags', $makale->taglari()->pluck('tags'));
            })->where('post_type','sohbet')->where('id','!=',$makale->id)->take(3)->where('status',1)->where('type','post')->get();
            $relatedvideo = Post::whereHas('taglari', function ($q) use ($makale) {
                return $q->whereIn('tags', $makale->taglari()->pluck('tags'));
            })->where('id','!=',$makale->id)->take(3)->where('status',1)->where('type','video')->get();
            return view('makaleShow',compact('makale','l_makale', 'n_makale', 'related', 'relatedvideo'));
        }
        else{
            return redirect()->route('home');
        }
    }

    public function comment($id, Request $request){
        $validator = Validator::make($request->all(), [
            'mail'=>'required|email'
        ],$messages = [
            'email'=>'Lütfen Mail Adresinizi Doğru Giriniz'
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $comment=new Comment();
        $comment->comment=$request->input('comment');
        $comment->name=$request->input('name');
        $comment->mail=$request->input('mail');
        $comment->post_id=$id;
        $comment->status=0;
        $comment->ip= $request->ip();
        $comment->save();

return redirect()->back();
    }


}
