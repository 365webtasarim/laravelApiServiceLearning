<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Taglar;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $makaleler = Post::where('type','video')->get();
        return view('admin.videolar.index', compact('makaleler'));
    }

    public function create()
    {
        $cat = Category::where('deps_id',1)->get();

        return view('admin.videolar.create', compact('cat'));
    }
    public function store(Request $request)
    {
        $makale = new Post();
        if ($request->media) {
            $makale->cover = $request->media;
        }
        $makale->title = $request->title;
        $makale->slug = $request->slug;
        $makale->c_id = $request->cat;
        $makale->description = $request->editor;
        $makale->status = $request->status;
        $makale->embed = $request->embed;
        $makale->type = 'video';
        $makale->hit = 0;
        $makale->post_type = 'video';
        $parcala = explode(",", $request->etiket);
        $makale->save();

        foreach ($parcala as $parca) {
            $check = Tag::where('tags', $parca)->first();

            if (isset($check)) {
                $tags = new Taglar();
                $tags->tag_id = $check->id;
                $tags->post_id = $makale->id;
                $tags->save();
            } else {
                $ekle = new Tag();
                $ekle->tags = $parca;
                $ekle->save();
                $tags = new Taglar();
                $tags->tag_id = $ekle->id;
                $tags->post_id = $makale->id;
                $tags->save();
            }
        }

        toastr()->success('İçerik Başarıyla Eklendi.', 'Başarılı');

        return redirect()->route('videolar');

    }
    public function edit($id)
    {
        $cat = Category::where('deps_id',1)->get();
        $makale = Post::where('type','video')->findOrFail($id); 
        $tags = Taglar::with('tag')->where('post_id', $id)->get()->pluck('tag.tags')->toArray();
        $tags=implode(',',$tags);
        return view('admin.videolar.edit', compact('makale', 'cat','tags'));
    }
    public function editPost($id, Request $request)
    {
        //   dd($request);
        $makale = Post::find($id);
        if ($request->media) {
            $makale->cover = $request->media;
        }
        $makale->title = $request->title;
        $makale->c_id = $request->cat;
        $makale->slug = $request->slug;
        $makale->embed = $request->embed;
        $makale->description = $request->editor;
        $makale->status = $request->status;
        $parcala = explode(",", $request->etiket);
        $makaled = Taglar::where('post_id', $id);
        $makaled->delete();
        foreach ($parcala as $parca) {
            $check = Tag::where('tags', $parca)->first();

            if (isset($check)) {
                $tags = new Taglar();
                $tags->tag_id = $check->id;
                $tags->post_id = $id;
                $tags->save();
            } else {
                $ekle = new Tag();
                $ekle->tags = $parca;
                $ekle->save();
                $tags = new Taglar();
                $tags->tag_id = $ekle->id;
                $tags->post_id = $id;
                $tags->save();
            }
        }

        $makale->save();
        toastr()->success('İçerik Başarıyla Güncellendi.', 'Başarılı');

        return redirect()->route('videolar');

    }

    public function checkSlug(Request $request)
    {
        return response()->json(Post::where('slug', $request->slug)->count(), 200);
    }

    public function destroy($id)
    {
        $makale = Post::findOrFail($id);
        $makale->delete();
        toastr()->error('İçerik Başarıyla Silindi.', 'Başarılı');
        return redirect()->route('videolar');
    }
}
