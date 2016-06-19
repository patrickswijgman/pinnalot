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
use Illuminate\Support\Facades\Input;
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
        User::where(['userData' => 0])->first();
        $user = User::where('name', '=', Input::get('search_person'));
        return view('group_info', [
                'page'=>$group['name'],
                'id' => $group['id'],
                'members'=>$members,
                'group'=>$group
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
        return view('', compact('group'));
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

    public function search(Group $group) {
        $data = Input::all();
        $user = UserData::where('firstname',Input::get('search_person'))->get();


        return view('group_add_person', [
                'page'=> 'Add person to group: '.$group->name,
                'user'=> $user,
                'group' => $group
            ]
        );
    }
    /**
     *
     */
    public function add(Group $group) {
        $data = Input::all();
        //dd($data);
        $member = UserData::find($data['candidate_radio']);
        $edge = $member->joins()->save($group);
        $edge->status='member';
        $edge->save();
        return Redirect::to('group/'.$group->id);
    }
}
