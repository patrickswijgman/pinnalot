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
    return redirect('/home');
});

Route::get('/home', 'HomeController@index');

Route::get('calendar', 'CalendarController@show');

Route::get('settings', 'SettingsController@show');
Route::post('settings', 'SettingsController@save');

Route::get('/group', 'GroupController@test');
Route::get('/group', 'GroupController@test');

Route::get('event/new', 'EventController@show');
Route::get('event/{id}', 'EventController@load');
Route::post('event/save', 'EventController@save');

Route::auth();


Route::get('pay/new', 'PayController@show'); 



