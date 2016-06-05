@extends('layout')

@section('content')

    <h1><div class="dateTitle"></div></h1>

    <div style="text-align: center">
        <div class="btn-group">
            <button class="btn btn-primary" data-calendar-nav="prev" style="text-align: right;">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </button>
            <button class="btn btn-primary" data-calendar-nav="today">Today</button>
            <button class="btn btn-primary" data-calendar-nav="next" style="text-align: left;">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </button>
        </div>
        <div class="btn-group">
            <button class="btn btn-default" data-calendar-view="year">Year</button>
            <button class="btn btn-default active" data-calendar-view="month">Month</button>
            <button class="btn btn-default" data-calendar-view="week">Week</button>
            <button class="btn btn-default" data-calendar-view="day">Day</button>
        </div>
    </div>
    <br/>

    <div class="modal fade" id="events-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3>Event</h3>
                </div>
                <div class="modal-body" style="height: 400px">
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="calendar"></div>
    <div id="source" data-events="{{$events}}" ></div>

@stop

@section('footer')

    {{ Html::style("css/calendar-custom.css") }}

    {{ Html::script("js/vendor/jquery-1.12.4.min.js") }}
    {{ Html::script("js/vendor/bootstrap.min.js") }}
    {{ Html::script("js/vendor/underscore-min.js") }}
    {{ Html::script("js/calendar.js") }}

    <script type="text/javascript">
        var source_of_events = $('#source').data("events");
    </script>
    {{ Html::script("js/app.js") }}

@stop