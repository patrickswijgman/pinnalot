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

        $invites = array_where($userdata->invites()->edges(),
            function($key, $edge) {
                return $edge->related()->status=='owner';
            }
        );

        foreach($invites as $edge) {
            $events[] = $edge->related()->event;
        }
        return view('calendar', ['events' => json_encode($events), 'page' => 'Calendar']);
    }
}
