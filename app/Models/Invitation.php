<?php
/**
 * Created by PhpStorm.
 * User: thijs
 * Date: 9-6-2016
 * Time: 13:50
 */

namespace App\Models;

use NeoEloquent;

class Invitation extends NeoEloquent{
    protected $connection = 'neo4j';
    protected $fillable = ['status','text'];
    protected $label = 'Invitation';

    public function NeoUsers() {
        return $this->morphMany('App\Models\NeoUser', 'INVITED');
    }

    public function event() {
        return $this->morphTo('App\Models\Event', 'FOR');
    }

}