<?php

namespace App\Helpers;

use Form;
use Illuminate\Support\HtmlString;
use Session;

class MdlForm
{

    /**
     * @param $name
     * @param $label
     * @param string $value
     * @param null $readonly set to 'readonly' to set input to readonly
     * @return HtmlString
     */
    static function text($name, $label, $value=null, $readonly=null){
        return new HtmlString('
        <div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                '.Form::text($name, $value, array('id' => $name, 'class' => 'mdl-textfield__input', $readonly)).'
                <label class="mdl-textfield__label" for="'.$name.'">'.$label.'</label>
            </div>
        </div>
        ');
    }

    static function number($name, $label, $value=null, $readonly=null){
        return new HtmlString('
        <div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                '.Form::number($name, $value, array('id' => $name, 'class' => 'mdl-textfield__input', $readonly)).'
                <label class="mdl-textfield__label" for="'.$name.'">'.$label.'</label>
            </div>
        </div>
        ');
    }

    static function password($name, $label){
        return new HtmlString('
        <div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                '.Form::password($name, array('id' => $name, 'class' => 'mdl-textfield__input', 'type'=>'password')).'
                <label class="mdl-textfield__label" for="'.$name.'">'.$label.'</label>
            </div>
        </div>
        ');
    }

    static function email($name, $label, $value=null, $readonly=null){
        return new HtmlString('
        <div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                '.Form::email($name, $value, array('id' => $name, 'class' => 'mdl-textfield__input', $readonly)).'
                <label class="mdl-textfield__label" for="'.$name.'">'.$label.'</label>
            </div>
        </div>
        ');
    }


    /**
     * @param $name
     * @param $label
     * @param string $value
     * @return HtmlString
     */
    static function textArea($name, $label, $value=null, $readonly=null) {
        return new HtmlString('
        <div>  
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                '.Form::textarea($name, $value, array('id' => $name, 'class' => 'mdl-textfield__input', $readonly)).'
                <label class="mdl-textfield__label" for="'.$name.'">'.$label.'</label>
            </div>
        </div>');
    }
    

    /**
     * @param $name
     * @param $label
     * @return HtmlString
     */
    static function submit($label) {
        return new HtmlString('
        <br/>
        <div>
            <input name="submit" type="submit" value="'.$label.'" 
            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" >
        </div>');
    }

    /**
     * @param $name
     * @param $label
     * @return HtmlString
     */
    static function uploadFile($name, $label){
        return new HtmlString('
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--file">
                <input class="mdl-textfield__input" placeholder=" " type="text" id="'.$name.'File" readonly/>
                <div class="mdl-button mdl-button--primary mdl-button--icon mdl-button--file">
                    <i class="material-icons">attach_file</i><input type="file" id="'.$name.'Btn" name="'.$name.'">
                </div>
                <label class="mdl-textfield__label" for="'.$name.'">'.$label.'</label>
            </div>
            <script>
                document.getElementById("'.$name.'Btn").onchange = function () {
                    document.getElementById("'.$name.'File").value = this.files[0].name;
                };
            </script>
        ');
    }

    /**
     * @param $name
     * @param $label
     * @param array $items
     * @param string $maxHeight
     * @return HtmlString
     */
    static function dropdown($name, $label, $items=array(), $maxHeight='null') {
        return new HtmlString('
        <div>
            <div id="select-container-'.$name.'" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                '.Form::text($name, null, array('id' => $name, 'class' => 'mdl-textfield__input', 'readonly')).'
                <label class="mdl-textfield__label" for="'.$name.'">'.$label.'</label>
            </div>
        </div>
        <script>
            var values = '.json_encode($items[0]).';
            var labels = '.json_encode($items[1]).';
            var modelValue = document.getElementById("'.$name.'").value;
            var modelLabel = "";
            for(var i=0;i<values.length;i++){
                if (values[i] === modelValue) {
                    modelLabel = labels[i];
                    break;
                }
                if (labels[i] === modelValue) {
                    modelLabel = labels[i];
                    break;
                }
            }
            $("#'.$name.'").mdlselect({
                name: "'.$name.'",                
                value: values,
                label: labels,
                fixedHeight: '.$maxHeight.',
                startValue: modelValue,
                startLabel: modelLabel
            });
        </script>
        ');
    }

    /**
     * @param $name
     * @param $label
     * @param string $value
     * @param null $required
     * @return HtmlString
     */
    static function datetime($name, $label, $value=null) {
        return new HtmlString('
        <div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                '.Form::text($name, $value, array('id' => $name, 'class' => 'mdl-textfield__input datetime-field', 'readonly')).'
                <label class="mdl-textfield__label" for="'.$name.'">'.$label.'</label>
            </div>
        </div>
        <script>
            $("#'.$name.'").bootstrapMaterialDatePicker({ format : "DD-MM-YYYY HH:mm" });
        </script>
        ');
    }

    static function date($name, $label, $value=null) {
        return new HtmlString('
        <div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                '.Form::text($name, $value, array('id' => $name, 'class' => 'mdl-textfield__input datetime-field', 'readonly')).'
                <label class="mdl-textfield__label" for="'.$name.'">'.$label.'</label>
            </div>
        </div>
        <script>
            $("#'.$name.'").bootstrapMaterialDatePicker({ format : "DD-MM-YYYY", time: false });
        </script>
        ');
    }

    /**
     * @param $name
     * @param $label
     * @param string $value
     * @return HtmlString
     */
    static function color($name, $label, $value=null, $enabled=true){
        return new HtmlString('
        <div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                '.Form::text($name, $value, array('id' => $name, 'class' => 'mdl-textfield__input colorpicker', 'readonly')).'
                <label class="mdl-textfield__label" for="'.$name.'">'.$label.'</label>
            </div>
        </div>
        <script>
            var myColor = new jscolor('.$name.', {showOnClick: "'.$enabled.'"})
        </script>
        ');
    }

    /**
     * @param $label
     * @param $href
     * @return HtmlString
     */
    static function urlButton($href, $label){
        return new HtmlString('
        <div>
            <a href="'.url($href).'" 
                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"
                style="width: 70%;">
                '.$label.'
            </a>
        </div>
        ');
    }

    static function urlButtonAccent($href, $label){
        return new HtmlString('
        <div>
            <a href="'.url($href).'" 
                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
                style="width: 70%;">
                '.$label.'
            </a>
        </div>
        ');
    }

    /**
     * Use this to show (if there are any) errors of an input
     * @param $errors
     * @param $name
     * @return HtmlString|string
     */
    static function showErrors($errors, $name) {
        if ($errors->has($name)) {
            return new HtmlString('
                <span class="help-block">
                    <strong>'.$errors->first($name).'</strong>
                </span>
            ');
        } else {
            return '';
        }
    }

    static function showAllErrors($errors) {
        $html = '';
        foreach($errors->all() as $error) {
            $html .= '
                <div class="help-block">
                    <strong>'.$error.'</strong>
                </div>';
        }
        return new HtmlString($html);
    }

}