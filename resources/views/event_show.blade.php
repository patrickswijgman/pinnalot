@extends('layout')

@section('content-left')
    @if(isset($group))
        <span style="color: gray; font-weight: bold">Members going to this event</span>
        <br/>
        <br/>
        @foreach($members as $member)
            {{ $member->firstname . ' ' . $member->lastname }} <br/>
        @endforeach
    @endif
@stop

@section('content-right')
    <span style="color: gray; font-weight: bold">Other actions</span>
    <br/>
    <br/>
    {{ MdlForm::urlButton('event/'.$event->id.'/edit', 'Edit') }}
@stop

@section('content')

    {{ Form::model($event) }}

    {{ MdlForm::text('title', 'Title', null, 'readonly') }}

    {{ MdlForm::textArea('description', 'Description', null, 'readonly') }}

    {{ MdlForm::text('location', 'Location', null, 'readonly') }}

    {{ MdlForm::text('start', 'Start date and time', $startDate, 'readonly') }}

    {{ MdlForm::text('end', 'End date and time', $endDate, 'readonly') }}

    {{ Form::close() }}

@stop