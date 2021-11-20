<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReservationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Parking;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ReservationController extends Controller
{
    public function index()
    {
        return Inertia::render('Reservation/ReservationHomepage');
    }

    // TODO rename to chooseParkingToReserve
    // Function to display all available reservation that are still available to
    // be reserved
    public function showAllAvailableParkingToReserve()
    {
        $parkings = Parking::all();
        // Retrieve date from interface
        $date = '2020-11-11 03:50:20';
        $reservations = Reservation::whereDate('reservation_date', $date);
        // dd($reservations[0]->parking);
        foreach ($parkings as $parking) {
            $counter = 0;
            foreach ($reservations as $reservation) {
                if ($parking->id == $reservation->parking->id) {
                    // The parking is reserved
                    unset($parkings[$counter]);
                    break;
                }
            }
            $counter++;
        }
        return Inertia::render('Reservation/ChooseParkingToReserve', [
            'parkings' => $parkings
        ]);
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
    public function setReserveParkingStatus()
    {
        // When Clicked get current time and compare to
        $now = Carbon::now();
        $reservations =
            Reservation::whereDate('reservation_date', '=', $now->toDateTimeString())
            ->whereTime('reservation_date', $now->toTimeString())
            ->get();
        // The set time in the parking reservation page
        // dd($reservations->isEmpty());
        if (!$reservations->isEmpty()) {
            foreach ($reservations as $reservation) {
                $parking = Parking::find($reservation->parking->id);
                $parking->parking_status = "reserved";
                $parking->save();
            }
        }
    }


    // Function for showing reservation specific to the user
    public function showUserReservation()
    {
        // TODO be sure to authorized
        $id = Auth::id();
        $reservations = Reservation::where('user_id', $id);
        return Inertia::render('Reservation/UserReservation', [
            'reservations' => $reservations
        ]);
    }

    // Function for canceling reservation
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

    // API for development use
    public function storeReservationApi(Request $request)
    {
        $reservations = Reservation::firstOrCreate([
            'id' => $request->reservation_id,
            'reservation_user' => $request->user,
            'reservation_parking' => $request->parking_id,
            'reservation_date' => $request->date,
        ]);
        if ($reservations->save()) {
            return new ReservationResource($reservations);
        }
    }

    // API for development use
    public function getReservationInfoApi(): AnonymousResourceCollection
    {
        $reservations = Reservation::all();
        return ReservationResource::collection($reservations);
    }
}
