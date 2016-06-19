@extends('layout')

@section('content-right')
    <span style="color: gray; font-weight: bold">Other actions</span>
    <br/>
    <br/>
    {{ MdlForm::urlButton('group/create', 'Create new group') }}
@stop

@section('content')
    <div class = "group_list">
        @foreach($groups as $group)
            <div class="group_card mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand">
                    <h2 class="mdl-card__title-text">{{ $group['name'] }}</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    {{ $group['description'] }}
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="   {{ url('group/' . $group['id'] ) }}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        View group
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection