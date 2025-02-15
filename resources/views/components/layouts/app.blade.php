<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--App title-->
    <title>@yield('title', 'Home')</title>

    <!--App icon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo/cedLogo.png') }}">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!--Custom Styles-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @livewireStyles
</head>

<body>
    <!--Top Header-->
    @yield('header')

    {{ $slot }}

    <!--Footer-->
    @yield('footer')

    <script src="{{ asset('assets/js/main.js') }}" data-navigate-track></script>
    @livewireScripts
</body>

</html>
