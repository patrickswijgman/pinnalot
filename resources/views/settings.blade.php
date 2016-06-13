@extends('layout')

@section('header')
    {{ Html::script('js/dropdown.js') }}
@stop

@section('content')

    {{ Form::model($settings, array('route' => array('event.update', $settings->id), 'method'=>'PUT')) }}

    {{ MdlForm::text('primary_color', 'Primary Color') }}

    {{ MdlForm::text('accent_color', 'Accent Color') }}


    {{ MdlForm::submit('Save') }}
    {{ Form::close() }}

@stop
