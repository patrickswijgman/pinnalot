<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class LoginController extends Controller
{
    function show() {
        return view('login');
    }
}
