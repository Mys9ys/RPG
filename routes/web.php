<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group([], function (){
//    Route::get('/home', 'HomeController@index');
    Route::get('/home', ['uses'=>'ProfileController@execute', 'as'=>'home']);
//    Route::get('/map', 'MapController@execute');
    Route::get('/map', ['uses'=>'MapController@execute', 'as'=>'map']);
    Route::get('/location/{id}', ['uses'=>'LocationController@execute', 'as'=>'location']);
    Route::get('/battle/{mob}/{user}/{location}', ['uses'=>'BattleController@execute', 'as'=>'battle']);
    Route::get('/dev', ['uses'=>'DevController@execute', 'as'=>'dev']);
    Route::get('/boot', ['uses' => 'BootController@execute', 'as' => 'boot']);
});

