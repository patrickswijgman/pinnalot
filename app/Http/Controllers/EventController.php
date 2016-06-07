<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

use App\Http\Requests;

class EventController extends Controller
{
    function show($id)
    {
        /** @var Event $event */
        $event = Event::find($id);
        if (isset($event)) {
            return view('event', ['event' => $event]);
        }
        return null;
    }
}
