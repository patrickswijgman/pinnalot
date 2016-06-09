<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;

class SettingsController extends Controller
{
    function show(){

        $users = User::all();

        return view('settings', compact('users'));
        //return view('settings', compact('users'), ['page' => 'Settings']);
    }

    function index($id){

        $user = User::find($id);

        return view('settings', [
            'page' => 'Settings',
            'user' => $user,
            'id' => $id
        ]);
    }

    function changepw(){
        
        return view('changepw', ['page'=> 'Change Password']);
    }

    function save($id) {
        return Input::all();
    }
    

}

