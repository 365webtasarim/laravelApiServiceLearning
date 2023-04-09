<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'slug'=>$this->slug,
            'cover'=>$this->cover,
            'c_id'=>$this->c_id,
            'hit'=>$this->hit,
            'embed'=>$this->embed,
            'status'=>$this->status,
            'type'=>$this->type,
            'post_type'=>$this->post_type
        ];
    }
}
