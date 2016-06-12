<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use DateTime;
use Validator;
use App\Models\Event;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;


class EventController extends Controller
{
    
    function show(){
        return view('event_new', [
            'page' => 'Create new event',
            'startDate' => (isset($_GET['d'])? $_GET['d'].' 00:00': null),
            'endDate' => (isset($_GET['d'])? $_GET['d'].' 00:00': null)
        ]);
    }

    function load($id){
        $event = Event::find($id);
        return view('event_new', [
            'page' => 'Edit event',
            'event' => $event,
            'startDate' => Helper::isoToDateString($event->start),
            'endDate' => Helper::isoToDateString($event->end)
        ]);
    }

    function save(){
        $data = Input::all();

        $validator = Validator::make($data, [
            'title' => 'required',
            'description' => 'required',
            'backgroundColor' => 'required',
            'start' => 'required',
            'end' => 'required|date|after:start',
        ]);

        if ($validator->fails()) {
            return redirect('event/new')
                ->withErrors($validator)
                ->withInput();
        }

        $data['start'] = Helper::dateToISOString($data['start']);
        $data['end'] = Helper::dateToISOString($data['end']);

        if (isset($data['id'])) {
            $id = $data['id'];
            $event = Event::find($id);
            $event->update($data);
        } else {
            $event = new Event($data);
        }

        $event->save();
        return redirect('calendar');
    }
}
