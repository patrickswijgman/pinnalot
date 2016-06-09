@extends('layout')

@section('header')

    {{ Html::style('css/datetimepicker.css') }}

    {{ Html::script('js/moment.min.js') }}
    {{ Html::script("js/datetimepicker.js") }}

@stop


@section('content')

    {{ Form::open(array('action' => 'EventController@create')) }}

    {{ MdlForm::text('title', 'Title') }}
    @if ($errors->has('title'))
        <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif

    {{ MdlForm::textArea('description', 'Description') }}
    @if ($errors->has('description'))
        <span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
    @endif

    {{ MdlForm::datetime('start', 'Start date and time', (isset($_GET['d'])? $_GET['d'].' 00:00': '')) }}
    @if ($errors->has('start'))
        <span class="help-block">
            <strong>{{ $errors->first('start') }}</strong>
        </span>
    @endif

    {{ MdlForm::datetime('end', 'End date and time', (isset($_GET['d'])? $_GET['d'].' 00:00': '')) }}
    @if ($errors->has('end'))
        <span class="help-block">
            <strong>{{ $errors->first('end') }}</strong>
        </span>
    @endif

    {{ MdlForm::submit('submit', 'Submit') }}
    {{ Form::close() }}

@stop