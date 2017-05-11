<?php

namespace App\Http\Controllers;

use App\Mobs;
use App\U_features;
use App\User;
use Illuminate\Http\Request;

class BattleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function execute($mobid,$userid,$location){

        $user = U_features::select()->where('id', $userid)->first();
        $mob = Mobs::select()->where('id', $mobid)->first();
        $name = User::select('name')->where('id', $userid)->first();

        return view('battle', array(
            'location' => $location,
            'name' => $name,
            'user' => $user,
            'mob' => $mob
        ));
    }
}
