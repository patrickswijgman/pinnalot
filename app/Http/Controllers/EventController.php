<?php

namespace App\Http\Controllers;

use App\Helpers\DateTimeHelper;
use App\Models\Event;
use Carbon\Carbon;
use Date;
use DateTime;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class EventController extends Controller
{
    function show(){
        return view('event_new', ['page' => 'Create new event']);
    }

    function create(){
        $data = Input::all();
        $data['start'] = DateTimeHelper::dateToIsoString($data['start']);
        $data['end'] = DateTimeHelper::dateToIsoString($data['end']);
        $event = Event::create($data);
        return $event;
    }
}
