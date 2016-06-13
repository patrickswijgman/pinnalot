@extends('layout')

@section('header')

    {{ Html::style('css/datetimepicker.css') }}

    {{ Html::script('js/moment.min.js') }}
    {{ Html::script("js/datetimepicker.js") }}
    {{ Html::script("js/jscolor.js") }}

@stop

@section('content')

    @if(isset($event))
        {{ Form::open(array('url' => 'event/' . $event->id)) }}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ MdlForm::submit('Delete') }}
        {{ Form::close() }}

        {{ Form::model($event, array('route' => array('event.update', $event->id), 'method'=>'PUT')) }}
    @else
        {{ Form::open(array('url' => 'event')) }}
    @endif
    
    {{ MdlForm::showAllErrors($errors) }}

    {{ MdlForm::text('title', 'Title') }}

    {{ MdlForm::textArea('description', 'Description') }}

    {{ MdlForm::text('location', 'Location') }}

    {{ MdlForm::color('backgroundColor', 'Color') }}

    {{ MdlForm::datetime('start', 'Start date and time', !empty($startDate)? ($startDate): '') }}

    {{ MdlForm::datetime('end', 'End date and time', !empty($endDate)? ($endDate): '') }}

    {{ MdlForm::submit('Submit') }}
    {{ Form::close() }}

@stop