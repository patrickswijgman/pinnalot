@extends('layout')



@section('content')


    <div class="right">
        <input type="file" id="profile_image"  algin ="center"class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
        <input type="button" value="Opslaan" align="center" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
        <br>
    </div><br><br>

    <table>
    <tr>
        <td>Name:</td>
        <td>Iris</td>
        </tr>
        <tr class="blank_row">
            <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
        </tr>
        <tr>
        <td>Userame:</td>
            <td>{{ $user->name }}</td>
            </tr>
        <tr class="blank_row">
            <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
        </tr>
        <tr>
        <td>Password:</td>
            <td><a href="{{url('changepw')}}"> Change Password</a></td>
            </tr>
        <tr class="blank_row">
            <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
        </tr>
        <tr>
        <td>Country:</td>
            <td> <select>
                    <option value="GER"> Germany</option>
                    <option value="NLD" selected>Netherlands</option>
                    <option value="GB"> Great Britain</option>
                </select></td>

            </tr>
        <tr class="blank_row">
            <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
        </tr>
        <tr>
        <td>Timezone:</td>
            <td><select>
                    <option timeZoneId="1" gmtAdjustment="GMT-12:00" useDaylightTime="0" value="-12">(GMT-12:00) International Date Line West</option>
                    <option timeZoneId="2" gmtAdjustment="GMT-11:00" useDaylightTime="0" value="-11">(GMT-11:00) Midway Island, Samoa</option>
                    <option timeZoneId="3" gmtAdjustment="GMT-10:00" useDaylightTime="0" value="-10">(GMT-10:00) Hawaii</option>
                    <option timeZoneId="4" gmtAdjustment="GMT-09:00" useDaylightTime="1" value="-9">(GMT-09:00) Alaska</option>
                </select></td>

            </tr>
        <tr class="blank_row">
            <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
        </tr>
        <tr>

        <td>E-mail:</td>
            <td>ditiseenemailadres@hotmail.com</td>
    </tr>

    </table>
    <br><br>

    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"  style="margin-left:auto;margin-right:50%;"> Edit <i class="material-icons">done</i>
    </button>




@stop