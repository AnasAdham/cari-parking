<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ReservationController extends Controller
{
    //
    public function index()
    {
        return Inertia::render('Reservation/ReservationHomepage');
    }


    // Create a reservation to a specific parking adding to the reservation table
    public function makeReservation(Request $request)
    {
        $request->validate([
            'date_and_time' => 'required',
            'user_id' => 'required',
            'parking_id' => 'required',
        ]);
        Reservation::create([
            'date' => $request->date_and_time,
            'user_id' => $request->user_id,
            'parking_id' => $request->parking_id
        ]);
        return redirect()->route('reservation.homepage');
    }

    // TODO this function is a temporary function to set the parking to reserved on the specific date
    // This method of setting the parking status will be replaced with a schedule
    public function setParkingAsReserved()
    {
        // When Clicked get current time and compare to
        // The set time in the parking reservation page
    }

    // Display all available parking on the specific time to
    public function showAvailableParkingToReserve(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required',
            'time' => 'required'
        ]);

        $reservations = Reservation::all();


        return Inertia::render('Reservation/AvailableReservation', [
            'reservations' => $reservations
        ]);
    }

    public function showUserReservation()
    {
        // TODO be sure to authorized
        $id = Auth::id();
        $reservations = Reservation::where('user_id', $id);
        return Inertia::render('Reservation/UserReservation', [
            'reservations' => $reservations
        ]);
    }
    public function cancelReservation(Reservation $reservation)
    {
        if (Auth::check()) {
            $user = Auth::user();
            // Check if reservation is user's reservation
            if ($user->reservation == $reservation) {
                $reservation->delete();
                // Return to UserReservation with success message
                return Redirect::route('user.reservation')->with('successMessage', 'Cancelation successful!');
            }
        }
        return Redirect::route('user.reservation')->with('errorMessage', 'Cancelation fail');
    }
}
