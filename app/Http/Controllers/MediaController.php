<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function store(Request $request){
        // dd($request->all());
        $attrNames = array(
            'images.*' => 'File',
        );
        $validator=Validator::make($request->all(), [
            'images.*' => 'required|mimes:jpg,JPG,JPEG,jpeg,gif,GIF,png,PNG,bmp,svg,SVG|max:10240',
        ]);
        $validator->setAttributeNames($attrNames);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        $results=[];
        foreach ($request->images as $image) {
            $fileName = $image->getClientoriginalName();
            $fileSlug = time().rand(101,999).'-'.Str::slug(pathinfo($fileName, PATHINFO_FILENAME)).'.'.pathinfo($fileName, PATHINFO_EXTENSION);
            $image->storeAs('/uploads/images/',$fileSlug,'upload');
            array_push($results,'/uploads/images/'.$fileSlug);
            // ImageOptimizer::optimize(public_path().'/uploads/images/'.$fileSlug);
        }
        return response()->json($results, 200);
    }
}
