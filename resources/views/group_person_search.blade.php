@extends('layout')
@section('content')
    <div class = 'search_person'>
        {{ Form::open(array('url' => url('/group/'.$group["id"].'/search'))) }}
        {{ csrf_field() }}

        {{ MdlForm::showAllErrors($errors) }}
        {{ MdlForm::text('search_person','Search for a person...') }}
        {{ MdlForm::submit('Search') }}
        {{ Form::close() }}
    </div>
@stop