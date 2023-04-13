<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Taglar;
use App\Services\VideoCreator;
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

        public function store(PostRequest $request)
    {

        $makale = new VideoCreator($request);
        $makale->create();

        toastr()->success('İçerik Başarıyla Eklendi.', 'Başarılı');

        return redirect()->route('videolar');

    }
    public function edit($id)
    {
        $cat = Category::where('deps_id',1)->get();
        $makale = Post::with('catagory',
            'tags:tags')->where('type','video')->findOrFail($id);
        $tagsName = array_map(function ($tag) {
            return $tag['tags'];
        }, $makale->tags->toArray());

        $tags = implode(',', $tagsName);

        return view('admin.videolar.edit', compact('makale', 'cat','tags'));
    }
    public function editPost(PostRequest $request, Post $id)
    {
        $editData = new VideoCreator($request, $id->id);
        try {
            $editData->update();
            toastr()->success('İçerik Başarıyla Güncellendi.', 'Başarılı');
        } catch (\Exception $e) {
            toastr()->error($e->getMessage(), 'Başarısız');
        }
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
