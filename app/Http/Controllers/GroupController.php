<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Group;
use App\Models\Invitation;
use App\Models\Member;
use App\Models\GroupType;
use App\User;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use Redirect;

class GroupController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $groups = array();
        $userdata = Auth::user()->userData;
        foreach($userdata->joins()->edges() as $edge) {
            $groups[] = ($edge->related()->group);
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
        $group = Group::create($request->input());

        Auth::user()->userData
            ->joins($group)->save(new Member(['status' => 'owner']));

        return view('')->with(['group', $group]);
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
            $memberNode = $edge->related();
            foreach($memberNode->member()->edges() as $userEdge) {
                $members[] = ($userEdge->related());
            };
        }
        /*
            Auth::user()->userData
            ->joins($group)->save(new Member(['status' => 'member']));
         */
        return view('group_info', [
                'page'=>$group['name'],
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
        return view();
    }

    private function isAuthorized(Group $group) {
        $user = Auth::user()->userData;
        foreach($group->members()->edges($user) as $edge) {
            return($edge->related()->status == 'owner');
        }
    }
}
