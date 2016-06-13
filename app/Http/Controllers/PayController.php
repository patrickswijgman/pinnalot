<?php

namespace App\Http\Controllers;

use App\User;
use Html;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\HtmlString;

class PayController extends Controller
{
    function show(){


        return view('pay', ['page'=> 'Payment']);
        //return view('settings', compact('users'), ['page' => 'Settings']);
    }

}

