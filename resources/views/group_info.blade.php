@extends('layout')

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

    </div>

@endsection
