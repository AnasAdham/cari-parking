<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Request;
use Inertia\Inertia;
use App\Models\Parking;
use App\Models\User;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard/Homepage');
    }

    public function showReservation()
    {
        // Show all reservation
        $reservations = Reservation::all();
        return Inertia::render('Dashboard/Homepage', [
            'parkings' => $reservations
        ]);
    }

    public function showAllParking(Request $request)
    {
        return Inertia::render('Dashboard/AllParking', [
            'parkings' => Parking::query()
                ->when($request->input('search'), function ($query, $search) {
                    $query->where('parking_name', 'like', "%{$search}%");
                })
                ->paginate(5),
        ]);
    }

    public function showParking($id)
    {
        $parking = Parking::find($id);

        return Inertia::render('Dashboard/Parking', [
            'parking' => $parking,
            'user' => $parking->user
        ]);
    }

    public function sortParking($sortBy)
    {
        // Sort by value and show all parking
        $parkings = Parking::all()->orderByDesc($sortBy);
        return Inertia::render('Dashboard/Homepage', [
            'parkings' => $parkings,
        ]);
    }

    public function showFilteredParking($filter)
    {
        // Filter by column and show all parking
        $parkings = Parking::where('status', $filter);
        return Inertia::render('Dashboard/Homepage', [
            'parkings' => $parkings
        ]);
    }
}
