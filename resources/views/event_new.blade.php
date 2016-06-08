@extends('layout')

@section('content')
{{ Form::open(array('action' => 'EventController@create')) }}

{!! MdlForm::text('title', 'Title') !!}
{!! MdlForm::textArea('description', 'Description') !!}

{!! MdlForm::submit('submit', 'Submit') !!}
{{ Form::close() }}
@stop