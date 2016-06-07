<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    /**
     * Adds a custom attribute: URL, based on ID
     * This URL is used by the calendar when you click on the event
     */
    private function makeUrl(){
        $this->attributes['url'] = 'event/' . $this->attributes['id'];
    }

    private function fixBorderColor(){
        $this->attributes['borderColor'] = $this->attributes['backgroundColor'];
    }

    static function getAll() {
        $events = Event::all();

        /** @var Event $event */
        foreach($events as $event) {
            $event->makeUrl();
            $event->fixBorderColor();
        }

        return $events;
    }

}
