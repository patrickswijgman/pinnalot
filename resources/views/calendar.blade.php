@extends('layout')

@section('header')

    <link href="css/calendar-custom.css" rel="stylesheet">

@stop

@section('content')

    <h1><div class="dateTitle"></div></h1>

    <div style="text-align: center">
        <div class="btn-group">
            <button class="btn btn-primary" data-calendar-nav="prev"><< Vorige</button>
            <button class="btn" data-calendar-nav="today">Vandaag</button>
            <button class="btn btn-primary" data-calendar-nav="next">Volgende >></button>
        </div>
        <div class="btn-group">
            <button class="btn btn-info" data-calendar-view="year">Jaar</button>
            <button class="btn btn-info active" data-calendar-view="month">Maand</button>
            <button class="btn btn-info" data-calendar-view="week">Week</button>
            <button class="btn btn-info" data-calendar-view="day">Dag</button>
        </div>
    </div>
    <br/>

    <div id="calendar"></div>
    <div id="source" data-events="{{$events}}" ></div>

    <script type="text/javascript" src="js/vendor/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/vendor/underscore-min.js"></script>
    <script type="text/javascript" src="js/language/nl-NL.js"></script>
    <script type="text/javascript" src="js/calendar.js"></script>

    <script type="text/javascript">
        var source_of_events = $('#source').data("events");
    </script>

    <script type="text/javascript" src="js/app.js"></script>

@stop