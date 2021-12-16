<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parking;
use App\Http\Resources\ParkingResource as ParkingResource;
use App\Events\NewParkingInfo;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Inertia\Inertia;
use Carbon\Carbon;

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
        $parkings = Parking::all();
        // foreach parking check if reserved

        // TODO this is for testing purposes
        NewParkingInfo::dispatch();

        return Inertia::render('Dashboard', [
            'parkings' => $parkings
        ]);
    }

    public function storeParkingInfo(Request $request)
    {
        $array_of_data = $request->all();
        foreach ($array_of_data as $data) {
            $parking = Parking::find($data["id"]);
            $parking->parking_status = $data["parking_status"];
            $parking->save();
        }
        $parkings = Parking::all();
        return ParkingResource::collection($parkings);
    }
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
            $parking->parking_status = $data["parking_status"];
            $parking->save();
        }
        $parkings = Parking::all();
        return ParkingResource::collection($parkings);
        // TODO
        // IF already reserved set the parking as wrong_parking
        $message = "New parking";
        // Broadcast to NewParkingInfo channel
        broadcast(new NewParkingInfo($message));
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
