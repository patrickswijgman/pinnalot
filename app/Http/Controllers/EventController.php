<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

use App\Http\Requests;

class EventController extends Controller
{
    function show($id){

        /** @var Event $event */
        $event = Event::find($id);
        $event->start = Event::convertTimestampToDateTime($event->start);
        $event->end = Event::convertTimestampToDateTime($event->end);

        return view('/event', ['event' => $event]);
    }
}
