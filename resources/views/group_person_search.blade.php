@extends('layout')
@section('content')
    <div class = 'search_person'>
        {{ Form::open(array('url' => url('/group/'.$group->id.'/search'))) }}
        {{ csrf_field() }}

        {{ MdlForm::showAllErrors($errors) }}
        {{ MdlForm::email('search_person','Email') }}
        {{ MdlForm::submit('Search') }}
        {{ Form::close() }}
    </div>
@stop