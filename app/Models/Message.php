<?php
/**
 * Created by PhpStorm.
 * User: thijs
 * Date: 8-6-2016
 * Time: 16:29
 */

namespace App\Models;


use NeoEloquent;

class Message extends NeoEloquent{
    protected $connection = 'neo4j';
    protected $label = 'Message';
    protected $fillable = ['text'];

    public function NeoUsers() {
        return $this->morphMany('App\Models\NeoUser', 'POSTED');
    }

    public function commentables() {
        return $this->morphTo('App\Models\Group', 'ON');
    }
}