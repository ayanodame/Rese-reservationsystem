<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;

class ShopController extends Controller
{
    public function index() {
        $items=Shop::all();
        $genres=Genre::all();
        $areas=Area::all();
        $keywords=[
            'name'=>'',
        ];
        return view('shopdetail',['items'=>$items,'genres'=>$genres,'areas'=>$areas],$keywords);
    }
    public function search(Request $request){
        $results=Shop::where('name','LIKE',"%{$request->input_name}%")->where('area_id','LIKE',"%{$request->input_area}")->get();
        $param=[
            'name'=>$request->input_name,
            'results'=>$results,
            'area_id'=>$request->input_area,
        ];
        $areas=Area::all();
        return view('shopdetail',['areas'=>$areas],$param);
    }
}
