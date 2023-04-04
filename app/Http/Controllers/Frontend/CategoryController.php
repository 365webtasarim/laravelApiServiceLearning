<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cat)
    {
        $catData=Category::with('post')->where('slug',$cat)->first();
        if (isset($catData)){
            return view('kategori',compact('catData'));
        }
        else{
            abort(404);
        }
    }

}
