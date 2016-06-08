<?php

namespace App\Helpers;

use Illuminate\Support\HtmlString;

class MdlForm
{
    
    static function text($name, $label){
        return new HtmlString('
        <div style="text-align: center">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="'.$name.'" class="mdl-textfield__input" type="text" id="'.$name.'">
                <label class="mdl-textfield__label" for="'.$name.'">'.$label.'</label>
            </div>
        </div>');
    }

    static function textArea($name, $label) {
        return new HtmlString('
        <div style="text-align: center">  
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <textarea name="'.$name.'" class="mdl-textfield__input" rows= "5" id="'.$name.'" ></textarea>
                <label class="mdl-textfield__label" for="'.$name.'">'.$label.'</label>
            </div>
        </div>');
    }
    
    static function submit($name, $label) {
        return new HtmlString('
        <div style="text-align: center">
            <input name="'.$name.'" type="submit" value="'.$label.'" 
            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" >
        </div>');
    }

}