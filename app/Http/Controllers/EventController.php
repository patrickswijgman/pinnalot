<?php

namespace App\Http\Controllers;

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
        $event = Event::create(Input::all());
        echo $event;
        return '';
    }
}
