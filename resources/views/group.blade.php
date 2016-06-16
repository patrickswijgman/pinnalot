@extends('layout')

@section('content')
    <div class = group_list>
        @foreach($groups as $group)
            {{ $group }}
        @endforeach
    </div>

@endsection
