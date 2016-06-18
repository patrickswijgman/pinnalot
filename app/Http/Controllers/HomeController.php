<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;
use Redirect;

class HomeController extends Controller
{
    /**
     * Show the landing_page the user has chosen in his/her settings
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
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
