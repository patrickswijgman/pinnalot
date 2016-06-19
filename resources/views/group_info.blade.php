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
    <!-- Icon List -->
    <div class = 'group-list' style = "border: 1px solid black; max-width: 200px; text-align: left;">
    <style>
        .demo-list-icon {
            width: 300px;
        }
    </style>
        <ul class="demo-list-icon mdl-list">
            @foreach($members as $member)
                <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                 <i class="material-icons mdl-list__item-icon">person</i>
                        {{ $member['firstname'] }}
                    </span>
                </li>
         @endforeach
        </ul>
        {{--TODO: add button  --}}
    </div>
    <div class = 'search_person'>
        {{ Form::open(array('url' => url('/group/'.$group["id"].'/search'))) }}
        {{ csrf_field() }}

        {{ MdlForm::showAllErrors($errors) }}
        {{ MdlForm::text('search_person','Search for a person...') }}
        {{ MdlForm::submit('Search') }}
        {{ Form::close() }}
    </div>
@endsection
