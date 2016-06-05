@extends('clean')

@section('header')

    {{ Html::style('css/bootstrap-custom-clean.css') }}

@stop

@section('content')

    <h1>{{ $event->title }}</h1>
    <hr/>

    <p>{{ $event->description }}</p>

    <br/>
    <p><strong>From</strong></p>
    <p>{{ $event->start }}</p>
    <p><strong>Till</strong></p>
    <p>{{ $event->end }}</p>

@stop