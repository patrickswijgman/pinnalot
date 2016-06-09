@extends('layout')

@section('header')

    {{ Html::style('css/datetimepicker.css') }}

    {{ Html::script('js/moment.min.js') }}
    {{ Html::script("js/datetimepicker.js") }}

@stop


@section('content')
{{ Form::open(array('action' => 'EventController@create')) }}

{{ MdlForm::text('title', 'Title') }}

{{ MdlForm::textArea('description', 'Description') }}

{{ MdlForm::datetime('start', 'Start date and time') }}

{{ MdlForm::datetime('end', 'End date and time') }}

{{ MdlForm::submit('submit', 'Submit') }}
{{ Form::close() }}
@stop