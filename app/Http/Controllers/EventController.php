<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Validator;
use App\Models\Event;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;


class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    function show(){
        return view('event_new', ['page' => 'Create new event']);
    }

    function create(){

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
        Event::create($data);
        return redirect('calendar');

    }
}
