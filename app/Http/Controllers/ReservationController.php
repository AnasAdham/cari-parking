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

    public function showAllAvailableParkingToReserve(Request $request)
    {
        $request->validate([
            'reservation_date' => 'required',
            'reservation_start' => 'required',
            'reservation_end' => 'required',
        ]);

        $parkings = Parking::all();
        // Retrieve date from interface
        $start = Carbon::parse($request->reservation_start, 'Asia/Kuala_Lumpur')
            ->setTimezone('UTC')
            ->toTimeString();
        $local_end = Carbon::parse($request->reservation_end, 'Asia/Kuala_Lumpur')
            ->toTimeString();
        $end = Carbon::parse($request->reservation_end, 'Asia/Kuala_Lumpur')
            ->setTimezone('UTC')
            ->toTimeString();

        $date = Carbon::parse($request->reservation_date . " " . $local_end, 'Asia/Kuala_Lumpur')
            ->setTimezone('UTC')
            ->toDateString();

        $reservations = Reservation::whereDate('reservation_date', $date)
            ->whereTime('reservation_start', '>=', $start)
            ->orwhereTime('reservation_end', '<=', $end)
            ->get();
        // dd($start);
        // dd($reservations);
        foreach ($parkings as $parking) {
            $parking->parking_status = 'available';
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
            'parkings' => $parkings,
            'reservation_data' => array(
                "date" => $date,
                "start" => $start,
                "end" => $end
            )
        ]);
    }


    // Create a reservation to a specific parking adding to the reservation table
    public function makeReservation(Request $request)
    {
        $request->validate([
            'user' => 'required',
            'parking' => 'required',
            'reservation' => 'required'
        ]);

        Reservation::create([
            'reservation_user' => $request->user,
            'reservation_parking' => $request->parking,
            'reservation_date' => $request->reservation["date"],
            'reservation_start' => $request->reservation["start"],
            'reservation_end' => $request->reservation["end"],
        ]);

        return redirect()->route('reservation.homepage');
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
            'reservation_start' => $request->start,
            'reservation_end' => $request->end,
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
