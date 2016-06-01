<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Pinnalot</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom -->
    <link href="css/bootstrap-custom.css" rel="stylesheet">

    @yield('header')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="main-page"> <!-- Div end in footer -->

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

    @yield('content')


</div> <!-- Div opens in header -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>



