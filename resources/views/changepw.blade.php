@extends('layout')

@section('content')
<br>

{{  MdlForm::text('currentpw', 'Current Password', '',  'password') }} <br>
{{  MdlForm::text('newpw', 'New Password', '',  'password') }}
{{  MdlForm::text('repeatnewpw', 'Repeat New Password', '',  'password') }} <br>

<form method="get" action="{{ URL::previous() }}">
<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" align="center">Back<i class="material-icons">arrow_back</i></button>
    </form>
<br>
<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" align="center"> Save Password <i class="material-icons">done</i>
</button>
@stop