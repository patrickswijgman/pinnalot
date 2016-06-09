@extends('layout')

@section('content')
<br>
    <table>
        <tr>
            <td>Current Password:</td>
            <td><input type="password" name="currentpw" value=""></td>
        </tr>
        <tr class="blank_row">
            <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td>New Password:</td>
            <td><input type="password" name="newpw" value=""</td>
        </tr>

        <tr>
            <td>Repeat New Password:</td>
            <td><input type="password" name="2newpw" value=""</td>
        </tr>
    </table><br><br>
<form method="get" action="{{url('settings/1')}}">
<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="margin-left:auto;margin-right:50%;">Back</button>
    </form>
<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"  style="margin-left:auto;margin-right:50%;"> Save Password <i class="material-icons">done</i>
</button>
@stop