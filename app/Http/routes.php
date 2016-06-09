<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function(){
    return view('home');
});

Route::get('calendar', 'CalendarController@show');

Route::get('event/{id}', 'EventController@show');

Route::get('settings', 'SettingsController@show');

Route::get('settings/{id}', 'SettingsController@index');

Route::get('changepw', 'SettingsController@changepw');

Route::get('/group', 'GroupController@test');

Route::post('event/new', 'EventController@create');
Route::get('event/new', 'EventController@show');



