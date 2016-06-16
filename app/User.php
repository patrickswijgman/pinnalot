<?php

namespace App;

use App\Models\SettingsDefault;
use App\Models\SettingsUser;
use App\Models\UserData;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'userData'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function getSettingsUserAttribute() {
        return SettingsUser::where('user_id', $this->id)->first();
    }

    function getPrimaryColorAttribute(){
        $primaryColor = $this->settingsUser->primary_color;
        $primaryColorDefault = SettingsDefault::first()->primary_color;
        return (!empty($primaryColor))? $primaryColor : $primaryColorDefault;
    }

    function getLandingPageAttribute(){
        $page = $this->settingsUser->landing_page;
        $pageDefault = SettingsDefault::first()->landing_page;
        return (!empty($page))? $page : $pageDefault;
    }


    function getAccentColorAttribute(){
        $accentColor = $this->settingsUser->accent_color;
        $accentColorDefault = SettingsDefault::first()->accent_color;
        return (!empty($accentColor))? $accentColor : $accentColorDefault;
    }

    function getUserDataAttribute($userData){
        return UserData::find($userData);
    }

    function getFirstnameAttribute(){
        return $this->userData->firstname;
    }

    function getLastnameAttribute(){
        return $this->userData->lastname;
    }

    function getBirthdayAttribute(){
        return $this->userData->birthday;
    }

    function getCountryAttribute(){
        return $this->userData->country;
    }

    function getProfileimageAttribute(){
        return $this->userData->profileimage;
    }

}
