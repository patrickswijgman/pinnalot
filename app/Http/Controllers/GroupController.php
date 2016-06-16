<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Group;
use App\Models\Invitation;
use App\Models\Member;
use App\Models\GroupType;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class GroupController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        Group::all();
        return view('group', [
                'page' => 'GROUP HOMEPAGE'
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
        return $group;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group) {
        if($this->isAuthorized($group)) {
            return view('', compact('group'));
        } else {
//            Not the right to edit
            return view();
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
        $user = Auth::user()->neoUser;
        if($group->users()->edge($user)->admin) {
            return true;
        } else {
            return false;
        }
    }
}
