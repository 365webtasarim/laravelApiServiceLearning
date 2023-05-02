<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryContoller extends Controller
{
    //
    public function index(){

        $items=Gallery::orderBy( 'order','asc')->orderBy( 'id','desc')->get();
        return view('admin.gallery.index',compact('items'));
    }
    public function sort(Request $request){
        $data = $request->data;

        parse_str($data, $order);

        $items = $order["ord"];


//        $modelName = ($gallery_type == "image") ? "image_model" : "file_model";

        foreach ($items as $rank => $id){
            Gallery::where('id', $id)->where('order', '!=', $rank)->update(['order' => $rank]);
        }
//        $items=Gallery::orderBy('order','asc')->get();
//        return redirect()->back();

    }


    public function create(){
        return view('admin.gallery.create');
    }
    public function galleryCreatePost(Request $request){
        if (isset($request->media) && $request->media) {
            $link=env('STROGE_PATH').$request->media;

            $gallery=new Gallery();
            $gallery->title=$request->title;
            $gallery->description=$request->description;
            $gallery->image_path=$link;
            $gallery->order=0;
            $gallery->save();
            return redirect()->back();
        }else{
            echo 'Resim Alanı Boş Olamaz';
        }

    }
    public function destroy($id){
        $item=Gallery::find($id);
        $item->delete();
        return true;
    }
}
