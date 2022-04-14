<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OwnerRequest;
use App\Models\Owner;
use App\Models\Reservation;
use App\Models\Evaluation;
use Illuminate\Support\Facades\Hash;

class OwnerController extends Controller
{
    public function registerView()
    {
        return view('owner_register');
    }

    public function register(OwnerRequest $request)
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
        $reservations = Reservation::where('shop_id', $owner->shop->id)->get();
        $evaluations = Evaluation::where('shop_id', $owner->shop->id)->get();
        $data = [
            'item' => $owner,
            'reservations' => $reservations,
            'evaluations' => $evaluations,
        ];
        return view('owner.mypage', $data);
    }
}
