<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Taglar;
use App\Services\KoseyazisiCreator;
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
        $makaleler = Post::where('type','article')->get();

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
    public function store(PostRequest $request):Post
    {
        $makale = new KoseyazisiCreator($request);
        $makale->create();

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
        $makale = Post::with('catagory',
            'tags:tags')->findOrFail($id);

        $tags ='';
        $pattern = ["/\[/","/\"/","/\]/"];
        $replace = ["","",""];
        $tags=preg_replace($pattern,$replace,$tags);
        return view('admin.koseyazilari.edit', compact('makale', 'cat','tags'));
    }

    public function editPost(PostRequest $request, Post $id)
    {
        $editData = new KoseyazisiCreator($request, $id->id);
        try {
            $editData->update();
            toastr()->success('İçerik Başarıyla Güncellendi.', 'Başarılı');
        } catch (\Exception $e) {
            toastr()->error($e->getMessage(), 'Başarısız');
        }

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
