<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuShort extends Model
{
    use HasFactory;
    public function menuler()
    {
        return $this->hasOne('App\Models\Menu','id','id');
    }
    public function child()
    {
        return $this->hasOne('App\Models\MenuShort','id','children');
    }
}
