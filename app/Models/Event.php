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

    public function invitations() {
        return $this->hasMany('App\Models\Invitation', 'FOR');
    }

    public function timeOptions() {
        return $this->hasMany('App\Models\TimeOptions', 'OPTIONS');
    }

    /**
     * Adds a custom attribute: URL, based on ID
     * This URL is used by the calendar when you click on the event
     */
    function getUrlAttribute(){
        return 'event/' . $this->attributes['id'] . '/edit';
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
