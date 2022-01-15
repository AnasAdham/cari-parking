<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parking;
use App\Models\Reservation;
use App\Http\Resources\ParkingResource as ParkingResource;
use App\Events\NewParkingInfo;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Inertia\Inertia;
use Carbon\Carbon;
use App\Notifications\ReservationConfirmation;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // Returns the parking view page with all the parking details
        // Check all parking see whether it is reserved or not

        // if parking is reserved at now then display as reserved
        // else show parking as either occupied or available

        // Get all parkings including wrong parking
        $parkings = Parking::all();
        // Then check for reservations

        // Artisan::call('reserved:update');
        return Inertia::render('Parking/Index', [
            'parkings' => $parkings
        ]);
    }

    public function notifyAdmin(Request $request){
        $request->validate([
            'parking' => 'required',
            'notification' => 'required'
        ]);
        $admin = User::where('user_type', 'admin')->first();
        $message = "Wrong parking";
        Notification::sendNow($admin, new ReservationConfirmation($message, $request->parking));
        Auth::user()->unreadNotifications->where('id', $request->notification["id"])->markAsRead();
        return Redirect::back()->with('success', 'Notification sent! We will solve this issue immediately');
    }

    /**
     * Store the parking data retrived from MQTT
     *
     */

    public function storeParkingInfo(Request $request)
    {
        $array_of_data = $request->all();
        foreach ($array_of_data as $data) {
            $parking = Parking::find($data["id"]);
            if ($parking->parking_status == "reserved") {
                // $parking->parking_status = "wrong_parking";
                // TODO notify the users if is this your parking
                $message = "We detected a car parked at the parking that you have reserved";
                Notification::sendNow(Reservation::where('reservation_parking', $parking->id)->first()->user, new ReservationConfirmation($message, $parking));
                $parking->parking_status = $data["parking_status"];
            } else {
                $parking->parking_status = $data["parking_status"];
            }
            $parking->save();
        }
        $parkings = Parking::all();
        NewParkingInfo::dispatch();
        return ParkingResource::collection($parkings);
    }
    /**
     *  Get parking info using get method
     */
    public function getParkingInfoApi(): AnonymousResourceCollection
    {
        $parkings = Parking::all();
        return ParkingResource::collection($parkings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parkings = $request->all();
        foreach ($parkings as $data) {
            $parking = Parking::firstOrNew([
                'id' => $data["id"]
            ]);
            $parking->parking_name = $data["parking_name"];

            if ($parking->parking_status == "reserved") {
                // $parking->parking_status = "wrong_parking";
                // TODO Notify the user
                $message = "We detected a car parked at the parking that you have reserved";
                Notification::sendNow(Reservation::where('reservation_parking', $parking->id)->first()->user, new ReservationConfirmation($message, $parking));
            }

            $parking->parking_status = $data["parking_status"];
            $parking->save();
        }
        $parkings = Parking::all();

        NewParkingInfo::dispatch();
        return ParkingResource::collection($parkings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
