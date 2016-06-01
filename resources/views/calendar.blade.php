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

    {!! $calender->render() !!}

@stop