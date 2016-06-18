<?php

namespace App\Models;

use App\Helpers\Helper;
use NeoEloquent;

class Event extends NeoEloquent
{

    protected $connection = 'neo4j';
    protected $label = 'Event';
    protected $fillable = array('title', 'description', 'location', 'backgroundColor', 'start', 'end');
    protected $appends = array('url', 'borderColor', 'textColor');

    public function invites() {
        return $this->hasMany('App\Models\UserData', 'INVITED_FOR');
    }

    public function belongsToGroups(){
        return $this->belongsToMany('App\Models\Group', 'INVITED_FOR');
    }

    public function timeOptions() {
        return $this->hasMany('App\Models\TimeOptions', 'OPTIONS');
    }

    function setUrlAttribute($url){
        $this->attributes['url'] = $url;
    }

    function getUrlAttribute(){
        return isset($this->attributes['url'])? $this->attributes['url'] : '';
    }

    function getBorderColorAttribute(){
        return $this->attributes['backgroundColor'];
    }

    function getTextColorAttribute() {
        if (Helper::getLabelBrightness($this->attributes['backgroundColor']) > 123) {
            return $this->attributes['textColor'] = 'black';
        } else {
            return $this->attributes['textColor'] = 'white';
        }
    }

}
