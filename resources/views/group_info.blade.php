@extends('layout')

@section('content')
    <div class = 'members_group'>
        @foreach($group as $member)
            <div>
            {{ $member['firstname'] }}
            </div>
        @endforeach
    </div>

    <a href="{{url('group/'.$id.'/event/create')}}"> Add event</a>

@endsection
