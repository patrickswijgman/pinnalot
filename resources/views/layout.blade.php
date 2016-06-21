@extends('clean')

@section('layout')
    <!-- Always shows a header, even in smaller screens. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header custom-header">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title">
                    {{Html::image('img/fav.png', null, ['width'=>'25px', 'height'=>'25px'])}}
                    Pinnalot
                </span>
                <!-- Add spacer, to align navigation to the right -->
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation. We hide it in small screens. -->
                <nav class="mdl-navigation mdl-layout--large-screen-only">
                    <a class="mdl-navigation__link" href="{{ url('') }}">
                        <i class="material-icons ">account_circle</i>
                        {{ Auth::user()->firstname }}
                    </a>
                    <a class="mdl-navigation__link" href="{{ url('logout') }}"><i class="material-icons">power_settings_new</i></a>
                </nav>
            </div>
        </header>
        <div class="mdl-layout__drawer ">
            <span class="mdl-layout-title">
                <div class="user-info" style="text-align: center">
                    <i class="material-icons profile-icon">account_circle</i>
                    <div style="bottom: 30px; position: relative;">
                        {{ Auth::user()->firstname }}
                        <button id="user-menu"
                                class="mdl-button mdl-js-button mdl-button--icon">
                          <i class="material-icons">arrow_drop_down</i>
                        </button>
                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            for="user-menu">
                            <li class="mdl-menu__item">
                                @if((isset(Auth::user()->settingsUser)))
                                    <a href="{{ url('settings/' . Auth::user()->settingsUser->id . '/edit') }}" class="mdl-navigation__link">
                                        <i class="material-icons">settings</i> Settings
                                    </a>
                                @else
                                    <a href="{{ url('settings/create') }}" class="mdl-navigation__link">
                                        <i class="material-icons">settings</i> Settings
                                    </a>
                                @endif
                            </li>
                            <li class="mdl-menu__item">
                                <a href="{{ url('logout') }}" class="mdl-navigation__link">
                                    <i class="material-icons">power_settings_new</i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="{{ url('') }}">
                    Home
                    <i class="material-icons" style="float:right">home</i>
                </a>
                <a class="mdl-navigation__link" href="{{ url('calendar') }}">
                    Calendar
                    <i class="material-icons" style="float:right">date_range</i>
                </a>
                <a class="mdl-navigation__link" href="{{ url('/group') }}">
                    Groups
                    <i class="material-icons" style="float:right">group</i>
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
            <div id="wrapper" style="text-align: center">
                @unless(empty($page))
                    <h3 style="text-align: center">{{$page}}</h3>
                    <hr>
                @endunless
                <div id="page-content-left">
                    @yield('content-left')
                </div>
                <div id="page-content-centre">
                    @yield('content')
                </div>
                <div id="page-content-right">
                    @yield('content-right')
                </div>
            </div>
            <div class="mdl-layout-spacer"></div>
            <footer class=" mdl-mini-footer">
                <div class="mdl-mini-footer__left-section">
                    <div class="mdl-logo">
                        Unicor
                    </div>
                    <ul class="mdl-mini-footer__link-list">
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Privacy and Terms</a></li>
                        <li><a href="#">User Agreement</a></li>
                    </ul>
                </div>
            </footer>
        </main>
    </div>
@stop


