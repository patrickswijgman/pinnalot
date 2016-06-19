<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\EventRequest;
use App\Models\Event;

use App\Http\Requests;
use App\Models\UserData;
use Auth;
use Illuminate\Support\Facades\Input;
use Redirect;


class EventController extends Controller
{

    /**
     * Show a event creation form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function create(){
        return view('event_form', [
            'page' => 'Create new event',
            'startDate' => (Input::get('d', null)),
            'endDate' => (Input::get('d', null))
        ]);
    }

    /**
     * Show a specific event.
     *
     * @param Event $event
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Event $event) {
        return view('event_show', [
            'page' => $event->title,
            'event' => $event,
            'startDate' => Helper::isoToDateString($event->start),
            'endDate' => Helper::isoToDateString($event->end)
        ]);
    }

    /**
     * Show a edit event form for a specific event.
     *
     * @param Event $event
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    function edit(Event $event) {
        if ($this->isAuthorized($event) || $this->isGroupAuthorized($event)) {
            return view('event_form', [
                'page' => 'Edit '.$event->title.' event',
                'event' => $event,
                'startDate' => Helper::isoToDateString($event->start),
                'endDate' => Helper::isoToDateString($event->end)
            ]);
        } else {
            return Redirect::to('calendar');
        }
    }

    /**
     * Save the newly created event in the graph database.
     *
     * @param EventRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    function store(EventRequest $request){
        $data = $request->input();

        $data['start'] = Helper::dateToISOString($data['start']);
        $data['end'] = Helper::dateToISOString($data['end']);

        $userdata = Auth::user()->userData;
        $event = Event::create($data);
        $edge = $userdata->invitation()->save($event);
        $edge->status='owner';
        $edge->save();

        return Redirect::to('calendar');
    }

    /**
     * Update an existing event.
     *
     * @param EventRequest $request
     * @param Event $event
     * @return \Illuminate\Http\RedirectResponse
     */
    function update(EventRequest $request, Event $event){
        if($this->isAuthorized($event) || $this->isGroupAuthorized($event)) {
            $data = $request->input();

            $data['start'] = Helper::dateToISOString($data['start']);
            $data['end'] = Helper::dateToISOString($data['end']);

            $event->fill($data)->save();
        }

        return Redirect::to('calendar');
    }

    /**
     * Delete a specific event.
     *
     * @param Event $event
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    function destroy(Event $event) {
        if($this->isAuthorized($event) || $this->isGroupAuthorized($event)) {
            $event->delete();
        }
        return Redirect::to('calendar');
    }

    /**
     * Check if the user that wants to alter the event,
     * that belongs to a group, is the owner of the group.
     *
     * @param Event $event
     * @return bool
     */
    private function isGroupAuthorized(Event $event){
        $userdata = Auth::user()->userData;
        foreach($event->belongsToGroups()->edges() as $edge) {
            $group = $edge->related();
            $isGroupOwner = $group->members()->edge($userdata);
            if(!empty($isGroupOwner) && $isGroupOwner->status == 'owner') {
                return true;
            }
        }
        return false;
    }

    /**
     * Check if the user is the owner of the event.
     *
     * @param Event $event
     * @return bool
     */
    private function isAuthorized(Event $event) {
        $user = Auth::user()->userData;
        $isInvited = $this->isInvited($event, $user);
        return (isset($isInvited)? ($isInvited->status == 'owner') : false);
    }

    /**
     * Check if the user is invited for the event, else returns null.
     *
     * @param Event $event
     * @param UserData $user
     * @return \Vinelab\NeoEloquent\Eloquent\Edges\Edge
     */
    private function isInvited(Event $event, UserData $user){
        return $event->invites()->edge($user);
    }

}
