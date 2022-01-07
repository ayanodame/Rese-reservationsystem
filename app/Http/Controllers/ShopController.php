<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;

class ShopController extends Controller
{
    public function index(Request $request){
        $results=Shop::where('name','LIKE',"%{$request->input_name}%")->where('area_id','LIKE',"%{$request->input_area}")->where('genre_id','LIKE',"%{$request->input_genre}")->get();
        $param=[
            'name'=>$request->input_name,
            'area_id'=>$request->input_area,
            'genre_id'=>$request->input_genre,
            'results'=>$results,
        ];
        $areas=Area::all();
        $genres=Genre::all();
        $keywords=[
            'name'=>'',
        ];
        return view('shopdetail',['areas'=>$areas,'genres'=>$genres],$param,$keywords);
    }
}
