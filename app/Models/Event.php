<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    /**
     * Types of events:
     *
     * event-warning
     * event-success
     * event-info
     * event-inverse
     * event-special
     * event-important
     */

    /**
     * Adds a custom attribute: URL, based on ID
     * This URL is used by the calendar when you click on the event
     */
    function makeUrl(){
        $this->attributes['url'] = 'event/' . $this->attributes['id'];
    }

    /**
     * Converts a timestamp(in milliseconds) to a date and time
     * @param $timestamp
     * @return bool|string
     */
    static function convertTimestampToDateTime($timestamp){
        $seconds = $timestamp / 1000;
        return strftime(date("d F Y h:i", $seconds));
    }

    /**
     * Returns the current date and time in milliseconds
     * @return float
     */
    static function getCurrentTimestamp(){
        return round(microtime(true) * 1000);
    }

}
