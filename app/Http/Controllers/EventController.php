<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\EventFormRequest;
use App\Models\Event;

use App\Http\Requests;


class EventController extends Controller
{

    function create(){
        return view('event_create', [
            'page' => 'Create new event',
            'startDate' => (isset($_GET['d'])? $_GET['d'].' 00:00': null),
            'endDate' => (isset($_GET['d'])? $_GET['d'].' 00:00': null)
        ]);
    }

    function edit(Event $event) {
        return view('event_edit', [
            'page' => 'Edit event',
            'event' => $event,
            'startDate' => Helper::isoToDateString($event->start),
            'endDate' => Helper::isoToDateString($event->end)
        ]);
    }

    function store(EventFormRequest $request){
        $data = $request->all();

        $data['start'] = Helper::dateToISOString($data['start']);
        $data['end'] = Helper::dateToISOString($data['end']);

        $event = new Event($data);
        $event->save();

        return redirect('calendar');
    }

    function update(EventFormRequest $request, Event $event){
        $data = $request->all();

        $data['start'] = Helper::dateToISOString($data['start']);
        $data['end'] = Helper::dateToISOString($data['end']);

        $event->update($data);
        $event->save();

        return redirect('calendar');
    }
}
