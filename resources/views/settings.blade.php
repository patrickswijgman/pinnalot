@extends('layout')



@section('content')


    <div class="right">
        <input type="file" id="profile_image"  algin ="center"class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
        <br>
    </div><br><br>

    {{  MdlForm::text('name', 'Name', 'Iris', 'text', 'readonly') }}
    {{  MdlForm::text('username', 'Username', $user->name ,  'text', 'readonly') }}
    <a href="{{url('changepw')}}"> Change Password</a><br><br>

    <div id="select-container" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="country" name="select" readonly />
        <label class="mdl-textfield__label" for="country">Country:</label>
    </div>
    <br>
    <div id="select-container" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="timezone" name="select" readonly />
        <label class="mdl-textfield__label" for="timezone">Timezone:</label>
    </div>


    {{  MdlForm::text('email', 'Email', $user->email ,  'text', 'readonly') }}




    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" align="center"> Edit <i class="material-icons">done</i>
    </button>
@stop

@section('footer')

    {{ Html::script('js/dropdown.js') }}

    <script>
        $("#country").mdlselect({
            value: ["0", "1", "2", "3"],
            label: ["The Netherlands", "Germany", "Austria", "Great Britain"],
        });

        $("#timezone").mdlselect({
            value: ["0", "1", "2", "3"],
            label: ["(GMT-12:00) International Date Line West", "Andere tijd", "Nog meer tijd", "Heel veel tijd"],
        });
    </script>

@stop