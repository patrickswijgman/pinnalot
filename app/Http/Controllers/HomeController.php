<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;
use Redirect;

class HomeController extends Controller
{
    public function show()
    {
        $page = Auth::user()->landingPage;
        if ($page == 'home') {
            return view('home');
        } else {
            return Redirect::to($page);
        }
    }
}
