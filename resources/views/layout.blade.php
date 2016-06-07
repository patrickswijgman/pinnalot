@extends('clean')

@section('layout')
    <!-- Always shows a header, even in smaller screens. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header custom-header">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title">
                    {{Html::image('img/fav.png', null, ['width'=>'25px', 'height'=>'25px'])}}
                    Pinnalot</span>
                <!-- Add spacer, to align navigation to the right -->
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation. We hide it in small screens. -->
                <nav class="mdl-navigation mdl-layout--large-screen-only">
                    <a class="mdl-navigation__link" href="{{ url('/logout') }}"><i class="material-icons">exit_to_app</i></a>
                </nav>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">
                {{Html::image('img/fav-blk.png', null, ['width'=>'25px', 'height'=>'25px'])}}
                Pinnalot</span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="{{ url('/') }}">
                    Home
                    <i class="material-icons" style="float:right">home</i>
                </a>
                <a class="mdl-navigation__link" href="{{ url('/calendar') }}">
                    Calendar
                    <i class="material-icons" style="float:right">date_range</i>
                </a>
            </nav>
        </div>
        <!-- Uncomment for sidebar on the right
        <style>
            .mdl-layout__drawer-button, .mdl-layout__drawer{
                left: initial;
                right: 0;
            }

            .mdl-layout__drawer{
                transform:translateX(250px);
            }
        </style>-->
        <main class="mdl-layout__content">
            <div class="page-content">
                @unless(empty($page))
                    <h3 style="text-align: center">{{$page}}</h3>
                    <hr>
                @endunless
                @yield('content')
                <br/>
                <br/>
                <div class="mdl-layout-spacer"></div>
            </div>
        </main>
    </div>
@stop


