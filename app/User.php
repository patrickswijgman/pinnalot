<?php

namespace App;

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
