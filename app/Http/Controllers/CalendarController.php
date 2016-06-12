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

        $events = Event::all();

        return view('calendar', ['events' => $events, 'page' => 'Calendar']);
    }
}
