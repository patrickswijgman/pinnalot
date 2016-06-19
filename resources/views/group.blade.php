@extends('layout')

@section('content-right')
    <span style="color: gray; font-weight: bold">Other actions</span>
    <br/>
    <br/>
    {{ MdlForm::urlButton('group/create', 'Create group') }}
@stop

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
