if (config('app.env') === 'heroku') {
URL::forceScheme('https');
}
<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [ShopController::class, 'index']);
Route::get('/like', [LikeController::class, 'like']);
Route::get('/unlike', [LikeController::class, 'unlike']);
Route::get('/register', [UserController::class, 'registerView'])->middleware('guest');
Route::post('/register', [UserController::class, 'register']);
Route::get('/mypage', [UserController::class, 'mypageView'])->middleware('auth');
Route::get('/login', [UserController::class, 'loginView'])->middleware('guest')->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/detail/{shop}', [ShopController::class, 'detaillView']);
Route::post('/reserve', [ReservationController::class, 'register']);
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);
Route::get('delete', [ReservationController::class, 'delete']);
