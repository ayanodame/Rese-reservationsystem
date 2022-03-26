<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Like;
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

        event(new Registered($user));

        return view('prethanks');
    }

    public function mypageView()
    {
        $user = Auth::user();
        $reservations = Reservation::where('user_id', Auth::id())->get();
        $likes = Like::where('user_id', Auth::id())->get();
        $data = [
            'reservations' => $reservations,
            'likes' => $likes,
            'user' => $user,
        ];
        return view('mypage', $data);
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
