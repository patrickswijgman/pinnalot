<?php

namespace App\Models;

use NeoEloquent;

class Group extends NeoEloquent{
    protected $connection = 'neo4j';
    protected $label = 'Group';
    protected $fillable = ['name', 'description', 'type'];

    public function comments() {
        return $this->morphMany('App\Models\Message','ON');
    }

    public function payments() {
        return $this->morphMany('App\Models\Payment', 'HAS');
    }

    public function events() {
        return $this->hasMany('App\Models\Event', 'FOR');
    }

    public function members() {
        return $this->hasMany('App\Models\Member', 'OF');
    }
}
