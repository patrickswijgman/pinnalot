<?php
/**
 * Created by PhpStorm.
 * User: thijs
 * Date: 9-6-2016
 * Time: 13:22
 */

namespace app\Models;


use NeoEloquent;

class NeoEvent extends NeoEloquent{
    protected $connection = 'neo4j';
    protected $label = 'Event';
    protected $fillable = ['title', 'description', 'start', 'end', 'location', 'type'];

    public function invitations() {
        return $this->hasMany('App\Models\Invitation', 'PLANNED');
    }

    public function timeOptions() {
        return $this->hasMany('App\Models\TimeOptions', 'OPTIONS');
    }
}
