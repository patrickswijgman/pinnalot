<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\UserData;
use Auth;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

use App\Http\Requests;

class CalendarController extends Controller
{

    function show(){
        $events = array();
        $userdata = Auth::user()->userData;

        foreach($userdata->invites()->edges() as $edge) {
            if($edge->related()->status=='owner') {
                $events[] = $edge->related()->event;
            }
        }

        $calendarEvents = '[]';
        if (json_encode($events) != '[null]') {
            $calendarEvents = json_encode($events);
        }
        return view('calendar', ['events' => $calendarEvents, 'page' => 'Calendar']);
    }
}
