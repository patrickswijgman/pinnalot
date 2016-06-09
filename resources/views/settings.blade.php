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
    <a href="{{url('changepw')}}"> Change Password</a><br><br>

    {{ MdlForm::dropdown('country', 'Country:', array('0','1','2','3'), array('The Netherlands', 'Germany', 'Great Britain', 'Wales')) }}

    {{ MdlForm::text('email', 'Email', $user->email ,  'text', 'readonly') }}

    {{ MdlForm::submit('save', 'Save') }}
    {{ Form::close() }}

@stop
