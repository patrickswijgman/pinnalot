<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

use App\Http\Requests;

class CalendarController extends Controller
{
    function show(){

        $events = Event::all();
        foreach($events as $event) {
            $event->makeUrl();
        }

        return view('/calendar', ['events' => $events]);
    }
}