<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Models\Parking;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
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

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard/parking', [DashboardController::class, 'showAllParking']);
    Route::get('/dashboard/parking/{id}', [DashboardController::class, 'showParking'])
        ->name('reservation.show.parking');
    // User route
    Route::get('/', [UserController::class, 'index'])->name('user.homepage');
    Route::get('/user/{id}', [UserController::class, 'edit']);
    // Reservation route
    Route::get('/reservation', [ReservationController::class, 'index'])
        ->name('reservation.homepage');
    Route::post('/reservation', [ReservationController::class, 'showAllAvailableParkingToReserve'])
        ->name('reservation.showAvailableParking');
    Route::post('/reservation/create', [ReservationController::class, 'makeReservation'])->name('reservation.makeReservation');
    Route::get('/reservation/user/{id}', [ReservationController::class, 'show'])
        ->name('reservation.show');
    // Parking route
    Route::get('/parking', [ParkingController::class, 'index'])->name('parking.homepage');
    // Payment route
    // Route::get('/payment', [PaymentController::class, 'index']);
});




require __DIR__ . '/auth.php';
