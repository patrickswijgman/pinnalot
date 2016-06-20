@extends('layout')

@section('content-right')
    @if(isset($event))
        <span style="color: gray; font-weight: bold">Other actions</span>
        {{ Form::open(array('url' => 'event/' . $event->id)) }}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ MdlForm::submit('Delete') }}
        {{ Form::close() }}
    @endif
@stop

@section('content')

    @if(isset($event))
        {{ Form::model($event, array('route' => array('event.update', $event->id), 'method'=>'PUT')) }}
    @else
        @if(isset($group))
            {{ Form::open(array('url' => 'group/'.$group->id.'/event')) }}
        @else
            {{ Form::open(array('url' => 'event')) }}
        @endif
    @endif
    
    {{ MdlForm::showAllErrors($errors) }}

    {{ MdlForm::text('title', 'Title') }}

    {{ MdlForm::textArea('description', 'Description') }}

    {{ MdlForm::text('location', 'Location') }}

    {{ MdlForm::color('backgroundColor', 'Color', !empty($event->backgroundColor)? ($event->backgroundColor): '#425FFF') }}

    {{ MdlForm::datetime('start', 'Start date and time', !empty($startDate)? ($startDate): '') }}

    {{ MdlForm::datetime('end', 'End date and time', !empty($endDate)? ($endDate): '') }}

    {{ MdlForm::submit('Submit') }}
    {{ Form::close() }}

@stop