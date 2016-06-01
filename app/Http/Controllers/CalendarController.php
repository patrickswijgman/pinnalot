<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Elements\BootstrapCalendar;

class CalendarController extends Controller
{
    function view(){
        $calendar = new BootstrapCalendar();
        return view('/calendar', ['calender' => $calendar->render()]);
    }
}
