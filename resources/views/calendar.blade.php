@extends('layout')

@section('header')

    {{ Html::style("css/fullcalendar.css") }}
    {{ Html::script("js/fullcalendar.js") }}

@stop

@section('content')

    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
            onclick="$('#calendar').fullCalendar('prev');">
        Prev
    </button>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
            onclick="$('#calendar').fullCalendar('today');">
        Today
    </button>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
            onclick="$('#calendar').fullCalendar('next');">
        Next
    </button>
    <br/>
    <br/>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
            onclick="$('#calendar').fullCalendar('changeView', 'month');">
        Month
    </button>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
            onclick="$('#calendar').fullCalendar('changeView', 'agendaWeek');">
        Week
    </button>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
            onclick="$('#calendar').fullCalendar('changeView', 'agendaDay');">
        Day
    </button>
    <br/>
    <br/>
    <div id='calendar' ></div>

@stop

@section('footer')

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: '',
                    center: 'title',
                    right: ''
                }
            })
        });
    </script>

@stop