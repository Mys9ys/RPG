<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Mobs;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function execute(Request $request){

        $location = Location::select()->where('id', $request->id)->first();
        $mob = Mobs::select()->where('id', $location->mob_ID)->first();

        return view('location', array(
            'location' => $location,
            'mob' => $mob
        ));
    }
}
