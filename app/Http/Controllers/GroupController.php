<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Group;
use App\Models\GroupType;
use App\Models\UserData;
use App\User;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Redirect;
use Vinelab\NeoEloquent\Eloquent\Edges\Edge;

class GroupController extends Controller {

    /**
     * Show all the groups where the user is member of said groups.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $groups = array();
        $userdata = Auth::user()->userData;
        foreach($userdata->memberOf()->edges() as $edge) {
            $groups[] = ($edge->related());
        }
        return view('group', [
                'page' => 'Groups',
                'groups' => $groups
            ]);
    }

    /**
     * Show a form which lets the user create a new group.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $types[0] = GroupType::all()->pluck('type');
        $types[1] = $types[0];
        return view('group_form', [
                'page' => 'Create new group',
                'types' => $types
            ]);
    }

    /**
     * Store the newly created group in the graph database.
     *
     * @param GroupRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request) {
        $data = $request->input();
        $userdata = Auth::user()->userData;
        $group = Group::create($data);
        $edge = $userdata->joins()->save($group);
        $edge->status='owner';
        $edge->save();
        return Redirect::to('group/' . $group->id);
    }

    /**
     * Show a specific group with its members and calendar.
     *
     * @param Group $group
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Group $group) {
        $members = array();
        foreach($group->members()->edges() as $edge) {
            $members[0][] = $edge->related();
            $members[1][] = $edge->status;
        }

        //Group events
        $events = array();
        foreach($group->invitedFor()->edges() as $edge) {
            $event = $edge->related();
            $event->url = $group->id.'/event/'.$event->id;
            $events[] = $event;
        }

        $status = $group->members()->edge(Auth::user()->userData)->status;

        return view('group_info', [
                'page'=>$group->name,
                'members'=>$members,
                'group'=>$group,
                'events'=>json_encode($events),
                'status'=>$status
        ]);
    }

    /**
     * Let the current logged in user leave a chosen group.
     *
     * @param Group $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function leave(Group $group) {
        $user = Auth::user()->userData;
        $isMember = $this->isMember($group, $user);
        if (isset($isMember)) {
            $group->members()->detach($user);
        }
        return Redirect::to('group');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Group $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group) {
        $types[0] = GroupType::all()->pluck('type');
        $types[1] = $types[0];
        if($this->isAuthorized($group)) {
            return view('group_form', [
                'page' => 'Edit group '.$group->name,
                'group' => $group,
                'types' => $types
            ]);
        } else {
            return Redirect::to('group');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GroupRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(GroupRequest $request, Group $group) {
        if($this->isAuthorized($group)) {
            $group->fill($request->input())->save();
        }
        return Redirect::to('group/'.$group->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Group $group
     * @return \Illuminate\Http\Response
     * @throws \Exception
     * @internal param int $id
     */
    public function destroy(Group $group) {
        foreach($group->invitedFor()->edges() as $edge) {
            $edge->related()->delete();
        }
        if($this->isAuthorized($group)) {
            $group->delete();
        }
        return Redirect::to('group');
    }

    /**
     * Show a form with a search input for a person.
     *
     * @param Group $group
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchPerson(Group $group) {
        if ($this->isAuthorized($group)) {
            return view('group_person_search', [
                    'page' => 'Add person to ' . $group->name,
                    'group' => $group
                ]
            );
        } else {
            return Redirect::to('group/' . $group->id);
        }
    }
    
    /**
     * Show results from given search input
     *
     * @param Group $group
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchPersonResult(Group $group) {
        $edge = null;
        $userDataId = null;
        $results = User::where('email', Input::get('search_person'))->first();
        if (isset($results)) {
            $userData = $results->userData;
            $userDataId = $userData->id;
            $edge = $group->members()->edge($userData);
        }
        return view('group_person_add', [
                'page' => 'Add person to ' . $group->name,
                'users' => $results,
                'group' => $group,
                'member_of' =>$edge,
                'user_id' => $userDataId
            ]
        );
    }

    /**
     * Add a selected person (from a search input) as member to the group
     *
     * @param Group $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Group $group) {
        $data = Input::all();
        $member = UserData::find($data['candidate_radio']);
        $edge = $member->joins()->save($group);
        $edge->status='member';
        $edge->save();
        return Redirect::to('group/'.$group->id);
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
