<?php

namespace App\Helpers;

use DateTime;

class Helper
{

    static function dateToISOString($dateString){
        date_default_timezone_set(ini_get('date.timezone'));
        $date = new DateTime($dateString);
        return $date->format('c');
    }

    static function makeDropdownItemsFromCollection($collection, $col1, $col2){
        $array = array();
        foreach($collection as $item) {
            $array[0][] = $item['attributes'][$col1];
            $array[1][] = $item['attributes'][$col2];
        }
        return $array;
    }

}