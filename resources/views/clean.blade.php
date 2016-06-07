<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
    {{Html::style('css/material.custom.css')}}
    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>

    {{Html::script('js/jquery.min.js')}}
    {{Html::script('js/moment.min.js')}}

    @yield('header')

    <title>Pinnalot {{ isset($page)? '- '.$page: ''}}</title>
</head>

<body>

@yield('navbar')

<!-- use clean content when not extending 'navbar' -->
@yield('clean-content')

@yield('footer')

</body>