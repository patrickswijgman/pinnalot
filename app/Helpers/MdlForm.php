<?php

namespace App\Helpers;

class MdlForm
{
    
    static function text($name, $label){
        return '
        <div class="mdl-textfield mdl-js-textfield">
            <input name="'.$name.'" class="mdl-textfield__input" type="text" id="'.$label.'">
            <label class="mdl-textfield__label" for="'.$label.'">'.$label.'</label>
        </div>';
    }
    
    static function submit($name, $label) {
        return '
        <div>
            <input name="'.$name.'" type="submit" value="'.$label.'" 
            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" >
        </div>';
    }

}