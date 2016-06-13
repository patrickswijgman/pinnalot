<?php
/**
 * Created by PhpStorm.
 * User: thijs
 * Date: 9-6-2016
 * Time: 13:50
 */

namespace app\Models;


use Eloquent;

class Invitation extends Eloquent{
    protected $connection = 'neo4j';
    protected $fillable = ['status','text'];
    protected $label = 'Invitation';

    public function NeoUsers() {
        return $this->morphMany('App\Models\NeoUser', 'INVITED');
    }

    public function event() {
        return $this->morphTo('App\Models\NeoEvent', 'FOR');
    }

}