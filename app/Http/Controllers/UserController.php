<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerView(Request $request)
    {
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return view('thanks');
    }

    public function mypageView($id)
    {
        $items = Reservation::with('user')->where('id', $id)->first();
        return view('mypage')->with('items', $items);
    }

    public function loginView(Request $request)
    {
        $errorMessage = ['errorMessage' => ''];
        return view('login', $errorMessage);
    }

    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt([
            'email' => $email,
            'password' => $password
        ])) {
            return redirect('mypage');
        } else {
            $errorMessage = 'ログインに失敗しました。';
        }
        return view('login', ['errorMessage' => $errorMessage]);
    }
}
