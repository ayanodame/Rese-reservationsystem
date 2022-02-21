<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
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

Route::get('/', [ShopController::class, 'index']);
Route::get('/register', [UserController::class, 'registerView']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/mypage', [UserController::class, 'mypageView'])->middleware('auth');
Route::get('/login', [UserController::class, 'loginView'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/detail/{shop}', [ShopController::class, 'detaillView']);
Route::post('/reserve', [ReservationController::class, 'register']);
