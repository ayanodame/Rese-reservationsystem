<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ShopController::class, 'index'])->name('verification.notice');
Route::get('/like', [LikeController::class, 'like']);
Route::get('/unlike', [LikeController::class, 'unlike']);
Route::get('/register', [UserController::class, 'registerView'])->middleware('guest');
Route::post('/register', [UserController::class, 'register']);
Route::get('/thanks',[UserController::class,'thanksView'])->name('verification.verify');
Route::get('/mypage', [UserController::class, 'mypageView'])->middleware('verified');
Route::get('/login', [UserController::class, 'loginView'])->middleware('guest')->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/detail/{shop}', [ShopController::class, 'detaillView']);
Route::post('/reserve', [ReservationController::class, 'register']);
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);
Route::get('delete', [ReservationController::class, 'delete']);
Route::get('/update/{reservation}', [ReservationController::class, 'updateView']);
Route::post('/update', [ReservationController::class, 'update']);


//未承認の方がアクセスしようとした時に表示されるルート
Route::get('/email/verify', function () {
  return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


//メールに記載されている本登録ボタンをクリックした時に生成されるリクエストを処理するルート
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
  $request->fulfill();

  return view('thanks');
})->middleware(['auth', 'signed'])->name('verification.verify');



//承認未実施の時のルート及びメールの再送信
Route::post('/email/verification-notification', function (Request $request) {
  $request->user()->sendEmailVerificationNotification();

  return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
