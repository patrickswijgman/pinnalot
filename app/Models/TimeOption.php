<?php
/**
 * Created by PhpStorm.
 * User: thijs
 * Date: 8-6-2016
 * Time: 16:33
 */

namespace App\Models;


use NeoEloquent;

class TimeOption  extends NeoEloquent{
    protected $connection = 'neo4j';
    protected $label = 'TimeOption';
    protected $dates = ['start', 'end', 'created_at', 'updated_at'];
    protected $fillable = ['start', 'end'];

    public function event() {
        return $this->belongsTo('App\Models\NeoEvents', 'OPTIONS');
    }

    public function availables() {
        return $this->morphMany('App\Models\Availabillity', 'AT');
    }
}
