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

    public function show($id)
    {
        // $user = User::find($id);
        // if(Auth::user()->cannot('view', $user)){
        //     return Redirect::back()->with('errorMessage', 'You cannot view other user profile');
        // }
        // return Inertia::render('Account/Index', [
        //     'user' => $user,
        //     'account' => $user->account
        // ]);
        return Inertia::render('User/ManageAccount');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'no_plate' => 'required|string|max:7',
        ]);
        $user = User::find($id);
        if (Auth::user()->cannot('view', $user)) {
            return Redirect::back()->with('errorMessage', 'You cannot edit other user profile');
        }
        Account::find($user->account)->update($request->validated());
        // $account = Account::find($user->account);
        // $account->first_name = $request->first_name;
        // $account->last_name = $request->last_name;
        // $account->no_plate = $request->no_plate;
        // $account->save();
    }

    public function destroy( $id)
    {
        $user = User::find($id);
        if (Auth::user()->cannot('view', $user)) {
            return Redirect::back()->with('errorMessage', 'You cannot delete other user profile');
        }
        $user->delete();

    }
}
