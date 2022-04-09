<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\AdminController;
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

//ユーザー側のルート
Route::get('/', [ShopController::class, 'index'])->name('verification.notice');
Route::get('/like', [LikeController::class, 'like']);
Route::get('/unlike', [LikeController::class, 'unlike']);
Route::get('/user/register', [UserController::class, 'registerView'])->middleware('guest');
Route::post('/user/register', [UserController::class, 'register']);
Route::get('/thanks', [UserController::class, 'thanksView'])->name('verification.verify');
Route::get('/user/mypage', [UserController::class, 'mypageView'])->middleware('verified');
Route::get('/user/login', [UserController::class, 'loginView'])->middleware('guest')->name('login');
Route::post('/user/login', [UserController::class, 'login']);
Route::get('/detail/{shop}', [ShopController::class, 'detaillView']);
Route::post('/reserve', [ReservationController::class, 'register']);
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);
Route::get('delete', [ReservationController::class, 'delete']);
Route::get('/update/{reservation}', [ReservationController::class, 'updateView']);
Route::post('/update', [ReservationController::class, 'update']);

//管理側のルート
Route::get('/admin', [AdminController::class, 'adminView']);
Route::get('/owner/register', [OwnerController::class, 'registerView']);
Route::post('/owner/register', [OwnerController::class, 'register']);
Route::get('/area/register', [AreaController::class, 'registerView']);
Route::post('/area/register', [AreaController::class, 'register']);
Route::get('/genre/register', [GenreController::class, 'registerView']);
Route::post('/genre/register', [GenreController::class, 'register']);

//店舗側ルート
Route::get('/owner/mypage/{owner}', [OwnerController::class, 'mypageView']);
Route::get('/shop/register/{owner}', [ShopController::class, 'registerView']);
Route::post('/shop/register', [ShopController::class, 'register']);

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
