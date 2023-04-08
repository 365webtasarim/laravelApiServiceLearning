<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'id';

    public $fillable = [
        'id',
        'title',
        'description',
        'slug',
        'cover',
        'c_id',
        'hit',
        'embed',
        'status',
        'type',
        'post_type'
    ];
    public function catagory()
    {
        return $this->belongsToMany('App\Models\CategoriesPost','categories_posts','post_id');
    }

    public function taglari()
    {
        return $this->belongsToMany(Tag::class,'taglars','post_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopePost($query)
    {
        return $query->where('type', 'post');
    }
    public function scopeArticle($query)
    {
        return $query->where('type', 'article');
    }
    public function scopeVideo($query)
    {
        return $query->where('type', 'video');
    }


    public function scopeHomepage($query,$limit=6,$type=null)
    {
        return $query-> where(['status'=>1,'type'=>$type])
            ->limit($limit)
            ->Orderby('created_at','desc');
    }
    public function scopeHomeposttype($query,$posttype=null)
    {
        return $query->where('post_type',$posttype);
    }

}
