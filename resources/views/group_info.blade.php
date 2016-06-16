@extends('layout')

@section('content')
    <div class = 'members_group'>
        @foreach($group as $member)
            <div>
            {{ $member['firstname'] }}
            </div>
        @endforeach
    </div>

@endsection
