<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\EventRequest;
use App\Models\Event;

use App\Http\Requests;
use App\Models\Group;
use App\Models\Invitation;
use App\Models\UserData;
use Auth;
use Illuminate\Support\Facades\Input;
use Redirect;


class GroupEventController extends Controller
{

    function create(Group $group){
        return view('event_form', [
            'page' => 'Create new event for '.$group['name'],
            'startDate' => (Input::get('d', null)),
            'endDate' => (Input::get('d', null)),
            'group' => $group
        ]);
    }

    function show(Group $group, Event $event) {
        return '';
    }

    function store(Group $group, EventRequest $request){
        $data = $request->input();

        $data['start'] = Helper::dateToISOString($data['start']);
        $data['end'] = Helper::dateToISOString($data['end']);

        $event = Event::create($data);  //maak een event aan met de data
        $edge = $group->events()->save($event);
        $edge->status='owner';
        $edge->save();

        return Redirect::to('calendar');
    }

}
