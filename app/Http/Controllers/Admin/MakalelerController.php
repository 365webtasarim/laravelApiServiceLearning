<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Taglar;
use Illuminate\Http\Request;

class MakalelerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makaleler = Post::where('c_id',2)->get();
        return view('admin.koseyazilari.index', compact('makaleler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::where('deps_id',0)->get();

        return view('admin.koseyazilari.create', compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $makale = new Post();
        if ($request->media) {
            $makale->image = $request->media;
        }
        $makale->title = $request->title;
        $makale->slug = $request->slug;
        $makale->c_id = $request->cat;
        $makale->description = $request->editor;
        $makale->status = $request->status;


        $makale->tags = $request->etiket;
        $makale->save();
        toastr()->success('İçerik Başarıyla Eklendi.', 'Başarılı');

        return redirect()->route('koseyazilari');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Category::where('deps_id',0)->get();
        $makale = Post::findOrFail($id);
        $tags = Taglar::with('tag')->where('post_id', $id)->get()->pluck('tag.tags');
        $pattern = ["/\[/","/\"/","/\]/"];
        $replace = ["","",""];
        $tags=preg_replace($pattern,$replace,$tags);
        return view('admin.koseyazilari.edit', compact('makale', 'cat','tags'));
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

        return redirect()->route('koseyazilari');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        return response()->json(Post::where('slug', $request->slug)->count(), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $makale = Post::findOrFail($id);
        $makale->delete();
        toastr()->error('İçerik Başarıyla Silindi.', 'Başarılı');
        return redirect()->route('koseyazilari');
    }
}
