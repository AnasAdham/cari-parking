<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
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

Route::get('/testing', function () {
    return Inertia::render('Dashboard');
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [UserController::class, 'index'])
        ->name('user.homepage');
});

Route::middleware(['auth', 'verified'])->group(function () {


    Route::middleware('can:isAdmin, App\Models\User')->group(function () {
        // Dashboard route
        Route::prefix('/dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
            Route::get('/parkings', [DashboardController::class, 'showAllParking'])
                ->name('dashboard.parking');
            Route::get('/parking/{id}', [DashboardController::class, 'showParking'])
                ->name('dashboard.show.parking');
            // TODO
            Route::get('/users', [DashboardController::class, 'showAllUsers'])
                ->name('dashboard.users');
            Route::get('/users/{user}', [DashboardController::class, 'showUser'])
                ->name('dashboard.show.user');
            // And many more if possible
        });
    });
    Route::middleware('can:isCustomer, App\Models\User')->group(function () {
        // User route
        // TODO
        Route::get('/user/{id}', [UserController::class, 'show'])
            ->name('user.show');
        Route::post('/user/{id}', [UserController::class, 'update'])
            ->name('user.update');
        Route::post('/user/{id}', [UserController::class, 'destroy'])
            ->name('user.destroy');

        // Reservation route
        Route::prefix('/reservation')->group(function () {
            Route::get('/', [ReservationController::class, 'index'])
                ->name('reservation.homepage');
            Route::post('/', [ReservationController::class, 'showAllAvailableParkingToReserve'])
                ->name('reservation.showAvailableParking');
            //  create
            Route::post('/create', [ReservationController::class, 'makeReservation'])
                ->name('reservation.makeReservation');
            // user/id
            Route::get('/user/{id}', [ReservationController::class, 'show'])
                ->name('reservation.show');
        });

        // Parking route
        Route::prefix('/parking')->group(function () {
            Route::get('/', [ParkingController::class, 'index'])
                ->name('parking.homepage');
        });

        // Payment route
        Route::prefix('/payment')->group(function () {
            // TODO set as view payment
            Route::get('/', [PaymentController::class, 'index'])
                ->name('payment');
            Route::post('/store', [PaymentController::class, 'store'])
                ->name('payment.store');
            Route::get('/status', [PaymentController::class, 'status'])
                ->name('payment.status');
            Route::post('/callback', [PaymentController::class, 'callback'])
                ->name('payment.callback');
            Route::get('/{id}', [PaymentController::class, 'show'])
                ->name('payment.show');
            Route::post('/{id}', [PaymentController::class, 'update'])
                ->name('payment.update');
        });
    });
});




require __DIR__ . '/auth.php';
