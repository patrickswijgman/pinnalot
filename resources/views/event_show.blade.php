@extends('layout')

@section('content-left')
    @if(isset($group))
        <span style="color: gray; font-weight: bold">Members going to this event</span>
        <div class = 'group-list' style = "text-align: left;">
            <ul class="mdl-list">
                @foreach($members as $member)
                    <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon">person</i>
                        {{ $member->firstname . ' ' . $member->lastname }}
                    </span>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
@stop

@section('content-right')
    <span style="color: gray; font-weight: bold">Other actions</span>
    <br/>
    <br/>
    {{ MdlForm::urlButton('event/'.$event->id.'/edit', 'Edit') }}
@stop

@section('content')

    {{ Form::model($event) }}

    {{ MdlForm::textArea('description', 'Description', null, 'readonly') }}

    {{ MdlForm::text('location', 'Location', null, 'readonly') }}

    {{ MdlForm::text('start', 'Start date and time', $startDate, 'readonly') }}

    {{ MdlForm::text('end', 'End date and time', $endDate, 'readonly') }}

    {{ Form::close() }}

@stop