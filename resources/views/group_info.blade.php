@extends('layout')

@section('content-right')
    <span style="color: gray; font-weight: bold">Other actions</span>
    <br/>
    <br/>
    {{ MdlForm::urlButton('group/'.$id.'/event/create', 'Create new event') }}
    <br/>
    {{ MdlForm::urlButton('group/'.$group->id.'/edit', 'Edit group') }}
    <br/>
    <br/>
    {{ MdlForm::urlButton('group/'.$group->id.'/leave', 'Leave group') }}
@stop

@section('content')
    <div class = 'members_group'>
        @foreach($members as $member)
            <div>
            {{ $member['firstname'] }}
            </div>
        @endforeach
    </div>
@endsection
