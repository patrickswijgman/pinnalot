@extends('layout')

@section('content')

    {{ MdlForm::text('name_user', 'Name',  $user->name) }}
    {{ MdlForm::number('price', 'Price') }}
    {{ MdlForm::textArea('description', 'Description') }}

    {{ MdlForm::submit('Save') }}


@stop
