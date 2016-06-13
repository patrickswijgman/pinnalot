<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\EventFormRequest;
use App\Models\Event;

use App\Http\Requests;
use App\Models\Invitation;
use Auth;
use Illuminate\Support\Facades\Input;
use Redirect;


class EventController extends Controller
{

    function create(){
        return view('event_form', [
            'page' => 'Create new event',
            'startDate' => (Input::get('d', null)),
            'endDate' => (Input::get('d', null))
        ]);
    }

    function edit(Event $event) {
        return view('event_form', [
            'page' => 'Edit event',
            'event' => $event,
            'startDate' => Helper::isoToDateString($event->start),
            'endDate' => Helper::isoToDateString($event->end)
        ]);
    }

    function store(EventFormRequest $request){
        $data = $request->input();

        $data['start'] = Helper::dateToISOString($data['start']);
        $data['end'] = Helper::dateToISOString($data['end']);

        $event = Event::create($data);

        $userdata = Auth::user()->userData;
        $invitation = new Invitation(['status' => 'owner']);
        $userdata->invites($event)->save($invitation);

        return Redirect::to('calendar');
    }

    function update(EventFormRequest $request, Event $event){
        $data = $request->input();

        $data['start'] = Helper::dateToISOString($data['start']);
        $data['end'] = Helper::dateToISOString($data['end']);

        $event->update($data);
        $event->save();

        return Redirect::to('calendar');
    }

    function destroy(Event $event) {
        $event->delete();
        return Redirect::to('calendar');
    }

}
