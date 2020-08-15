<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
          content="Travel - Admin Site.">
    <meta name="author" content="Travel">
    <title>Travel | Login</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{asset('img/icono.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{asset('img/icono.ico')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{asset('img/icono.ico')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href="{{asset('img/icono.ico')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href="{{asset('img/icono.ico')}}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/vendors.css')}}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

</head>

<body id="@yield('body_type')">

<nav id="menu" class="fake_menu"></nav>

<div id="preloader">
    <div data-loader="circle-side"></div>
</div>
<!-- End Preload -->

<div id="login">
    <aside>
        <figure>
            <a href="/"><img src="{{asset('img/logo_sticky.png')}}" width="155" height="36" data-retina="true" alt=""
                             class="logo_sticky"></a>
        </figure>
        @yield('content')
        <div class="copy">© 2020 Travel</div>
    </aside>
</div>
<!-- /login -->

<!-- COMMON SCRIPTS -->
<script src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
<script src="{{asset('js/common_scripts.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

@stack('js_after')

</body>
</html>
