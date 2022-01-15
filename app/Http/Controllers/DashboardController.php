<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Request;
use Inertia\Inertia;
use App\Models\Parking;
use App\Models\Reservation;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Notifications\UserMessage;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard/Homepage');
    }

    public function viewNotification(){
        $user = Auth::user();
        if($user->user_type == "customer"){
            return Redirect::route('user.homepage')->with('error', 'You are not allowed to view this page');
        }
        return Inertia::render('Dashboard/Notifications', [
            'notifications' => $user->unreadNotifications
        ]);

    }
    public function markNotification(Request $request){
        $request->validate([
            "notification" => "required"
        ]);
        $user = Auth::user();
        if($user->user_type == "customer"){
            return Redirect::route('user.homepage')->with('error', 'You are not allowed to view this page');
        }

        $user->unreadNotifications
            ->when($request->notification_id, function ($query) use ($request) {
                return $query->where('id', $request->notification_id);
            })
            ->markAsRead();

        return Redirect::back();
    }

    public function showReservation()
    {
        // Show all reservation
        $reservations = Reservation::all();
        return Inertia::render('Dashboard/Homepage', [
            'parkings' => $reservations
        ]);
    }
    public function showAllUsers(Request $request)
    {
        return Inertia::render('Dashboard/AllUser', [
            'users' => User::query()
                ->when($request->input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->where('user_type', 'customer')
                ->paginate(8),
        ]);
    }

    public function showUser($id)
    {
        $user = User::find($id);
        return Inertia::render('Dashboard/User', [
            'user' => $user
        ]);
    }
    public function sendMessage(Request $request){
        $request->validate([
            'user_id' => 'required',
            'message' => 'required'
        ]);
        $user = User::find($request->user_id);
        Notification::sendNow($user, new UserMessage($request->message));
        return Redirect::back()->with('success', 'Message successfully sent');
    }

    public function showAllParking(Request $request)
    {
        return Inertia::render('Dashboard/AllParking', [
            'parkings' => Parking::query()
                ->when($request->input('search'), function ($query, $search) {
                    $query->where('parking_name', 'like', "%{$search}%");
                })
                ->paginate(8),
        ]);
    }

    public function showParking($id)
    {
        $parking = Parking::find($id);

        if ($parking->parking_status == "reserved") {
            $reservation = Reservation::where('reservation_parking', $parking->id)
                ->get();
        } else {
            $reservation = null;
        }

        return Inertia::render('Dashboard/Parking', [
            'parking' => $parking,
            'reservation' => $reservation
        ]);
    }

    public function sortParking($sortBy)
    {
        // Sort by value and show all parking
        $parkings = Parking::all()->orderByDesc($sortBy);
        return Inertia::render('Dashboard/Homepage', [
            'parkings' => $parkings,
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
