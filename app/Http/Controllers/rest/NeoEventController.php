<?php

namespace App\Http\Controllers;

use App\Http\Requests\NeoEventRequest;
use App\Models\Event;
use app\Models\NeoEvent;
use Illuminate\Http\Request;

use App\Http\Requests;

class NeoEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return NeoEvent::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NeoEventRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(NeoEventRequest $request) {
        NeoEvent::create($request->input());
    }

    /**
     * Display the specified resource.
     *
     * @param NeoEvent $event
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(NeoEvent $event){
        return $event;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param NeoEvent $event
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(NeoEvent $event) {
        return view('event.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NeoEventRequest|Request $request
     * @param NeoEvent $event
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(NeoEventRequest $request, NeoEvent $event) {
        $event->fill($request->input());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param NeoEvent $event
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(NeoEvent $event) {
        $event->delete();
    }
}
