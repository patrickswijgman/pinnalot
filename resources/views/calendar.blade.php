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

    <dialog class="mdl-dialog">
        <h4 class="mdl-dialog__title"></h4>
        <hr>
        <div class="mdl-dialog__content">
            <p class="mdl-dialog__desc"></p>
            <br/>
            <p><strong>From</strong></p>
            <p class="mdl-dialog__start"></p>
            <p><strong>Till</strong></p>
            <p class="mdl-dialog__end"></p>
        </div>
        <div class="mdl-dialog__actions">
            <button type="button" class="mdl-button close">Close</button>
        </div>
    </dialog>

@stop

@section('footer')

    <script>

        var dialog = document.querySelector('dialog');
        if (! dialog.showModal) {
            dialogPolyfill.registerDialog(dialog);
        }
        dialog.querySelector('.close').addEventListener('click', function() {
            dialog.close();
        });

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
                        $('.mdl-dialog__title').html("").append(event.title);
                        $('.mdl-dialog__desc').html("").append(event.description);
                        $('.mdl-dialog__start').html("").append(event.start);
                        $('.mdl-dialog__end').html("").append(event.end);
                        dialog.showModal();
                        return false;
                    }
                }
            });
        });
    </script>

@stop