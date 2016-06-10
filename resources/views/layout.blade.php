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
                    <a class="mdl-navigation__link" href="{{ url('/') }}">
                        <i class="material-icons static-icon">account_circle</i>
                        {{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}
                    </a>
                    <a class="mdl-navigation__link" href="{{ url('/logout') }}"><i class="material-icons">power_settings_new</i></a>
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
                <a class="mdl-navigation__link" href="{{ url('/settings') }}">
                    Settings
                    <i class="material-icons" style="float:right">settings</i>
                </a>
                    <a class="mdl-navigation__link" href="{{ url('/logout') }}">
                        Logout
                        <i class="material-icons" style="float:right">power_settings_new</i>
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


