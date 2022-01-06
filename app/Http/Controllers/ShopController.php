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
        return view('shopdetail',['items'=>$items,'genres'=>$genres,'areas'=>$areas]);
    }
}
