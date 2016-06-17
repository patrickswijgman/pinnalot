@extends('layout')




@section('content')
    <div class = "group_list">

        <!-- Square card -->
        <style>
            .group_card.mdl-card {
                width: 320px;
                height: 320px;
            }
            .group_card > .mdl-card__title {
                color: #fff;
                background:
                        url('../assets/demos/dog.png') bottom right 15% no-repeat #46B6AC;
            }
        </style>


        <table>
        @foreach($groups as $group)
            <div class="group_card mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand">
                    <h2 class="mdl-card__title-text">{{ $group['name'] }}</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    {{ $group['name'] }}
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="   {{ url('group/' . $group['id'] ) }}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        View group
                    </a>
                </div>
            </div>
        @endforeach
        </table>
    </div>


@endsection

@section('header-button')
    <div style = "float: right;">
        {{ MdlForm::urlButton('group/create', 'Create new group') }}
    </div>

@endsection