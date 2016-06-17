@extends('layout')

@section('content')
    <div class = "group_list">
        @foreach($groups as $group)
            <div class = "group_name">
                <a href="{{ url('group/' . $group['id'] ) }}"> {{ $group['name'] }}
                </a>
            </div>
        @endforeach


    </div>
@endsection
