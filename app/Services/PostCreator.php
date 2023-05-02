<?php

namespace App\Services;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tag;

/**
 * Class PostCreator
 * @package App\Services
 */
class PostCreator
{
    public $id;
    public $data;

    /**
     * @param PostRequest $request
     * @param int|null $id
     */
    public function __construct(PostRequest $request,int $id = null)
    {
        if($id) {
            $this->id = $id;
        }
        $this->data = $this->createData($request->all());
    }

    protected function imageChange($image): ?string
    {

        if (!$image || $image == null) {
            return null;
        }else{
            if (stripos($image,"images")){
                return $image;
            }elseif (stripos($image,"storage")){
                return $image;
            }else{
                return '/storage/uploads/image/'.$image;
            }
        }

    }
    /**
     * @param $data array: request data
     * @return array
     */
    protected function createData($data): array
    {
        return [
            'title'         => $data['title'],
            'slug'          => $data['slug'],
            'description'   => $data['editor'],
            'cover'   =>    $this->imageChange( $data['media'] ),
            'status'        => $data['status'],
            'embed'         => $data['embed'],
            'categories'    => $data['cat'],
            'tags'          => $data['etiket'],
            'hit'          => $data['hit']??0,
            'type'          => 'post',
            'post_type'     => 'sohbet',
        ];
    }

    public function create(): Post
    {
        $createPost = new Post();
        $createPost->fill($this->data);
        $createPost->save();
        $createPost->catagory()->attach($this->data['categories']);
        $createPost->tags()->attach($this->createTags($this->data['tags']));
        return $createPost->fresh();
    }

    /**
     * Class oluşturulurken id değeri varsa update işlemi yapar.
     * @return Post
     * PostCreator::create();
     */
    public function update(): Post
    {
        $post = Post::find($this->id);
        $post->fill($this->data);
        $post->save();
        $post->catagory()->sync($this->data['categories']);
        $post->tags()->sync($this->createTags($this->data['tags']));
        return $post->fresh();
    }

    protected function createTags($tags): array
    {
        $tags = explode(',', $tags);
        $tags = array_map('trim', $tags);
        $tags = array_unique($tags);
        $tags = array_filter($tags);
        $tags = array_map(function ($tag) {
            return (Tag::firstOrCreate(['tags' => $tag]))->id;
        }, $tags);
        return $tags;
    }




}
