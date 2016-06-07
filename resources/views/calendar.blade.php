@extends('layout')

@section('header')

    {{ Html::style("css/fullcalendar.css") }}
    {{ Html::script("js/fullcalendar.js") }}

@stop

@section('content')

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
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="float:right;"
            onclick="$('#calendar').fullCalendar('changeView', 'agendaDay');">
        Day
    </button>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="float:right;"
            onclick="$('#calendar').fullCalendar('changeView', 'agendaWeek');">
        Week
    </button>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="float:right;"
            onclick="$('#calendar').fullCalendar('changeView', 'month');">
        Month
    </button>
    <div id='calendar' ></div>
    <div id="source" data-events="{{$events}}" ></div>

    <button type="button" class="mdl-button show-modal">Show Modal</button>
    <dialog class="mdl-dialog">
        <div class="mdl-dialog__content">
            <p>
                Allow this site to collect usage data to improve your experience?
            </p>
        </div>
        <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
            <button type="button" class="mdl-button">Agree</button>
            <button type="button" class="mdl-button close">Disagree</button>
        </div>
    </dialog>

@stop

@section('footer')

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                events: $('#source').data("events"),
                header: {
                    left: '',
                    center: 'title',
                    right: ''
                },
                eventClick: function(event) {
                    if (event.url) {
                        var url = '{{ url("event/:id") }}';
                        url = url.replace(':id', event.id);
                        windowpop(url, 400, $(window).height());
                        return false;
                    }
                }
            });
        });

        function windowpop(url, width, height) {
            var leftPosition, topPosition;
            //Allow for borders.
            leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
            //Allow for title and status bars.
            topPosition = (window.screen.height / 2) - ((height / 2) + 50);
            //Open the window.
            window.open(url, "Window2", "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no");
        }
    </script>

@stop