<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use App\Country;
use App\Trip;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    function index()
    {
        return view('login');
    }

    /**
     * @param Request $request
     */
    function checklogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required | email',
            'password' => 'required | alphaNum | min:3'
        ]);

        $user_data = [
            'email' => Input::get('email'),
            'password' => Input::get('password'),
        ];

        if (Auth::attempt($user_data)) {
            return redirect('main/trips');
        } else {
            return back()->with('error', 'Wrong login details');
        }
    }

    function trips()
    {
        $countries = Country::All();
        $trips = Trip::where(
            [
                'user_id' => Auth::user()->id,
                'active' => true
            ])
            ->orderBy('departure_date')
            ->get();
        return view('trips', ['countries' => $countries, 'trips' => $trips]);

    }

    function newTrip(Request $request)
    {
        $this->validate($request, [
            'departure' => 'required | date',
            'country' => 'required | int'
        ]);

        $trip = new Trip();
        $trip->user_id = Auth::user()->id;
        $trip->active = true;
        $trip->departure_date = $request->get('departure');
        $trip->destination = $request->get('country');

        if ($trip->save()) {
            return redirect('main/trips');
        } else {
            return back()->with('error', 'Something Went wrong');
        }

    }

    function logout()
    {
        Auth::logout();
        return redirect('main');

    }
}
