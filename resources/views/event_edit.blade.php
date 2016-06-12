@extends('event_form')

@section('form-open')

    {{ Form::model($event, array('route' => array('event.update', $event->id), 'method'=>'PUT')) }}

@stop