<?php

namespace App\Providers;

use App\Providers\NewParkingInfo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateParkingInfo
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewParkingInfo  $event
     * @return void
     */
    public function handle(NewParkingInfo $event)
    {
        //
    }
}
