@extends('clean')

@section('navbar')
    <div class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="navbar-title navbar-brand" style="position: absolute; left: 50%;">
                    <a href="{{ url('/') }}" ><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> Pinnalot</a>
                </div>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="{{ url('#') }}"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true" data-toggle="offcanvas"></span> </a></li>
                    <li><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> </a></li>
                    <li><a href="{{ url('/calendar') }}"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> </a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/') }}"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> </a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
@stop

@section('sidebar')
    <div class="container-fluid">
        <div class="row row-offcanvas row-offcanvas-left">

            <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
                <div class="list-group">
                    <a href="{{ url('/') }}" class="list-group-item">
                        <div class="item-text">Home
                            <span class="glyphicon glyphicon-home" aria-hidden="true" style="float: right; font-size: 20px;"></span>
                        </div>
                    </a>
                    <a href="{{ url('/') }}" class="list-group-item">
                        <div class="item-text">My calendar
                            <span class="glyphicon glyphicon-calendar" aria-hidden="true" style="float: right; font-size: 20px;"></span>
                        </div>
                    </a>
                    <br/>
                    <a href="{{ url('/') }}" class="list-group-item not-active">
                        <div class="item-text">Family groups
                            <span class="glyphicon glyphicon-user" aria-hidden="true" style="float: right; font-size: 20px;"></span>
                        </div>
                    </a>
                    <br/>
                    <a href="{{ url('/') }}" class="list-group-item not-active">
                        <div class="item-text">Friend groups
                            <span class="glyphicon glyphicon-user" aria-hidden="true" style="float: right; font-size: 20px;"></span>
                        </div>
                    </a>
                </div>
            </div><!--/span-->

            <div class=" col-xs-12 col-sm-9 content">
                <div class="col-md-10 col-md-offset-1">
                    @unless(empty($page))
                        <h2 style="color: grey">{{$page}}</h2>
                        <hr>
                    @endunless
                    @yield('content')
                </div>
            </div><!--/span-->

        </div><!--/row-->

    </div><!-- /.container -->
@stop


