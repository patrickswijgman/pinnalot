<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\EventFormRequest;
use DateTime;
use Validator;
use App\Models\Event;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;


class EventController extends Controller
{
    
    function show(){
        return view('event_form', [
            'page' => 'Create new event',
            'startDate' => (isset($_GET['d'])? $_GET['d'].' 00:00': null),
            'endDate' => (isset($_GET['d'])? $_GET['d'].' 00:00': null)
        ]);
    }

    function load(Event $event){
        return view('event_form', [
            'page' => 'Edit event',
            'event' => $event,
            'startDate' => Helper::isoToDateString($event->start),
            'endDate' => Helper::isoToDateString($event->end)
        ]);
    }

    function save(EventFormRequest $request){
        $data = $request->all();

        $data['start'] = Helper::dateToISOString($data['start']);
        $data['end'] = Helper::dateToISOString($data['end']);

        if (isset($data['id'])) {
            $event = Event::find($data['id']);
            $event->update($data);
        } else {
            $event = new Event($data);
        }

        $event->save();
        return redirect('calendar');
    }
}
