<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;
use App\Models\Reservation;

class EvaluationController extends Controller
{
    public function registerView(Reservation $reservation)
    {
        $reservationData = [
            'items' => $reservation,
        ];
        return view('user.evaluation_register', $reservationData);
    }
    public function register(EvaluationRequest $request){
        //
    }
}
