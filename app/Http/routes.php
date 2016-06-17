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

Route::get('', function(){
    return redirect('home');
});

Route::auth();

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', 'HomeController@show');

    Route::get('pay', 'PayController@show');
    Route::get('pay/add/{id}', 'PayController@showadd');

    Route::get('calendar', 'CalendarController@show');

    Route::resource('settings', 'SettingsController',
        ['only' => ['update', 'edit']]);

    Route::resource('event', 'EventController',
        ['only' => ['create', 'update', 'store', 'edit', 'destroy']]);

    Route::resource('group.event', 'GroupEventController',
        ['only' => ['create','store']]);

    Route::resource('group', 'GroupController');


});

