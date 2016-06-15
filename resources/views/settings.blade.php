@extends('layout')

@section('content')

    {{ Form::model($settings, array('route' => array('settings.update', $settings->id), 'method'=>'PUT')) }}

    {{ MdlForm::showAllErrors($errors) }}

    {{ MdlForm::dropdown('primary_color', 'Primary Color:', $colors, 300) }}

    {{ MdlForm::dropdown('accent_color', 'Accent Color:', $colors, 300) }}


    {{ MdlForm::submit('Save') }}
    {{ Form::close() }}

@stop
