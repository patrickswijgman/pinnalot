<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

use App\Http\Requests;

class CalendarController extends Controller
{
    function view(){

        $event = new Event();
        $event->title = "Event 1";
        $event->class = "event-important";
        $event->start = round(microtime(true) * 1000);
        $event->end = round(microtime(true) * 1000);
        $event->save();

        $events = Event::all();

        return view('/calendar', ['events' => $events]);
    }
}
