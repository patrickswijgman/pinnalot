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

    static function isoToDateString($isoString){
        $date = new DateTime($isoString);
        return $date->format('d-m-Y H:i');
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

    static function hex2rgb($hex) {
        $hex = str_replace("#", "", $hex);

        if(strlen($hex) == 3) {
            $r = hexdec(substr($hex,0,1).substr($hex,0,1));
            $g = hexdec(substr($hex,1,1).substr($hex,1,1));
            $b = hexdec(substr($hex,2,1).substr($hex,2,1));
        } else {
            $r = hexdec(substr($hex,0,2));
            $g = hexdec(substr($hex,2,2));
            $b = hexdec(substr($hex,4,2));
        }
        $rgb = array($r, $g, $b);
        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    }

    static function getLabelBrightness($label){
        $rgb = self::hex2rgb($label);
        return ($rgb[0] * 299 + $rgb[1] * 587 + $rgb[2] * 114) / 1000;
    }

}