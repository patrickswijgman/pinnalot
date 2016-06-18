<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Auth;

use App\Http\Requests;

class CalendarController extends Controller
{

    function show(){
        $events = array();
        $userdata = Auth::user()->userData;

        //Group events
        foreach($userdata->memberOf()->edges() as $edge) {
            $group = ($edge->related());
            foreach($group->invitedFor()->edges() as $eventEdge) {
                $event = $eventEdge->related();
                $event->url = 'group/'.$group->id.'/event/'.$event->id;
                $events[] = $event;
            }
        }

        //User events
        foreach($userdata->invitedFor()->edges() as $edge) {
            $event = $edge->related();
            $event->url = 'event/'.$event->id;
            $events[] = $event;
        }
        
        return view('calendar', ['events' => json_encode($events),  'page' => 'Calendar']);
    }
}
