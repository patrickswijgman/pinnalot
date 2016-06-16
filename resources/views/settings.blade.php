@extends('layout')

@section('content')

    {{ Form::model($settings, array('route' => array('settings.update', $settings->id), 'method'=>'PUT')) }}

    {{ MdlForm::showAllErrors($errors) }}

    {{ MdlForm::dropdown('primary_color', 'Primary Color:', $colors, true) }}

    {{ MdlForm::dropdown('accent_color', 'Accent Color:', $colors, true) }}

    {{ MdlForm::dropdown('landing_page', 'Default page:', $pages) }}

    {{ MdlForm::submit('Save') }}
    {{ Form::close() }}

@stop
