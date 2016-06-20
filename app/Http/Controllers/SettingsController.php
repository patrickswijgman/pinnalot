<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsRequest;
use App\Models\MdlColor;
use App\Models\SettingsDefault;
use App\Models\SettingsUser;
use Auth;
use Redirect;

class SettingsController extends Controller
{
    /**
     * Show a form for the user that they can utilize for changing their personal settings.
     *
     * @param SettingsUser $settings
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    function edit(SettingsUser $settings) {
        if ($settings->user_id == Auth::user()->id) {
            $settingsDefault = SettingsDefault::first();
            if ($settings->primary_color == '') {$settings->primary_color = $settingsDefault->primary_color;}
            if ($settings->accent_color == '') {$settings->accent_color = $settingsDefault->accent_color;}
            if ($settings->landing_page == '') {$settings->landing_page = $settingsDefault->landing_page;}
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

    /**
     * Update the users' personal settings in the database.
     *
     * @param SettingsRequest $request
     * @param SettingsUser $settings
     * @return \Illuminate\Http\RedirectResponse
     */
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

