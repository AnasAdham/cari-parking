<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Account;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('User/Homepage');
    }

    public function markNotification($id, Request $request)
    {
        $user = User::find($id)
            ->unreadNotifications
            ->when($request->notification_id, function ($query) use ($request) {
                return $query->where('id', $request->notification_id);
            })
            ->markAsRead();

        return Redirect::back();
    }

    public function show($id)
    {
        $user = User::find($id);
        // $account = Account::where('user_id', $id)->first();

        if(Auth::user()->cannot('view', $user)){
            return Redirect::back()->with('errorMessage', 'You cannot view other user profile');
        }
        // dd($account->id);
        return Inertia::render('User/ManageAccount', [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'account' => $user->account,
                'notifications' => $user->unreadNotifications
            ]
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'license_plate' => 'required',
            'address' => 'required',
        ]);
        $user = User::find($id);
        if (Auth::user()->cannot('view', $user)) {
            return Redirect::back()->with('errorMessage', 'You cannot edit other user profile');
        }
        $user->account->update([
            'phone_number' => $request->phone_number,
            'license_plate' => $request->license_plate,
            'address' => $request->address
            ]);
        $user->update([
            'name' => $request->name
        ]);
        return Redirect::back()->with('success', 'Update successful !!');
    }

    public function destroy( $id)
    {
        $user = User::find($id);
        if (Auth::user()->cannot('view', $user)) {
            return Redirect::back()->with('errorMessage', 'You cannot delete other user profile');
        }
        $user->account->delete();

    }
}
