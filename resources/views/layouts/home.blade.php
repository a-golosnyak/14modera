<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Modera test</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{URL::asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/mdb.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/main.css')}}" rel="stylesheet">
</head>
<body>
    @include('inc.navigation')
    @include('inc.messages')

    <div class='container mb-5  main-container'>
        <div class='' >
            <br> 
            @yield('content')
        </div>
    </div>

    <footer class="page-footer text-center font-small mdb-color darken-2 mt-4 wow fadeIn">
        <div class="footer-copyright py-3">
            © 2018 Copyright:
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
</body>
</html>


