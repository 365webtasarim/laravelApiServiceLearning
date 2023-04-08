<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesPost extends Model
{
    use HasFactory;
    protected $table='categories_posts';

    protected $fillable = [
        'post_id',
        'categories_post_id'
    ];
    public $timestamps=false;
}
