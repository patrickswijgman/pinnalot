@extends('layout')

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