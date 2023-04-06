<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'id';
    public $fillable = ['title','slug','description','cover','status','type','post_type','c_id','user_id'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];
    public function catagory()
    {
        return $this->belongsTo('App\Models\Category','c_id','id');
    }
    public function taglari()
    {
        return $this->belongsToMany(Tag::class,'taglars','post_id');
    }

    public function scopeHomePosts($query, $limit = 6, $type, $post_type = null){

        $query->where(function ($q) use ($post_type) {
            $q->where('status', 1);
            $q->where('type', 'post');
            if ($post_type) {
                $q->where('post_type', $post_type);
            }
        })
            ->orderBy('created_at', 'desc')
            ->limit($limit);
    }

}
