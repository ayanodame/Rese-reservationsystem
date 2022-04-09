<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;

use App\Models\Owner;

class AdminController extends Controller
{
    public function adminView(Request $request)
    {
        $keywords = $request->input_keyword;
        $shopId = $request->input_shop;
        $email = $request->input_email;
        $items = Owner::searchOwner($shopId, $email, $keywords);
        $shops = shop::all();
        $areas = Area::all();
        $genres = Genre::all();
        return view('admin', ['keywords' => $keywords, 'shopId' => $shopId, 'email' => $email, 'keywords' => $keywords, 'items' => $items, 'shops' => $shops, 'areas' => $areas, 'genres' => $genres]);
    }
}
