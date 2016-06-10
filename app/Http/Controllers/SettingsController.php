<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Country;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\HtmlString;

class SettingsController extends Controller
{

    function show($id){

        $user = User::find($id);
        
        $countryCollection = Country::all('id', 'country_name');
        $countries = Helper::makeDropdownItemsFromCollection($countryCollection, 'id', 'country_name');

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

