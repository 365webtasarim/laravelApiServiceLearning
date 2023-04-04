<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuShort;
use App\Models\Setting;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data=Menu::select('id', 'title','slug')->get();
        $data = Setting::select('menu')->first();
        $menu = json_decode($data['menu']);
        return view('menu');
        return view('menu')->with('menu', $menu);

//     $data=[
//
//         [
//             "id"=> 2,
//             "content"=> "Second item",
//             "children"=> [
//                 [
//                     "id"=> 3,
//                     "content"=> "Item 3"
//                 ],
//                 [
//                     "id"=> 4,
//                     "content"=> "Item 4"
//                 ],
//                 [
//                     "id"=> 5,
//                     "content"=> "Item 5",
//                     "value"=> "Item 5 value",
//                     "foo"=> "Bar",
//                     "children"=> [
//                         [
//                             "id"=> 6,
//                             "content"=> "Item 6"
//                         ],
//                         [
//                             "id"=> 7,
//                             "content"=> "Item 7"
//                         ],
//                         [
//                             "id"=> 8,
//                             "content"=> "Item 8"
//                         ]
//                     ]
//                 ]
//             ]
//         ]
//
//     ];
//        return response()->json($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function menudatalar()
    {
        function getTreeArray($parentId, $treearray=''){
            if (!is_array($treearray)){ $treearray=[]; }
            $data = MenuShort::with('menuler')->where('children',$parentId)->get();

            foreach ($data as $items){
                $child = MenuShort::with('menuler')->where('children',$items->id)->get();
                $childs=null;
                foreach ($child as $itemc){
                   $childs[]=[
                       'id'=>$itemc->id,
                       'title'=>$itemc->menuler->title,
                   ];
                }

                if (!is_array($childs)){
                    $treearray[]=[
                        'id'=>$items->id,
                        'title'=>$items->menuler->title

                    ];
                }else{
                    $treearray[]=[
                        'id'=>$items->id,
                        'title'=>$items->menuler->title,
                        'children'=>$childs
                    ];
                }

            }

           return $treearray;
        }
//        $data = MenuShort::with('menuler')->get();
//        dd($data);
        $menu = getTreeArray(0,[]);
        return $menu;
    }

    public function duzenle($id)
    {
        $data = MenuShort::with('menuler')->where('id',$id)->get();
        return $data;
    }

    public function menudata(Request $request)
    {
        $id=$request->data;
        $data =  MenuShort::with('menuler')->where('id',$id)->first();
        return response()->json($data,200);

    }
    public function menuGuncelle(Request $request)
    {
        $flight = Menu::find($request->data['id']);
        $flight->title=$request->data['title'];
        $flight->slug=$request->data['slug']!=''?$request->data['slug']:'#';
        $flight->save();
        $data="işlem Başarılı";
        return response()->json($data,200);

    }

        public function menusave(Request $request)
    {
        MenuShort::query()->truncate();
        function insertMenu($dataId, $parentId){
            $menu=new MenuShort;
            $menu->id=$dataId;
            $menu->children=$parentId;
            $menu->save();
        }

        function fetchTreeArray($data, $parentId = 0)
        {
            foreach ($data as $item) {
                $id = $item['id'];
                insertMenu($id, $parentId);
                // echo $parentId . "-" . $id . "<br/>";
                $isChildren = (isset($item['children'])) ? $item['children'] : false;
                if ($isChildren) {
                    fetchTreeArray($isChildren, $id);
                }
            }
        }

        fetchTreeArray($request->data);

//        $menu=new MenuShort;
//        $menu->id=1;
//        $menu->children=1;
//        $menu->save();
//        return $menu;

    }

    public function menuEkle(Request $request)
    {
        function insertMenu($dataId, $parentId){
        $menu=new MenuShort;
        $menu->id=$dataId;
        $menu->children=$parentId;
        $menu->save();
        }
        try {
            $ekle=new Menu;
            $ekle->title=$request->data['title'];
            $ekle->slug=$request->data['slug'];
            $ekle->save();
            insertMenu($ekle->id,0);
        }catch (Exception $e) {
            return $e;
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $flight = Menu::find($id);
     $flight->delete();
     $flights = MenuShort::find($id);
     $flights->delete();
    }
}
