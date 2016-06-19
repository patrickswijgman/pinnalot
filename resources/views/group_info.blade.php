@extends('layout')

@section('content-right')
    <span style="color: gray; font-weight: bold">Other actions</span>
    <br/>
    <br/>
    {{ MdlForm::urlButton('group/'.$id.'/event/create', 'Create new event') }}
    <br/>
    {{ MdlForm::urlButton('group/'.$group->id.'/search', 'Add person') }}
    <br/>
    {{ MdlForm::urlButton('group/'.$group->id.'/edit', 'Edit group') }}
    <br/>
    <br/>
    {{ MdlForm::urlButton('group/'.$group->id.'/leave', 'Leave group') }}
@stop

@section('content-left')
    <!-- Icon List -->
    <span style="color: gray; font-weight: bold">Members</span>
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
@stop

@section('content')

@endsection
