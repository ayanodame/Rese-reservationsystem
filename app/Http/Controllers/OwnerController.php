<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OwnerRegisterRequest;
use App\Models\Owner;
use App\Models\Shop;
use App\Models\Reservation;
use Illuminate\Support\Facades\Hash;

class OwnerController extends Controller
{
    public function registerView()
    {
        return view('owner.register');
    }

    public function register(OwnerRegisterRequest $request)
    {
        $owner = Owner::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        unset($owner['_token']);
        return redirect('/admin');
    }

    public function mypageView(Owner $owner)
    {
        $reservations = Reservation::where('shop_id', $owner->shop_id)->get();
        $data = [
            'item' => $owner,
            'reservations' => $reservations,
        ];
        return view('owner.mypage', $data);
    }
}
