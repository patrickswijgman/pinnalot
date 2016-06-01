<?php

/**
 * Created by PhpStorm.
 * User: patri
 * Date: 1-6-2016
 * Time: 18:13
 */

namespace App\Elements;

class BootstrapCalendar
{

    function render(){
        return '    
        <div id="calendar"></div>
        <script type="text/javascript" src="js/vendor/jquery-1.12.4.min.js"></script>
        <script type="text/javascript" src="js/vendor/underscore-min.js"></script>
        <script type="text/javascript" src="js/language/nl-NL.js"></script>
        <script type="text/javascript" src="js/calendar.js"></script>
        <script type="text/javascript" src="js/app.js"></script>';
    }

}