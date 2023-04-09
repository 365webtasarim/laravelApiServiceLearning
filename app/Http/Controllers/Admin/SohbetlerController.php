<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CategoryEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Taglar;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SohbetlerController extends Controller
{
    public function index()
    {

        $makaleler = Post::where('type','post')->get();

        return view('admin.makaleler.index', compact('makaleler'));
    }

    public function create()
    {
        $cat = Category::where('deps_id',1)->get();

        return view('admin.makaleler.create', compact('cat'));
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
        $makale->type = 'post';
        $makale->hit = 0;
        $makale->post_type = 'sohbet';
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

        return redirect()->route('sohbetler');

    }
    public function edit(int $id): View
    {
        $cat = Category::where('deps_id', CategoryEnum::CATEGORY)->get();

        $makale = Post::with('catagory',
            'tags:tags')->where('type','post')->findOrFail($id);

        $tagsName = array_map(function($tag){
            return $tag['tags'];
        },$makale->tags->toArray());

        $tags = implode(',',$tagsName);

        return view('admin.makaleler.edit', compact('makale', 'cat','tags'));
    }

    /**
     * @param PostRequest $request
     * @param Post $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editPost(PostRequest $request,Post $id)
    {
        //dd($request->all(),$id);
        $data = [
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->editor,
            'status' => $request->status,
            'type' => 'post',
            'post_type' => 'sohbet',
            'embed' => $request->embed,
            'cover' => $request->media,
        ];

        if($request->cat && count($request->cat) > 0){
            $id->catagory()->detach();
            $id->catagory()->attach($request->cat);
        }

        $tags = explode(",", $request->etiket);

        if($tags && count($tags) > 0){
            $tagsId = array_map(function($tag){
                return (Tag::firstOrCreate(['tags'=>$tag]))->id;
            },$tags);
            $id->tags()->detach();
            $id->tags()->attach($tagsId);
        }

        try {
            $id->update($data);
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
