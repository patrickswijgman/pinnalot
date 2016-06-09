@extends('layout')

@section('header')
    {{ Html::script('js/dropdown.js') }}
@stop

@section('content')

    {{ Form::open(array('url' => url('/settings/'.$id), 'files' => 'true')) }}

    <input type="hidden" name="id" value="{{ $id }}" >

    {{ MdlForm::uploadFile('profileimage', 'Profile image') }}

    {{ MdlForm::text('name', 'Name', 'Iris', 'text', 'readonly') }}

    {{ MdlForm::text('username', 'Username', $user->name ,  'text', 'readonly') }}

    {{ link_to('password/reset', ' Change password')}}
    <br/>

    {{ MdlForm::dropdown('country', 'Country:',
        array('The Netherlands', 'Germany', 'Great Britain', 'Wales'))
    }}

    {{ MdlForm::text('email', 'Email', $user->email ,  'text', 'readonly') }}

    {{ MdlForm::submit('save', 'Save') }}
    {{ Form::close() }}

@stop
