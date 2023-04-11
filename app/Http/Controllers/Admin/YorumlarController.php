<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Taglar;
use Illuminate\Http\Request;

class YorumlarController extends Controller
{
    public function index()
    {
        $yorumlar = Comment::get();
        return view('admin.yorumlar.index', compact('yorumlar'));
    }

    public function edit($id)
    {
        $yorum=Comment::with('post')->where('id',$id)->first();
        return view('admin.yorumlar.edit', compact( 'yorum'));
    }
    public function editPost($id, Request $request)
    {

        //   dd($request);
        $makale = Comment::find($id);
         $makale->status = $request->status?$request->status:0;
        $makale->save();
        toastr()->success('İçerik Başarıyla Güncellendi.', 'Başarılı');

        return redirect()->route('yorumlar');

    }

    public function destroy($id)
    {
        $makale = Comment::findOrFail($id);
        $makale->delete();
        toastr()->error('İçerik Başarıyla Silindi.', 'Başarılı');
        return redirect()->route('yorumlar');
    }
}
