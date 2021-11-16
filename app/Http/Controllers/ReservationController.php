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
        return Inertia::render('Reservation/ViewReservation');
    }

    public function showAvailableParking(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required',
        ]);
        $reservations = Reservation::where('date', $request->date);
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
