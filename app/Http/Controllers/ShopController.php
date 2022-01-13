<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;

class ShopController extends Controller
{
    public function index(Request $request){
        $keywords=$request->input_name;
        $area=$request->input_area;
        $genre=$request->input_genre;
        $shops=Shop::searchShop($area,$genre,$keywords);
        $areas=Area::all();
        $genres=Genre::all();
        return view('shoplist',['shops'=>$shops,'areas'=>$areas,'genres'=>$genres]);
    }
}
