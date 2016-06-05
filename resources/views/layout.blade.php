@extends('clean')

@section('navbar')
    <div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
        <div id="navbar" class="collapse navbar-collapse navbar-menubuilder">
            <div class="navbar-title" style="position: absolute; left: 50%;">
                <a href="{{ url('/') }}" ><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> Pinnalot</a>
            </div>
            <ul class="nav navbar-nav navbar-left">
                <li><a href={{ url('/') }}><span class="glyphicon glyphicon-home" aria-hidden="true"></span> </a></li>
                <li><a href={{ url('/calendar') }}><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> </a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href={{ url('/') }}><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> </a></li>
                <li><a id="togglenavbar"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> </a></li>
            </ul>
        </div>
    </div>
@stop

@section('sidebar')
    <div id="navsidebar" class="col-md-2 col-md-offset-10 sidebar " style="position: absolute; display: none; left:400px;">
        <ul class="nav nav-sidebar">
            <li><a href={{ url('/') }}><span class="glyphicon glyphicon-home" aria-hidden="true" style="float: right; font-size: 20px;"></span> Home</a></li>
            <li><a href={{ url('/calendar') }}><span class="glyphicon glyphicon-calendar" aria-hidden="true" style="float: right; font-size: 20px;"></span> My calendar</a></li>
        </ul>
        <ul class="nav nav-sidebar">
            <li><a class="not-active"><span class="glyphicon glyphicon-user" aria-hidden="true" style="float: right; font-size: 20px;"></span> Family groups</a></li>
        </ul>
        <ul class="nav nav-sidebar">
            <li><a class="not-active"><span class="glyphicon glyphicon-user" aria-hidden="true" style="float: right; font-size: 20px;"></span> Friend groups</a></li>
        </ul>
    </div>
@stop


