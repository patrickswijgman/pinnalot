@extends('calendar')

@section('content-right')
    <span style="color: gray; font-weight: bold">Other actions</span>
    <br/>
    <br/>
    @if($status == "owner")
        {{ MdlForm::urlButton('group/'.$group->id.'/event/create', 'Create new event') }}
        <br/>
        {{ MdlForm::urlButton('group/'.$group->id.'/search', 'Add person') }}
        <br/>
        {{ MdlForm::urlButton('group/'.$group->id.'/edit', 'Edit group') }}
        <br/>
        <br/>
    @endif
    {{ MdlForm::urlButton('group/'.$group->id.'/leave', 'Leave group') }}
@stop

@section('content-left')
    <!-- Icon List -->
    <span style="color: gray; font-weight: bold">Members</span>
    <div class = 'group-list' style = "text-align: left;">
        <ul class="mdl-list">
            @for ($i = sizeof($members); $i >= 0; $i--)
                <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        @if($members[1][$i] == "owner")
                            <i class="material-icons mdl-list__item-icon" style="color:orange">star</i>
                        @else
                            <i class="material-icons mdl-list__item-icon">person</i>
                        @endif
                        {{ $members[0][$i]->firstname . ' ' . $members[0][$i]->lastname }}
                    </span>
                </li>
            @endfor
        </ul>
    </div>
@stop
