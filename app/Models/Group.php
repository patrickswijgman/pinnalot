<?php

namespace App\Models;

use NeoEloquent;

class Group extends NeoEloquent{
    protected $connection = 'neo4j';
    protected $label = 'Group';
    protected $fillable = ['name', 'description', 'type'];

    public function comments() {
        return $this->morphMany('App\Models\Message','COMMENTED_ON');
    }

    public function payments() {
        return $this->morphMany('App\Models\Payment', 'PAYMENT');
    }

    public function events() {
        return $this->hasMany('App\Models\Event', 'INVITED_FOR');
    }

    public function members() {
        return $this->hasMany('App\Models\UserData', 'MEMBER_OF');
    }
}
