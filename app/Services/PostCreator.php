<?php

namespace App\Services;

use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostCreator
{
    public $request;
    public $data;

    public function __construct(PostRequest $request, $data)
    {
        $this->request = $request;
        $this->data = $data;
        return $this->create();
    }


    protected function create(){
        return Post::create($this->data);
    }

}
