<?php

namespace App\Helpers;

use DateTime;

class Helper
{

    /**
     * Convert a date time string (e.g. 29-05-1994 23:30) to an ISO8601 string
     * @param $dateString
     * @return string
     */
    static function dateToISOString($dateString){
        date_default_timezone_set(ini_get('date.timezone'));
        $date = new DateTime($dateString);
        return $date->format('c');
    }

    /**
     * Gets the first 2 columns(attributes) and puts it in a associative array
     * This array can then be used to populate MdlForm::dropdown()
     * the first column is the value (e.g. country_id)
     * the second column is the label (e.g. country_name)
     * @param $collection
     * @return array
     */
    static function makeDropdownItemsFromCollection($collection){
        $array = array();
        foreach($collection as $item) {
            $index = 0;
            foreach($item['attributes'] as $attribute) {
                $array[$index][] = $attribute;
                $index++;
            }
        }
        return $array;
    }

}