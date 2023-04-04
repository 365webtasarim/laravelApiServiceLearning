<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function catagory()
    {
        return $this->belongsTo('App\Models\Category','c_id','id');
    }
    public function taglari()
    {
        return $this->belongsToMany(Tag::class,'taglars','post_id');
    }

}
