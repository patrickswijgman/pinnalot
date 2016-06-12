<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Country;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\HtmlString;

class SettingsController extends Controller
{

    function show(){
        $user = Auth::user();
        $id = $user->id;
        
        $countryCollection = Country::all('id', 'country_name');
        $countries = Helper::makeDropdownItemsFromCollection($countryCollection);

        return view('settings', [
            'page' => 'Settings',
            'user' => $user,
            'id' => $id,
            'countries' => $countries
        ]);
    }

    function save() {
        //TODO use settings view
        $id = Auth::user()->id;
        if (isset($_FILES['profileimage'])) {
            $aExtraInfo = getimagesize($_FILES['profileimage']['tmp_name']);
            $sImage = "data:" . $aExtraInfo["mime"] . ";base64," . base64_encode(file_get_contents($_FILES['profileimage']['tmp_name']));
            return new HtmlString(json_encode(Input::all()) . '<br/><img src="' . $sImage . '" alt="Your Image" />');
        }
    }
    

}

