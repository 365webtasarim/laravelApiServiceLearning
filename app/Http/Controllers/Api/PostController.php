<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function MongoDB\BSON\toJSON;

class PostController extends Controller
{

    public function index(Request $request)
    {
        $img=Slider::where('id',$request->slider)->select('image_path')->first();
        // File path
        $file_path = '/storage/uploads/image';

        // Check its not folder
        if(!is_dir($file_path)){
            $url = $img->image_path;
            $name2 =pathinfo($url, PATHINFO_FILENAME);
            $ext = pathinfo($url, PATHINFO_EXTENSION);
          // $size = Storage::size($name2.".".$ext);
            $size = \File::size(public_path('/storage/uploads/image/'.$name2.".".$ext));

            $file_list[] = array('name'=>$img->image_path,'size'=>$size,'path'=>$url);

        }
      return $file_list;

    }
    public function getinfoPost(Request $request)
    {
        $img=Post::where('id',$request->cover)->select('cover')->first();
        // File path
        $file_path = '/storage/uploads/image';

        // Check its not folder
        if(!is_dir($file_path)){
            $url = $img->cover;
            $name2 =pathinfo($url, PATHINFO_FILENAME);
            $ext = pathinfo($url, PATHINFO_EXTENSION);
          // $size = Storage::size($name2.".".$ext);
            if(file_exists(public_path('/storage/uploads/image/'.$name2.".".$ext)))
            {
            $size = \File::size(public_path('/storage/uploads/image/'.$name2.".".$ext));
            }else{
                $size = \File::size(public_path('/uploads/images/'.$name2.".".$ext));
            }
            $file_list[] = array('name'=>$img->cover,'size'=>$size,'path'=>$url);

        }
      return $file_list;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
