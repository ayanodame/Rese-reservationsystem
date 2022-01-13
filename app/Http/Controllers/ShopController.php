<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;

class ShopController extends Controller
{
    //指定されている時だけ、こうする。
    //MODEL側にメソッドを組む。(Laravel model select whereで検索すると良い条件がある場)
    //MODELで撮ってくる順番を指定する（Orderbyで）Area→Genre→Name順
    //nameも条件入れる。
    public function index(Request $request){
        $shops=Shop::searchShop($area,$genre,$keywords);
        $areas=Area::all();
        $genres=Genre::all();
        return view('shoplist',['shops'=>$shops,'areas'=>$areas,'genres'=>$genres],$param);
    }
}
