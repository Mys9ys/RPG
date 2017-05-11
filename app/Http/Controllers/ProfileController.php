<?php

namespace App\Http\Controllers;

use App\Frag;
use App\Mobs;
use Illuminate\Http\Request;
use App\U_features;



class ProfileController extends Controller
{
    //


    public function execute(Request $request) {

        $profile = U_features::select()->where('id', $request->user()->id)->first();
        $frag = Frag::select()->where('id', $request->user()->id)->first();
        $mobs = Mobs::all();
//        $count = Mobs::all()->count();

       return view('home', array(
            'profile' => $profile,
            'frag' => $frag,
            'mobs' => $mobs
//            'count' => $count
        ));
    }
}
