<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = array('title', 'description', 'class', 'backgroundColor', 'start', 'end');

    /**
     * Adds a custom attribute: URL, based on ID
     * This URL is used by the calendar when you click on the event
     */
    private function makeUrl(){
        $this->attributes['url'] = 'calendar';
    }

    private function fixBorderColor(){
        $this->attributes['borderColor'] = $this->attributes['backgroundColor'];
    }

    private function fixTextColor() {
        if (Helper::getLabelBrightness($this->attributes['backgroundColor']) > 123) {
            $this->attributes['textColor'] = 'black';
        } else {
            $this->attributes['textColor'] = 'white';
        }
    }

    static function all($columns = ['*']) {
        $events = parent::all($columns);

        /** @var Event $event */
        foreach($events as $event) {
            $event->makeUrl();
            $event->fixBorderColor();
            $event->fixTextColor();
        }

        return $events;
    }

}
