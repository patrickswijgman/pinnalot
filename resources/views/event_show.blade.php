@extends('layout')

@section('content-right')
    <span style="color: gray; font-weight: bold">Other actions</span>
    {{ MdlForm::urlButtonAccent('event/'.$event->id.'/edit', 'Edit') }}
@stop

@section('content')

    {{ Form::model($event) }}

    {{ MdlForm::text('title', 'Title', null, 'readonly') }}

    {{ MdlForm::textArea('description', 'Description', null, 'readonly') }}

    {{ MdlForm::text('location', 'Location', null, 'readonly') }}

    {{ MdlForm::color('backgroundColor', 'Color', null, false) }}

    {{ MdlForm::text('start', 'Start date and time', $startDate, 'readonly') }}

    {{ MdlForm::text('end', 'End date and time', $endDate, 'readonly') }}

    {{ Form::close() }}

@stop