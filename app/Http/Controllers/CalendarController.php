<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Elements\BootstrapCalendar;

class CalendarController extends Controller
{
    function view(){
        $events = array(
            'id' => 1,
            'title' => 'event 1',
            'url' => 'event/1',
            'class' => 'event-important',
            'start' => round(microtime(true) * 1000),
            'end' => round(microtime(true) * 1000)
        );
        $json = '[' . json_encode($events) . ']';
        return view('/calendar', ['events' => $json]);
    }
}
