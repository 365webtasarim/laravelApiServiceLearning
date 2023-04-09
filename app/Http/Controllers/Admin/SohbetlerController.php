<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CategoryEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Taglar;
use App\Services\PostCreator;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SohbetlerController extends Controller
{
    public function index()
    {

        $makaleler = Post::where('type', 'post')->get();

        return view('admin.makaleler.index', compact('makaleler'));
    }

    public function create()
    {
        $cat = Category::where('deps_id', 1)->get();

        return view('admin.makaleler.create', compact('cat'));
    }

    public function store(PostRequest $request)
    {

        $makale = new PostCreator($request);
        $makale->create();

        toastr()->success('İçerik Başarıyla Eklendi.', 'Başarılı');

        return redirect()->route('sohbetler');

    }

    public function edit(int $id): View
    {
        $cat = Category::where('deps_id', CategoryEnum::CATEGORY)->get();

        $makale = Post::with('catagory',
            'tags:tags')->where('type', 'post')->findOrFail($id);

        $tagsName = array_map(function ($tag) {
            return $tag['tags'];
        }, $makale->tags->toArray());

        $tags = implode(',', $tagsName);

        return view('admin.makaleler.edit', compact('makale', 'cat', 'tags'));
    }

    /**
     * @param PostRequest $request
     * @param Post $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editPost(PostRequest $request, Post $id)
    {
        $editData = new PostCreator($request, $id->id);
        try {
            $editData->update();
            toastr()->success('İçerik Başarıyla Güncellendi.', 'Başarılı');
        } catch (\Exception $e) {
            toastr()->error($e->getMessage(), 'Başarısız');
        }

        return redirect()->route('sohbetler');

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
        return redirect()->route('sohbetler');
    }

}
