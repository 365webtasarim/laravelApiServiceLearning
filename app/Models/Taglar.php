<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taglar extends Model
{
    use HasFactory;

    protected $table = 'tags';

    public $timestamps = false;

    public function tag()
    {
        return $this->belongsToMany(Tag::class,'tag_id','id');
    }
}
