<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function post()
    {
        return $this->hasMany('App\Models\Post','c_id','id')->where('type','post')->orWhere('type','article');
    }
}