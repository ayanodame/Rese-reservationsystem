<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registerView(Request $request)
    {
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        $form = $request->all();
        User::create($form);
        return view('thanks');
    }

    public function mypageView()
    {
        $user = Auth::user();
        return view('mypage', ['user' => $user]);
    }

    public function loginView(Request $request)
    {
        $text = ['text' => 'ログインして下さい。'];
        return view('login', $text);
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt([
            'email' => $email,
            'password' => $password
        ])) {
            $text =   Auth::user()->name . 'さんがログインしました';
        } else {
            $text = 'ログインに失敗しました';
        }
        return view('login', ['text' => $text]);
    }
}
