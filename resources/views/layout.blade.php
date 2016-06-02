@extends('clean')

@section('navbar')
    <div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
        <div class="collapse navbar-collapse navbar-menubuilder">
            <div style="position: absolute; left: 50%;">
                <div style="position: relative; left: -50%; font-size: 24px; top: 10px; color: rgb(255,255,255); ">
                    <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> Pinnalot
                </div>
            </div>
            <ul class="nav navbar-nav navbar-left">
                <li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> </a></li>
                <li><a href="/calendar"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> </a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> </a></li>
            </ul>
        </div>
    </div>
@stop




