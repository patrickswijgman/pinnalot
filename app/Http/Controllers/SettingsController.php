<?php

namespace App\Http\Controllers;

use App\User;
use Html;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\HtmlString;

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
        if (isset($_FILES['profileimage'])) {
            $aExtraInfo = getimagesize($_FILES['profileimage']['tmp_name']);
            $sImage = "data:" . $aExtraInfo["mime"] . ";base64," . base64_encode(file_get_contents($_FILES['profileimage']['tmp_name']));
            return new HtmlString(json_encode(Input::all()) . '<br/><img src="' . $sImage . '" alt="Your Image" />');
        }
    }
    

}

