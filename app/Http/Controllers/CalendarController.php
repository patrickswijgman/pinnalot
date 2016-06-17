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

        foreach($userdata->memberOf()->edges() as $edge) {
            $usergroup = ($edge->related());
            foreach($usergroup->invitedFor()->edges() as $edge) {
                $events[] = $edge->related();
            }
        }

        foreach($userdata->invitedFor()->edges() as $edge) {
            $events[] = $edge->related();
        }
        
        return view('calendar', ['events' => json_encode($events),  'page' => 'Calendar']);
    }
}
