<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    {{Html::favicon('img/fav.png')}}

    {{Html::style('https://fonts.googleapis.com/icon?family=Material+Icons')}}
    {{Html::style('http://cdn.materialdesignicons.com/1.6.50/css/materialdesignicons.min.css')}}
    {{Html::style('http://fonts.googleapis.com/css?family=Roboto:300,400,500,700')}}
    {{Html::style('https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css')}}
    {{Html::style('css/material.custom.css')}}

    {{Html::script('https://code.getmdl.io/1.1.3/material.min.js')}}
    {{Html::script('js/jquery.min.js')}}
    {{Html::script('js/moment.min.js')}}

    @yield('header')

    <title>Pinnalot {{ isset($page)? '- '.$page: ''}}</title>
</head>

<body>

@yield('layout')

<!-- use clean content when not extending layout.blade.php -->
@yield('clean-content')

@yield('footer')

</body>