@extends('layout')

@section('content-right')
    @if(isset($group))
        <span style="color: gray; font-weight: bold">Other actions</span>
        {{ Form::open(array('url' => 'group/' . $group->id)) }}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ MdlForm::submit('Delete') }}
        {{ Form::close() }}
    @endif
@stop

@section('content')

    @if(isset($group))
        {{ Form::model($group, array('route' => array('group.update', $group->id), 'method'=>'PUT')) }}
    @else
        {{ Form::open(array('url' => 'group')) }}
    @endif
    
    {{ MdlForm::showAllErrors($errors) }}

    {{ MdlForm::text('name', 'Name') }}

    {{ MdlForm::textArea('description', 'Description') }}

    {{ MdlForm::dropdown('type', 'Type', $types) }}

    {{ MdlForm::submit('Submit') }}
    {{ Form::close() }}

@stop