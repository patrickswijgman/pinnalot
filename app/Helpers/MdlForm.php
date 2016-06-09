<?php

namespace App\Helpers;

use Illuminate\Support\HtmlString;

class MdlForm
{
    
    static function text($name, $label, $value="", $type="text", $readonly=null){
        return new HtmlString('
        <div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="'.$name.'" class="mdl-textfield__input" type="'.$type.'" id="'.$name.'" value="'.$value.'" '.$readonly.'>
                <label class="mdl-textfield__label" for="'.$name.'">'.$label.'</label>
            </div>
        </div>');
    }

    static function textArea($name, $label) {
        return new HtmlString('
        <div>  
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <textarea name="'.$name.'" class="mdl-textfield__input" rows= "5" id="'.$name.'" ></textarea>
                <label class="mdl-textfield__label" for="'.$name.'">'.$label.'</label>
            </div>
        </div>');
    }
    
    static function submit($name, $label) {
        return new HtmlString('
        <div>
            <input name="'.$name.'" type="submit" value="'.$label.'" 
            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" >
        </div>');
    }

    static function toggle($name, $label) {
        return new HtmlString('
        <div>
            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="'.$name.'">
                <input type="checkbox" id="'.$name.'" class="mdl-switch__input">
                <span class="mdl-switch__label">'.$label.'</span>
            </label>
        </div>
        ');
    }

}