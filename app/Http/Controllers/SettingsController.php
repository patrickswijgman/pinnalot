<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\SettingsRequest;
use App\Models\SettingsUser;
use Auth;
use Redirect;

class SettingsController extends Controller
{
    function edit(SettingsUser $settings) {
        if ($settings->user_id == Auth::user()->id) {
            $colors[] = array('deep_orange', 'red', 'pink', 'purple', 'deep_purple', 'indigo', 'blue', 'light blue', 'cyan', 'teal', 'green', 'light_green','lime', 'yellow', 'amber', 'orange');
            $colors[] = array('Deep Orange', 'Red', 'Pink', 'Purple', 'Deep Purple', 'Indigo', 'Blue', 'Light Blue', 'Cyan', 'Teal', 'Green', 'Light Green','Lime', 'Yellow', 'Amber', 'Orange');
            return view('settings', [
                'page' => 'Edit settings',
                'settings' => $settings, 
                'colors' => $colors
            ]);
        } else {
            return Redirect::to('home');
        }
    }

    function update(SettingsRequest $request, SettingsUser $settings){
        $data = $request->input();

        $data['primary_color'] = $data['primary_color_hidden'];
        $data['accent_color'] = $data['accent_color_hidden'];

        dd($data);

        $settings->update($data);
        $settings->save();
        return Redirect::to('calendar');
    }



}

