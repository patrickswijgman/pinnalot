<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

use App\Http\Requests;

class CalendarController extends Controller
{
    function show(){

        $event = new Event();
        $event->title = 'Evenement';
        $event->description = 'Once in a lifetime event';
        $event->backgroundColor = 'blue';
        $date = new DateTime();
        $event->start = $date->format(DateTime::ISO8601);
        $event->end = $date->format(DateTime::ISO8601);
        //$event->save();

        $events = Event::all();

        return view('calendar', ['events' => $events, 'page' => 'Calendar']);
    }
}
