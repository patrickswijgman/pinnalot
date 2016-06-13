<?php
/**
 * Created by PhpStorm.
 * User: thijs
 * Date: 8-6-2016
 * Time: 16:58
 */

namespace App\Models;


use NeoEloquent;


class NeoUser  extends NeoEloquent{
    protected $connection = 'neo4j';
    protected $label = 'NeoUser';
    protected $dates = ['created_at', 'updated_at', 'birthday'];
    protected $fillable = ['username', 'birthday', 'country', 'timezone', 'email','image'];

    public function comments($morph = null) {
        return $this->hyperMorph($morph, 'App\Models\Message', 'POSTED', 'ON');
    }

    public function doubts($morph = null) {
        return $this->hyperMorph($morph, 'App\Models\Payment', 'DOUBTS', 'FROM');
    }

    public function invites($morph = null) {
        return $this->hyperMorph($morph, 'App\Models\Invitation', 'INVITED', 'FOR');
    }

    public function availables($morph = null) {
        return $this->hyperMorph($morph,'App\Models\Availabillity', 'AVAILABLE', 'AT');
    }

    public function groups() {
        return $this->belongsToMany('App\Models\Group', 'MEMBER_OF');
    }
}