<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    /**
     * Adds a custom attribute: URL, based on ID
     * This URL is used by the calendar when you click on the event
     */
    function makeUrl(){
        $this->attributes['url'] = 'event/' . $this->attributes['id'];
    }

}
