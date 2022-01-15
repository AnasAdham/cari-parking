<?php

namespace App\Console\Commands;

use App\Events\NewParkingInfo;
use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Parking;
use App\Models\Reservation;

class UpdateReservedParking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reserved:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set parking status of each parking to reserved if there exist a reservation in the reservation table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get the current time and date and if the parking id is already reserved
     * then the parking is set to reserved
     *
     * @return int
     */
    public function handle()
    {
        // NewParkingInfo::dispatch();
        // Get current date and time
        $date = Carbon::now()->toDateString();
        $start = Carbon::now()->toTimeString();
        $end = Carbon::now()->toTimeString();
        // echo "Checking reservation at " . $date . " between " . $start . " and " . $end . "\n";

        // Get the any reservation that is reserved now
        $reservations = Reservation::whereDate('reservation_date', $date)
            ->whereTime('reservation_start', '<=', $start)
            ->whereTime('reservation_end', '>=', $end)
            ->get();

        // Reset the previous reserved parking to available
        $parkings = Parking::all();
        foreach ($parkings as $parking) {
            if ($parking->parking_status == 'reserved') {
                $parking->parking_status = 'available';
                // $parking->save();
            }
            // echo $parking->id . " -> ";
            // echo $parking->parking_status;
            // echo "\n";
        }

        foreach ($reservations as $reservation) {
            // echo "Reservation " . $reservation->id . " -> ";
            // echo $reservation->parking->id;
            // echo "\n";
        }
        // If the reservations is not empty or available
        if (!$reservations->isEmpty()) {
            foreach ($reservations as $reservation) {
            echo "\n";
                $reservedParking = Parking::find($reservation->parking->id);
                echo $reservedParking->id;
                echo "\n";
                foreach ($parkings as $parking) {
                    if ($parking->id == $reservedParking->id && $parking->parking_status = "available") {
                        // If parking is available then set the parking status to reserved
                        $parking->parking_status = "reserved";
                        $parking->save();
                    } else if($parking == $reservedParking && $parking->parking_status = "occupied"){
                        // TODO else then set the set the parking as wrong parking
                        $parking->parking_status = "occupied";
                        // Send error message
                    }
                echo $parking->id . " ----> ";
                echo $parking->parking_status;
                echo "\n";
                }
            }
        }
        // echo "Parking info updated with reservation info";
        return Command::SUCCESS;
    }
}
