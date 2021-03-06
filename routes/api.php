<?php

use App\Http\Controllers\ParkingController;
use App\Http\Controllers\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('parkings', [ParkingController::class, 'store']);
Route::post('parkings/info', [ParkingController::class, 'storeParkingInfo']);
Route::get('parkings', [ParkingController::class, 'getParkingInfoApi']);
Route::post('reservation', [ReservationController::class, 'storeReservationApi']);
Route::get('reservation', [ReservationController::class, 'getReservationInfoApi']);
