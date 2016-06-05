@extends('clean')

@section('navbar')
    <div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation"
         xmlns="http://www.w3.org/1999/html">
        <div class="collapse navbar-collapse navbar-menubuilder">
            <div style="position: absolute; left: 50%;">
                <div style="position: relative; left: -50%; font-size: 24px; top: 10px; color: rgb(255,255,255); ">
                    <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> Pinnalot
                </div>
            </div>
            <ul class="nav navbar-nav navbar-left">
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href={{ url('/') }}><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> </a></li>
                <li><a id="hideshownavbar"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> </a></li>
            </ul>
        </div>
    </div>

    <div id="navsidebar" class="col-md-2 col-md-offset-10 sidebar " style="position: absolute;">
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


