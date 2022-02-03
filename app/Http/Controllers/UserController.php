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
        $form=$request->all();
        User::create($form);
        return view('thanks');
    }
}
