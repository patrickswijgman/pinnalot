@extends('layout')

@section('header')
    {{ Html::script('js/dropdown.js') }}
@stop

@section('content')

    {{ Form::open(array('url' => url('settings'), 'files' => 'true')) }}

    {{ MdlForm::uploadFile('profileimage', 'Profile image') }}



    {{ MdlForm::submit('Save') }}
    {{ Form::close() }}

@stop
