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
            return view('settings', [
                'page' => 'Edit settings',
                'settings' => $settings
            ]);
        } else {
            return Redirect::to('home');
        }
    }

    function update(SettingsRequest $request, Event $event){
        $data = $request->input();

        $data['start'] = Helper::dateToISOString($data['start']);
        $data['end'] = Helper::dateToISOString($data['end']);

        $event->update($data);
        $event->save();

        return Redirect::to('calendar');
    }



}

