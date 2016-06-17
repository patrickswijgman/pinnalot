<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Group;
use App\Models\Member;
use Auth;
use Illuminate\Http\Request;
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
