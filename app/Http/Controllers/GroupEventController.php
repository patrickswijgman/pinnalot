<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\EventRequest;
use App\Models\Event;

use App\Http\Requests;
use App\Models\Group;
use App\Models\UserData;
use Auth;
use Illuminate\Support\Facades\Input;
use Redirect;


class GroupEventController extends Controller
{

    /**
     * Show a form to create a new event for the group.
     *
     * @param Group $group
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    function create(Group $group){
        if ($this->isAuthorized($group)) {
            return view('event_form', [
                'page' => 'Create new event for ' . $group['name'],
                'startDate' => (Input::get('d', null)),
                'endDate' => (Input::get('d', null)),
                'group' => $group
            ]);
        } else {
            return Redirect::to('group');
        }
    }

    /**
     * Show an event belonging to a group along with the members of said group.
     *
     * @param Group $group
     * @param Event $event
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    function show(Group $group, Event $event) {
        $user = Auth::user()->userData;
        $isMember = $this->isMember($group, $user);
        if (isset($isMember)) {
            $members = array();
            foreach($group->members()->edges() as $edge) {
                $members[] = $edge->related();
            }
            return view('event_show', [
                'page' => $event->title,
                'event' => $event,
                'group' => $group,
                'members' => $members,
                'startDate' => Helper::isoToDateString($event->start),
                'endDate' => Helper::isoToDateString($event->end)
            ]);
        } else {
            return Redirect::to('calendar');
        }
    }

    /**
     * Store a newly created event for the group in the graph database.
     *
     * @param Group $group
     * @param EventRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    function store(Group $group, EventRequest $request){
        if ($this->isAuthorized($group)) {
            $data = $request->input();

            $data['start'] = Helper::dateToISOString($data['start']);
            $data['end'] = Helper::dateToISOString($data['end']);

            $event = Event::create($data);  //maak een event aan met de data
            $edge = $group->events()->save($event);
            $edge->status = 'owner';
            $edge->save();

            return Redirect::to('calendar');
        } else {
            return Redirect::to('calendar');
        }
    }

    /**
     * Returns true of the logged in user is the owner of the given group
     *
     * @param Group $group
     * @return bool
     */
    private function isAuthorized(Group $group) {
        $user = Auth::user()->userData;
        $isMember = $this->isMember($group, $user);
        return (isset($isMember)? ($isMember->status == 'owner') : false);
    }

    /**
     * Returns edge if the user is a member of the given group, else returns null
     * 
     * @param Group $group
     * @param UserData $user
     * @return Edge
     */
    private function isMember(Group $group, UserData $user){
        return $group->members()->edge($user);
    }

}
