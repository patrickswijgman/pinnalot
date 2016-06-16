<?php

namespace App\Models;

use NeoEloquent;

class Group extends NeoEloquent{
    protected $connection = 'neo4j';
    protected $label = 'Group';
    protected $fillable = ['name', 'description', 'kind'];

    public function comments() {
        return $this->morphMany('App\Models\Message','ON');
    }

    public function payments() {
        return $this->morphMany('App\Models\Payment', 'HAS');
    }

    public function neoEvents() {
        return $this->hasMany('App\Models\NeoEvent', 'PLANNED');
    }

    public function members() {
        return $this->hasMany('App\Models\UserData', 'OF');
    }
}
