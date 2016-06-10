<?php
/**
 * Created by PhpStorm.
 * User: thijs
 * Date: 8-6-2016
 * Time: 16:58
 */

namespace App\Models;


use NeoEloquent;
use Vinelab\NeoEloquent\Eloquent\Relations\MorphTo;

class NeoUser  extends NeoEloquent{
    protected $connection = 'neo4j';
    protected $label = 'NeoUser';
    protected $dates = ['created_at', 'updated_at', 'birthday'];
    protected $fillable = ['username', 'birthday', 'country', 'timezone', 'email','image'];

    public function comment($morph = null) {
        return $this->hyperMorph($morph, 'App\Models\Message', 'POSTED', 'ON');
    }

    public function doubt($morph = null) {
        return $this->hyperMorph($morph, 'App\Models\Payment', 'DOUBTS', 'TO');
    }

    public function invite($morph = null) {
        return $this->hyperMorph($morph, 'App\Models\Invitation', 'INVITED', 'FOR');
    }

    public function availables($morph = null) {
        return $this->hyperMorph($morph,'App\Models\Availabillity', 'AVAILABLE', 'AT');
    }



    public function comments() {
        return $this->morphMany('App\Models\Message', 'POSTED');
    }

    public function invites() {
        return $this->morphMany('App\Models\Invite', 'INVITES');
    }

    public function doubts() {
        return $this->morphMany('App\Models\Invoice', 'DOUBTS');
    }
}