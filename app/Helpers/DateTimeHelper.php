<?php
/**
 * Created by PhpStorm.
 * User: patri
 * Date: 9-6-2016
 * Time: 22:59
 */

namespace App\Helpers;


use DateTime;

class DateTimeHelper
{

    static function dateToIsoString($dateString){
        date_default_timezone_set(ini_get('date.timezone'));
        $date = new DateTime($dateString);
        return $date->format('c');
    }

}