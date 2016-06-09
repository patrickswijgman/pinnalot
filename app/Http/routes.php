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

Route::get('/home', 'HomeController@index');

Route::get('calendar', 'CalendarController@show');

Route::get('settings/{id}', 'SettingsController@show');
Route::post('settings/{id}', 'SettingsController@save');

Route::get('/group', 'GroupController@test');
Route::get('/group', 'GroupController@test');

Route::post('event/new', 'EventController@create');
Route::get('event/new', 'EventController@show');

Route::auth();





