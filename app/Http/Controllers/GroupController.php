<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Group;
use App\Models\Invitation;
use App\Models\Member;
use App\Models\GroupType;
use App\Models\UserData;
use App\User;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use Redirect;
use Vinelab\NeoEloquent\Eloquent\Edges\Edge;

class GroupController extends Controller {
    /**
     * Display a listing of the resource.
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
            ]
        );
        
    }

    /**
     * Show the form for creating a new resource.
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
     * Store a newly created resource in storage.
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group) {
        $members = array();
        foreach($group->members()->edges() as $edge) {
            $members[] = $edge->related();
        }
        return view('group_info', [
                'page'=>$group['name'],
                'id' => $group['id'],
                'group'=>$members
        ]
        );
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
        if($this->isAuthorized($group)) {
            $group->delete();
        }
        return Redirect::to('group');
    }

    /**
     * Returns true of the loggedin user is the owner of the given group
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
     * @param Group $group
     * @param UserData $user
     * @return Edge
     */
    private function isMember(Group $group, UserData $user){
        return $group->members()->edge($user);
    }
}
