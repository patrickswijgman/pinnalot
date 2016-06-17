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

@section('header-button')
    <div style = "float:right; top:25px; right:20px; position:relative">
        {{ MdlForm::urlButton('group/create', 'Create new group') }}
    </div>

@endsection