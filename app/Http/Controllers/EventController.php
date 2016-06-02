<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

use App\Http\Requests;

class EventController extends Controller
{

        /** @var Event $event */
        $event = Event::find($id);

    }
}
