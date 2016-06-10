<?php
/**
 * Created by PhpStorm.
 * User: thijs
 * Date: 9-6-2016
 * Time: 13:34
 */

namespace App\Models;


use Eloquent;

class Invoice extends Eloquent{
    protected $connection ='neo4j';
    protected $label = 'Invoice';
    protected $fillable = ['message', 'difference'];


    public function NeoUsers() {
        return $this->morphMany('App\Models\NeoUser', 'DOUBTS');
    }

    public function payment() {
        return $this->morphTo('App\Models\Payment', 'TO');
    }
}