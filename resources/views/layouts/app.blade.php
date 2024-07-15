<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Senavex : Directorio Exportador" />
    <meta property="og:title" content="Senavex : Directorio Exportador" />
    <meta property="og:description" content="Senavex : Directorio Exportador" />
    <meta property="og:image" content="" />
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" type="image/png" href="{{ asset('storage/images/vistas/icono.png') }}" />   
    <title>Senavex : Directorio Exportador</title>
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
</head>
<body >
    <div id="preloader">
        <div class="loader">
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--text"></div>
        </div>
    </div>
        <main class="vh-100">
            @yield('content')
        </main>
    <script src="{{asset('admin/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('admin/js/custom.min.js')}}"></script>
    <script src="{{asset('admin/js/deznav-init.js')}}"></script>
</body>
</html>
