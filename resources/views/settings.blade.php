@extends('layout')

@section('content')

    {{ Form::model($settings, array('route' => array('event.update', $settings->id), 'method'=>'PUT')) }}

    {{ MdlForm::dropdown('primary_color', 'Primary Color:', $colors) }}
    {{ MdlForm::dropdown('accent', 'Accent Color:', $colors) }}


    {{ MdlForm::submit('Save') }}
    {{ Form::close() }}

@stop
