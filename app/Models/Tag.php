<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $primaryKey = 'id';

    protected $fillable = ['tags'];

    public $timestamps = false;

    public function posts()
    {
        return $this->belongsToMany(Post::class,'taglars','tag_id','post_id');
    }
}
