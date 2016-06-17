<?php
/**
 * Created by PhpStorm.
 * User: thijs
 * Date: 8-6-2016
 * Time: 16:58
 */

namespace App\Models;


use NeoEloquent;


class UserData  extends NeoEloquent{
    protected $connection = 'neo4j';
    protected $label = 'UserData';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['firstname', 'lastname', 'birthday', 'country', 'profileimage'];

    public function memberOf(){
        return $this->belongsToMany('App\Models\Group', 'MEMBER_OF');
    }

    public function joins() {
        return $this->hasMany('App\Models\Group', 'MEMBER_OF');
    }

    public function invitation() {
        return $this->hasMany('App\Models\Event', 'INVITED_FOR');
    }

    public function invitedFor(){
        return $this->belongsToMany('App\Models\Event', 'INVITED_FOR');
    }
}