<?php
/**
 * Created by PhpStorm.
 * User: thijs
 * Date: 9-6-2016
 * Time: 13:50
 */

namespace App\Models;

use NeoEloquent;

class Member extends NeoEloquent{
    protected $connection = 'neo4j';
    protected $fillable = ['status','text'];
    protected $label = 'Member';

    public function member() {
        return $this->morphToMany('App\Models\UserData', 'MEMBER');
    }

    public function group() {
        return $this->morphTo('App\Models\Group', 'OF');
    }

}