<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $keywords = $request->input_keyword;
        $areaId = $request->input_area;
        $genreId = $request->input_genre;
        $shops = Shop::searchShop($areaId, $genreId, $keywords);
        $areas = Area::all();
        $genres = Genre::all();
        return view('index', ['shops' => $shops, 'areas' => $areas, 'genres' => $genres, 'keywords' => $keywords, 'areaId' => $areaId, 'genreId' => $genreId]);
    }

    public function detaillView(Shop $shop)
    {
        $shopData = [
            'items' => $shop,
        ];
        return view('shopdetail', $shopData);
    }
}
