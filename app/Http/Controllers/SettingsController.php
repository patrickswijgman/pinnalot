<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\User;
use Html;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\HtmlString;

class SettingsController extends Controller
{

    function show($id){

        $user = User::find($id);

        $countries = array();
        $countryCollection = Country::all('country_name');
        foreach($countryCollection as $country) {
            $countries[] = $country->country_name;
        }
        $countries = json_encode($countries);

        return view('settings', [
            'page' => 'Settings',
            'user' => $user,
            'id' => $id,
            'countries' => $countries
        ]);
    }

    function save($id) {
        if (isset($_FILES['profileimage'])) {
            $aExtraInfo = getimagesize($_FILES['profileimage']['tmp_name']);
            $sImage = "data:" . $aExtraInfo["mime"] . ";base64," . base64_encode(file_get_contents($_FILES['profileimage']['tmp_name']));
            return new HtmlString(json_encode(Input::all()) . '<br/><img src="' . $sImage . '" alt="Your Image" />');
        }
    }
    

}

