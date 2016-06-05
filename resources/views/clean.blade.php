<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Pinnalot</title>

    <!-- Bootstrap -->
    {{ Html::style("css/bootstrap.min.css") }}
    <!-- Custom -->
    {{ Html::style('css/bootstrap-custom.css') }}

    @yield('header')
</head>
<body>

<div class="main-page"> <!-- Div end in footer -->

    @yield('navbar')
    <div id="page-content" class="col-md-8 col-md-offset-2">

        @yield('content')

    </div>

</div> <!-- Div opens in header -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
{{ Html::script("js/jquery.min.js") }}
<!-- Include all compiled plugins (below), or include individual files as needed -->
{{ Html::script('js/bootstrap.min.js') }}

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>-->
{{ Html::script('js/html5shiv.min.js') }}
{{ Html::script("js/respond.min.js") }}
<!--[endif]-->

{{ Html::script("js/functions.js") }}

@yield('footer')

</body>
</html>