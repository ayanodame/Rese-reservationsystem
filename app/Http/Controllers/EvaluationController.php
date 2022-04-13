<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;
use App\Http\Requests\EvaluationRequest;
use App\Models\Reservation;

class EvaluationController extends Controller
{
    public function registerView(Reservation $reservation)
    {
        $reservationData = [
            'item' => $reservation,
        ];
        return view('user.evaluation_register', $reservationData);
    }
    public function register(EvaluationRequest $request){
        $evaluation = Evaluation::create([
            'user_id' => $request->user_id,
            'shop_id' => $request->shop_id,
            'rate' => $request->rate,
            'comment' =>$request->comment,
        ]);
        unset($evaluation['_token']);
        return view('user.evaluation_registered');
    }
}
