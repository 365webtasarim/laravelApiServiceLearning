<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostsResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //

    public function index()
    {
        return PostsResource::collection(Post::orderBy('updated_at','desc')->limit(100)->get());
    }

    public function show($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        return response()->json($post);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return response()->json('deleted');
    }


}
