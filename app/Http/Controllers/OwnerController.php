<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OwnerRegisterRequest;
use App\Models\Owner;
use App\Models\Shop;
use Illuminate\Support\Facades\Hash;

class OwnerController extends Controller
{
    public function managementView(Request $request)
    {
        $keywords = $request->input_keyword;
        $shopId = $request->input_shop;
        $email = $request->input_email;
        $owners = Owner::searchOwner($shopId, $email, $keywords);
        $shops = Shop::all();
        return view('management', ['shopId' => $shopId, 'email' => $email,  'keywords' => $keywords, 'owners' => $owners, 'shops' => $shops]);
    }

    public function registerView()
    {
        $shops = Shop::all();
        return view('owner.register', ['shops' => $shops]);
    }

    public function register(OwnerRegisterRequest $request)
    {
        $owner = Owner::create([
            'name' => $request->name,
            'email' => $request->email,
            'shop_id' => $request->shop_id,
            'password' => Hash::make($request->password),
        ]);
        unset($owner['_token']);
        return redirect('/manage');
    }
}
