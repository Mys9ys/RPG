<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class MapController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function execute(){

        $locations = Location::select()->where('signboard', '1')->get();

        return view('map', array(
            'locations' => $locations
        ));
    }
}
