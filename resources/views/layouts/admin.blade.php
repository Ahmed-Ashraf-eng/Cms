

<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title> @yield('title') </title>

    <!-- Styles -->
    <link href="{{asset('css/page.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="icon" href="{{asset('img/favicon.png')}}">
</head>

<body>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
    <div class="container">

        <div class="navbar-left">
            <button class="navbar-toggler" type="button">&#9776;</button>
            <a class="navbar-brand" href="#">
                <img class="logo-dark" src="{{asset('/img/logo-dark.png')}}" alt="logo">
{{--                <img class="logo-light" src="{{asset('/img/logo-light.png')}}" alt="logo">--}}
               <a href="{{route('admin.dashboard')}}"> <button class="btn btn-dark">Dashbord</button></a>
            </a>
        </div>

        <section class="navbar-mobile">
            <span class="navbar-divider d-mobile-none"></span>

        </section>

        <a class="btn btn-xs btn-round btn-success" href="{{route('login')}}">login</a>

    </div>
</nav><!-- /.navbar -->




<!-- Header -->
@yield('header')


<!-- Main Content -->
@yield('content')

<!-- Footer -->


<!-- Scripts -->
<script src="{{asset('js/page.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e16536b13587ad9"></script>

</body>
</html>
