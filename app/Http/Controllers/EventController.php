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
        if ($this->isAuthorized($event) || $this->isGroupAuthorized($event)) {
            return view('event_form', [
                'page' => 'Edit event',
                'event' => $event,
                'startDate' => Helper::isoToDateString($event->start),
                'endDate' => Helper::isoToDateString($event->end)
            ]);
        } else {
            return Redirect::to('calendar');
        }
    }

    function store(EventRequest $request){
        $data = $request->input();

        $data['start'] = Helper::dateToISOString($data['start']);
        $data['end'] = Helper::dateToISOString($data['end']);

        $userdata = Auth::user()->userData;
        $event = Event::create($data);
        $edge = $event->invites()->save($userdata);
        $edge->status='owner';
        $edge->save();

        return Redirect::to('calendar');
    }

    function update(EventRequest $request, Event $event){
        if($this->isAuthorized($event) || $this->isGroupAuthorized($event)) {
            $data = $request->input();

            $data['start'] = Helper::dateToISOString($data['start']);
            $data['end'] = Helper::dateToISOString($data['end']);

            $event->fill($data)->save();
        }

        return Redirect::to('calendar');
    }

    function destroy(Event $event) {
        if($this->isAuthorized($event)) {
            $event->delete();
        }
        return Redirect::to('calendar');
    }

    private function isGroupAuthorized(Event $event){
        $userdata = Auth::user()->userData;
        foreach($userdata->memberOf()->edges() as $edge) {
            /** @var Group $usergroup */
            $usergroup = ($edge->related());
            $isGroupOwner = $usergroup->members()->edge($userdata);
            if($isGroupOwner->status == 'owner') {
                return true;
            }
        }
        return false;
    }

    private function isAuthorized(Event $event) {
        $user = Auth::user()->userData;
        $isInvited = $this->isInvited($event, $user);
        return (isset($isInvited)? ($isInvited->status == 'owner') : false);
    }

    private function isInvited(Event $event, UserData $user){
        return $event->invites()->edge($user);
    }

}
