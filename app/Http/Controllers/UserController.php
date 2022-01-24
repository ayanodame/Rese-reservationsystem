<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class UserController extends Controller
{
    public function registerView(Request $request){
        return view('register');
    }

    public function register(RegisterRequest $request){
        $data=$request->all();
        return view('register')->with($data);
    }
}
