@extends('layout')

@section('content')

    {{ Form::model($event) }}
    {{ MdlForm::text('title', 'Title', null, 'readonly') }}

    {{ MdlForm::textArea('description', 'Description', null, 'readonly') }}

    {{ MdlForm::text('location', 'Location', null, 'readonly') }}

    {{ MdlForm::color('backgroundColor', 'Color', null, true) }}

    {{ MdlForm::text('start', 'Start date and time', $startDate, 'readonly') }}

    {{ MdlForm::text('end', 'End date and time', $endDate, 'readonly') }}

    {{ Form::close() }}

@stop