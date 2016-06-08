@extends('clean')

@section('navbar')
    <!-- Always shows a header, even in smaller screens. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header custom-header">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title">Pinnalot</span>
                <!-- Add spacer, to align navigation to the right -->
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation. We hide it in small screens. -->
                <nav class="mdl-navigation mdl-layout--large-screen-only">
                    <a class="mdl-navigation__link" href="{{ url('/logout') }}"><i class="material-icons">exit_to_app</i></a>
                </nav>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">Pinnalot</span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="{{ url('/') }}">
                    Home
                    <i class="material-icons" style="float:right">home</i>
                </a>
                <a class="mdl-navigation__link" href="{{ url('/calendar') }}">
                    Calendar
                    <i class="material-icons" style="float:right">date_range</i>
                </a>
                <a class="mdl-navigation__link" href="{{ url('/settings/1') }}">
                    Settings
                    <i class="material-icons" style="float:right">settings</i>
                </a>
            </nav>
        </div>
        <main class="mdl-layout__content">
            <div class="page-content">
                <br/>
                @unless(empty($page))
                    <h3 style="text-align: center">{{$page}}</h3>
                @endunless
                <hr>
                @yield('content')
                <br/>
                <br/>
                <div class="mdl-layout-spacer"></div>
            </div>
        </main>
    </div>
@stop


