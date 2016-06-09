<?php

namespace App\Http\Controllers;

use Validator;
use App\Helpers\DateTimeHelper;
use App\Models\Event;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;


class EventController extends Controller
{
    function show(){
        return view('event_new', ['page' => 'Create new event']);
    }

    function create(){

        $request = new Request();
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('event/new')
                ->withErrors($validator)
                ->withInput();
        }

        $data = Input::all();
        $data['start'] = DateTimeHelper::dateToIsoString($data['start']);
        $data['end'] = DateTimeHelper::dateToIsoString($data['end']);
        Event::create($data);
        return redirect('calendar');

    }
}
