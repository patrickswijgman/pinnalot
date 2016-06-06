<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Pinnalot {{ isset($page)? '- '.$page: ''}}</title>
    {{Html::style('css/bootstrap.min.css')}}
    {{Html::style('css/bootstrap-custom.css')}}

    @yield('header')
</head>

<body>

@yield('navbar')
@yield('sidebar')

<!-- extend this when the page does not extends 'sidebar' -->
@yield('clean-content')

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
{{ Html::script("js/jquery.min.js") }}
<!-- Include all compiled plugins (below), or include individual files as needed -->
{{ Html::script('js/bootstrap.min.js') }}

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
{{ Html::script('js/html5shiv.min.js') }}
{{ Html::script("js/respond.min.js") }}
<![endif]-->

{{ Html::script("js/sidebar.js") }}

@yield('footer')

</body>
<footer>
</footer>
</html>