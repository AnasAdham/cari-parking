<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

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

    public function showAllParking()
    {
        // Show all parkings
        $parkings = Parking::all();
        return Inertia::render('Dashboard/Homepage', [
            'parkings' => $parkings
        ]);
    }

    public function sortParking($sortBy)
    {
        // Sort by value and show all parking
        $parkings = Parking::all()->orderByDesc($sortBy);
        return Inertia::render('Dashboard/Homepage', [
            'parkings' => $parkings
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
