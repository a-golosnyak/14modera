<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Modera test</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{URL::asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/mdb.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/main.css')}}" rel="stylesheet">
</head>
<body>
    <div class='wrapper'>

        @include('inc.navigation')
        @include('inc.messages')

        <div class='container mb-5 main-container'>
            <br> 
            @yield('content')

        </div>

        <footer class="page-footer text-center font-small mdb-color darken-2 mt-4">
            <div class="footer-copyright py-3">
                © 2018 Copyright:
            </div>
        </footer>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="text/javascript" src="js/javascript.js"></script>
</body>
</html>


