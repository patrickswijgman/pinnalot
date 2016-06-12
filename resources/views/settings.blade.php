@extends('layout')

@section('header')
    {{ Html::script('js/dropdown.js') }}
@stop

@section('content')

    {{ Form::open(array('url' => url('settings'), 'files' => 'true')) }}

    {{ MdlForm::uploadFile('profileimage', 'Profile image') }}

    {{ MdlForm::text('name', 'Name', $user->name ,  'text', 'readonly') }}

    {{ MdlForm::text('email', 'Email', $user->email ,  'text', 'readonly') }}

    {{ MdlForm::dropdown('country', 'Country:', $countries, 300) }}

    {{ MdlForm::urlButton('password/reset', 'Change password')}}

    {{ MdlForm::submit('save', 'Save') }}
    {{ Form::close() }}

@stop
