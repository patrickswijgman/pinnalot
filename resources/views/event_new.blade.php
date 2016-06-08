@extends('layout')

@section('content')
{{ Form::open(array('action' => 'EventController@create')) }}

{!! MdlForm::text('title', 'Title') !!}

{!! MdlForm::submit('submit', 'Submit') !!}

{{ Form::close() }}
@stop