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

    public function comments($morph = null) {
        return $this->hyperMorph($morph, 'App\Models\Message', 'POSTED', 'ON');
    }

    public function doubts($morph = null) {
        return $this->hyperMorph($morph, 'App\Models\Payment', 'DOUBTS', 'FROM');
    }

    public function invites($morph = null) {
        return $this->hyperMorph($morph, 'App\Models\Invitation', 'INVITED', 'FOR');
    }
    public function joins($morph = null) {
        return $this->hyperMorph($morph, 'App\Models\Member', 'MEMBER', 'OF');
    }

    public function availables($morph = null) {
        return $this->hyperMorph($morph,'App\Models\Availabillity', 'AVAILABLE', 'AT');
    }

    public function groups($morph = null) {
        return $this->hyperMorph($morph, 'App\Models\Group', 'MEMBER', "OF");
    }
}