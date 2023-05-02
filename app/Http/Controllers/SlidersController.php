<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use App\Http\Resources\SliderResource;
use App\Models\Slider;
use Illuminate\Http\Request;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sliders = Slider::all();
      return view('admin.sliders.index', compact('sliders'));
    }


    // get all sliders
    public function all(){
        $sliders = Slider::all();
        return SliderResource::collection($sliders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|min:5'
        ]);

        $link=env('STROGE_PATH').$request->file;

        $sliders =new Slider();
        $sliders->title=$request->title;
        $sliders->link_url=$request->url;
        $sliders->status= $request->status;
        $sliders->device= $request->device;
        $sliders->image_path=$link;
        $sliders->order=0;

        $sliders->save();
        return redirect()->route('sliders');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $slider= Slider::find($id);
     return view('admin.sliders.edit', compact('slider'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editSlider(Request $request, $id)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255|min:5'
        ]);
        $sliders = Slider::find($id);
        if($request->file_old!=null){
            $link=$request->file_old;
        }else{
            $link=env('STROGE_PATH').$request->file;
        }


        $sliders->title=$request->title;
        $sliders->link_url=$request->url;
        $sliders->status= $request->status;
        $sliders->device= $request->device;
        $sliders->image_path=$link;
        $sliders->order=0;

        $sliders->save();
        return redirect()->back();
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
        Slider::destroy($id);
        toastr()->error('İçerik Başarıyla Silindi.', 'Başarılı');
        return redirect()->back();
    }
}
