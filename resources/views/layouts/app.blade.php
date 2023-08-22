<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Shoppy</title>

    <link rel="shortcut icon" href="{{ asset('main/images/logo/favicon-32x32.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('main/css/bootstrap.5.1.1.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/fonts/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/plugin/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/plugin/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/plugin/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/plugin/nice-select.v1.0.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/plugin/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/style.css') }}">
</head>

<body class="shoe">

<div class="loader"><span>Shoppy is starting...</span></div>
<a href="#0" class="scrollToTop"><i class="flaticon-up-arrow"></i></a>

<div id="app"></div>

<script src="{{ asset('main/js/jqurey.v3.6.0.min.js') }}"></script>
<script src="{{ asset('main/js/popper.v2.9.3.min.js') }}"></script>
<script src="{{ asset('main/js/bootstrap.v5.1.1.min.js') }}"></script>
<script src="{{ asset('main/js/plugin/jquery-ui.min.js') }}"></script>
<script src="{{ asset('main/js/plugin/jarallax.min.js') }}"></script>
<script src="{{ asset('main/js/plugin/isotope.js') }}"></script>
<script src="{{ asset('main/js/plugin/slick.min.js') }}"></script>
<script src="{{ asset('main/js/plugin/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('main/js/plugin/tweenMax.min.js') }}"></script>
<script src="{{ asset('main/js/plugin/nice-select.v1.0.min.js') }}"></script>
<script src="{{ asset('main/js/plugin/wow.v1.3.0.min.js') }}"></script>
<script src="{{ asset('main/js/plugin/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('main/js/main.js') }}"></script>
</body>

</html>
