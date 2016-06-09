<?php

namespace App\Helpers;

use Illuminate\Support\HtmlString;

class MdlForm
{
    
    static function text($name, $label, $value="", $type="text", $readonly=null, $required=null){
        return new HtmlString('
        <div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="'.$name.'" class="mdl-textfield__input" type="'.$type.'" id="'.$name.'" value="'.(($value != "")? $value: old($name)).'" '.$readonly.' '.$required.'>
                <label class="mdl-textfield__label" for="'.$name.'">'.$label.'</label>
            </div>
        </div>
        ');
    }

    static function textArea($name, $label, $value="") {
        return new HtmlString('
        <div>  
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <textarea name="'.$name.'" class="mdl-textfield__input" rows= "5" id="'.$name.'" >'.(($value != "")? $value: old($name)).'</textarea>
                <label class="mdl-textfield__label" for="'.$name.'">'.$label.'</label>
            </div>
        </div>');
    }
    
    static function submit($name, $label) {
        return new HtmlString('
        <br/><br/>
        <div>
            <input name="'.$name.'" type="submit" value="'.$label.'" 
            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" >
        </div>');
    }

    static function toggle($name, $label) {
        return new HtmlString('
        <div>
            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="'.$name.'">
                <input type="checkbox" name="'.$name.'" id="'.$name.'" class="mdl-switch__input">
                <span class="mdl-switch__label">'.$label.'</span>
            </label>
        </div>
        ');
    }

    static function uploadFile($name, $label){
        return new HtmlString('
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--file">
                <input class="mdl-textfield__input" placeholder="'.$label.'" type="text" id="'.$name.'File" readonly/>
                <div class="mdl-button mdl-button--primary mdl-button--icon mdl-button--file">
                    <i class="material-icons">attach_file</i><input type="file" id="'.$name.'Btn" name="'.$name.'">
                </div>
            </div>
            <script>
                document.getElementById("'.$name.'Btn").onchange = function () {
                    document.getElementById("'.$name.'File").value = this.files[0].name;
                };
            </script>
        ');
    }

    static function dropdown($name, $label, $labels=array(), $maxHeight='null') {
        return new HtmlString('
        <div id="select-container" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="'.$name.'" name="'.$name.'" readonly />
            <label class="mdl-textfield__label" for="'.$name.'">'.$label.'</label>
        </div>
        <script>
            $("#'.$name.'").mdlselect({
                value: '.$labels.',
                label: '.$labels.',
                fixedHeight: '.$maxHeight.'
            });
        </script>
        ');
    }

    static function datetime($name, $label, $value="", $required=null) {
        return new HtmlString('
        <div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="'.$name.'" class="mdl-textfield__input datetime-field" type="text" id="'.$name.'" value="'.(($value != "")? $value: old($name)).'" '.$required.' readonly>
                <label class="mdl-textfield__label" for="'.$name.'">'.$label.'</label>
            </div>
        </div>
        <script>
            $("#'.$name.'").bootstrapMaterialDatePicker({ format : "DD-MM-YYYY HH:mm" });
        </script>
        ');
    }

}