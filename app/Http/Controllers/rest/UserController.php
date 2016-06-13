<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\NeoUser;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return NeoUser::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(UserRequest $request) {
        if(Auth::check()) {
            App::abort(403, "you can't make a user if you are logged in");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if(Auth::check()) {
            App::abort(403, "you can't make a user if you are logged in");
        }
        NeoUser::create($request->input());
    }

    /**
     * Display the specified resource.
     *
     * @param NeoUser $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(NeoUser $user) {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param NeoUser $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(NeoUser $user) {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param NeoUser $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(UserRequest $request, NeoUser $user) {
        $user->fill($request->input());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param NeoUser $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     * @internal param int $id
     */
    public function destroy(NeoUser $user) {
        $user->delete();
    }
}
