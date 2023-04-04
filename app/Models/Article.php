<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;


    public function catagory()
    {

        return $this->belongsTo('App\Models\Category','categories_id','id');
    }
}


