<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ShopRegisterRequest;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Owner;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $shopData = [
            'items' => $shop,
            'user' => $user,
        ];
        return view('shopdetail', $shopData);
    }

    public function registerView(Owner $owner)
    {
        $areas = Area::all();
        $genres = Genre::all();
        $data = [
            'item' => $owner,
            'areas' => $areas,
            'genres' => $genres,
        ];
        return view('shop_register', $data);
    }

    public function register(ShopRegisterRequest $request)
    {
        Shop::create([
            'name' => $request->name,
            'area_id' => $request->area_id,
            'genre_id' => $request->genre_id,
            'owner_id' => $request->owner_id,
            'summary' => $request->summary,
            'open_time' => $request->open_time,
            'close_time' => $request->close_time,
            'image_url' => $request->image_url,
        ]);
        return view('owner.mypage');
    }
}
