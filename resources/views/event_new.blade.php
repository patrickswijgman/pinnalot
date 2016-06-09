@extends('layout')

@section('header')

    {{ Html::style('css/datetimepicker.css') }}

    {{ Html::script('js/moment.min.js') }}
    {{ Html::script("js/datetimepicker.js") }}
    {{ Html::script("js/jscolor.js") }}

@stop


@section('content')

    {{ Form::open(array('action' => 'EventController@create')) }}

    {{ MdlForm::text('title', 'Title') }}
    {{ MdlForm::showErrors($errors, 'title') }}

    {{ MdlForm::textArea('description', 'Description') }}
    {{ MdlForm::showErrors($errors, 'description') }}

    {{ MdlForm::color('backgroundColor', 'Color', '') }}

    {{ MdlForm::datetime('start', 'Start date and time', (isset($_GET['d'])? $_GET['d'].' 00:00': '')) }}
    {{ MdlForm::showErrors($errors, 'start') }}

    {{ MdlForm::datetime('end', 'End date and time', (isset($_GET['d'])? $_GET['d'].' 00:00': '')) }}
    {{ MdlForm::showErrors($errors, 'end') }}

    {{ MdlForm::submit('submit', 'Submit') }}
    {{ Form::close() }}

@stop