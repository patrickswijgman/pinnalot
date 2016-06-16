<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\SettingsRequest;
use App\Models\MdlColor;
use App\Models\SettingsUser;
use Auth;
use Redirect;

class SettingsController extends Controller
{
    function edit(SettingsUser $settings) {
        if ($settings->user_id == Auth::user()->id) {
            $mdlColors = MdlColor::all();
            $colors[0] = $mdlColors->sortBy('value')->pluck('value');
            $colors[1] = $mdlColors->sortBy('name')->pluck('name');
            $pages[0] = array('home', 'calendar');
            $pages[1] = array('Home', 'Personal calendar');
            return view('settings', [
                'page' => 'Edit settings',
                'settings' => $settings, 
                'colors' => $colors,
                'pages' => $pages
            ]);
        } else {
            return Redirect::to('home');
        }
    }

    function update(SettingsRequest $request, SettingsUser $settings){
        $data = $request->input();

        $data['primary_color'] = $data['primary_color_hidden'];
        $data['accent_color'] = $data['accent_color_hidden'];
        $data['landing_page'] = $data['landing_page_hidden'];

        $settings->update($data);
        $settings->save();
        return Redirect::to('home');
    }



}

