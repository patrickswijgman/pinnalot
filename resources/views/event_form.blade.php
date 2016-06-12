@extends('layout')

@section('header')

    {{ Html::style('css/datetimepicker.css') }}

    {{ Html::script('js/moment.min.js') }}
    {{ Html::script("js/datetimepicker.js") }}
    {{ Html::script("js/jscolor.js") }}

@stop

@yield('form-open')

@section('content')

    {{ MdlForm::text('title', 'Title') }}
    {{ MdlForm::showErrors($errors, 'title') }}

    {{ MdlForm::textArea('description', 'Description') }}
    {{ MdlForm::showErrors($errors, 'description') }}

    {{ MdlForm::color('backgroundColor', 'Color') }}
    {{ MdlForm::showErrors($errors, 'backgroundColor') }}

    {{ MdlForm::datetime('start', 'Start date and time', $startDate) }}
    {{ MdlForm::showErrors($errors, 'start') }}

    {{ MdlForm::datetime('end', 'End date and time', $endDate) }}
    {{ MdlForm::showErrors($errors, 'end') }}

    {{ MdlForm::submit('Submit') }}
    {{ Form::close() }}

@stop