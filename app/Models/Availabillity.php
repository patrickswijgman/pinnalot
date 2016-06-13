<?php
/**
 * Created by PhpStorm.
 * User: thijs
 * Date: 9-6-2016
 * Time: 14:45
 */

namespace app\Models;


use Eloquent;

class Availabillity extends Eloquent{

    public function timeOptions() {
        return $this->morphTo('App\Models\TimeOptions', 'AVAILABLES');
    }

    public function event() {
        return $this->morphTo('App\Models\NeoEvent', 'AT');
    }

    public function NeoUser() {
        return $this->morphOne('App\Models\NeoUser', 'AVAILABLE');
    }
}