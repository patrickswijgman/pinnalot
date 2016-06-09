@extends('layout')

@section('header')

    {{ Html::style("css/fullcalendar.css") }}
    {{ Html::script('js/moment.min.js') }}
    {{ Html::script("js/fullcalendar.js") }}
    
@stop

@section('content')

    <!-- navigation and control buttons for the calendar -->
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="float:left;"
            onclick="$('#calendar').fullCalendar('prev');">
        <i class="material-icons">keyboard_arrow_left</i>
    </button>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="float:left;"
            onclick="$('#calendar').fullCalendar('today');">
        Today
    </button>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="float:left;"
            onclick="$('#calendar').fullCalendar('next');">
        <i class="material-icons">keyboard_arrow_right</i>
    </button>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="float:right;"
            onclick="$('#calendar').fullCalendar('changeView', 'agendaDay');">
        Day
    </button>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="float:right;"
            onclick="$('#calendar').fullCalendar('changeView', 'agendaWeek');">
        Week
    </button>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="float:right;"
            onclick="$('#calendar').fullCalendar('changeView', 'month');">
        Month
    </button>
    <div id='calendar' ></div>
    <div id="source" data-events="{{$events}}" ></div>

    <!-- event popup dialog -->
    @include('event_dialog')

@stop

@section('footer')
    {{ Html::script('js/init_fullcalendar.js') }}
@stop