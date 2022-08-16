<?php

use App\Http\Controllers\Reservation\ReservationController;
use App\Http\Controllers\Restaurant\RestaurantController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('main');
});

Route::resource('restaurant', RestaurantController::class)->only(['create','store']);
Route::resource('reservation', ReservationController::class)->only(['create','store'])->middleware('restaurantExists');
