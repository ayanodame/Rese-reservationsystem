<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;
use App\Models\Reservation;


class ReservationController extends Controller
{
    public function register(ReserveRequest $request)
    {
        $reservation = Reservation::create([
            'user_id' => $request->user_id,
            'shop_id' => $request->shop_id,
            'use_date' => $request->use_date,
            'use_time' => $request->use_time,
            'people' => $request->people,
        ]);
        unset($reservation['_token']);
        return view('user.reserved');
    }
    public function delete(Request $request)
    {
        $reservations = Reservation::find($request->id);
        unset($reservations['_token']);
        $reservations->delete();
        return redirect('mypage');
    }
    public function updateView(Reservation $reservation)
    {
        $reservationData = [
            'items' => $reservation,
        ];
        return view('user.reservation_update', $reservationData);
    }
    public function update(ReserveRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Reservation::where('id', $request->id)->update($form);
        return redirect('/mypage');
    }
}
