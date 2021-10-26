<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parking;
use App\Http\Resources\ParkingResource as ParkingResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): AnonymousResourceCollection
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
        // TODO: Study video pasal laravel api menggunakan postman
        // TODO: Fix the code use FirstOrCreate instead


        try {
            $parkings = Parking::findorFail($request->parking_id);
            $parkings->parking_name = $request->input('parking_name');
            $parkings->parking_status = $request->input('parking_status');
            $parkings->parking_user = $request->input('parking_user');

            if ($parkings->save()) {
                return new ParkingResource($parkings);
            }
        } catch (ModelNotFoundException $e) {
            $parkings = new Parking;
            $parkings->id = $request->input('parking_id');
            $parkings->parking_name = $request->input('parking_name');
            $parkings->parking_status = $request->input('parking_status');
            $parkings->parking_user = $request->input('parking_user');

            if ($parkings->save()) {
                return new ParkingResource($parkings);
            }
        }
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
