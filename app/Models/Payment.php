<?php
/**
 * Created by PhpStorm.
 * User: thijs
 * Date: 8-6-2016
 * Time: 16:52
 */

namespace App\Models;


use NeoEloquent;

class Payment extends NeoEloquent{
    protected $connection = 'neo4j';
    protected $label = 'Payment';
    protected $fillable = ['description', 'price'];

    public function group() {
        return $this->belongsTo('App\Model\Group', 'HAS');
    }

    public function invoices() {
        return $this->morphMany('App\Models\Invoice','FROM');
    }
}