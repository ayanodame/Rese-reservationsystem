<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
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

    public function mypageView()
    {
        $user = Auth::user();
        return view('mypage', ['user' => $user]);
    }

    public function loginView(Request $request)
    {
        $text = ['text' => ''];
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
            return redirect('mypage');
        } else {
            $text = 'ログインに失敗しました。';
        }
        return view('login', ['text' => $text]);
    }
}
