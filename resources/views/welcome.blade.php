<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Senavex : Directorio Exportador" />
    <meta property="og:title" content="Senavex : Directorio Exportador" />
    <meta property="og:description" content="Senavex : Directorio Exportador" />
    <meta property="og:image" content="" />
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" type="image/png" href="{{ asset('storage/images/vistas/icono.png') }}" />
    <title>Senavex : Directorio Exportador</title>
    <link href="{{ asset('vista/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vista/css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vista/css/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vista/css/css-plugin-collections.css') }}" rel="stylesheet" />
    <link href="{{ asset('vista/css/menuzord-megamenu.css') }}" rel="stylesheet" />
    <link href="{{ asset('vista/css/style-main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vista/css/preloader.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vista/css/custom-bootstrap-margin-padding.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vista/css/responsive.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vista/css/colors/theme-skin-color-set1.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vista/js/revolution-slider/css/settings.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vista/js/revolution-slider/css/layers.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vista/js/revolution-slider/css/navigation.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vista/css/logotipo.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vista/css/carousel.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="{{ asset('vista/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('vista/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('vista/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vista/js/jquery-plugin-collection.js') }}"></script>
    <script src="{{ asset('vista/js/revolution-slider/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('vista/js/revolution-slider/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('vista/js/carousel.js') }}"></script>
</head>
</head>

<body class="">
    <div id="wrapper" class="header">
        <header id="header" class="header header-floating">
            <div class="header-top bg-theme-coloredv sm-text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="widget text-white">
                                <ul class="list-inline xs-text-center text-white">
                                    <li class="m-0 pl-10 pr-10"> <a
                                            href="https://api.whatsapp.com/send?phone=59169907596" class="text-white">
                                            <img src="{{ asset('storage/images/vistas/whatsapp.png') }}" alt="about"
                                                width="15" height="15"> Call Center 591 +69907596</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <ul class="list-inline sm-pull-none sm-text-center text-right text-white mb-sm-20 mt-10">
                                <li class="m-0 pl-10">
                                    @if (Route::has('login'))
                                        @auth
                                            <a href="{{ route('select') }}" target="_blank" class="text-white"><i
                                                    class="fa fa-user-o mr-5 text-white"></i>
                                                Home </a>
                                        @else
                                            <a href="{{ route('login') }}" target="_blank" class="text-white"><i
                                                    class="fa fa-user-o mr-5 text-white"></i>
                                                Login </a>
                                        @endauth
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-nav navbar-scrolltofixed navbar-sticky-animated" style="background-color: #3c3c3c;">
                <div class="header-nav-wrapper">
                    <div class="container">
                        <nav id="menuzord-right" class="menuzord blue no-bg">
                            <a class="menuzord-brand switchable-logo pull-left flip mb-15" href="{{route('inicio') }}">
                                <img class="logo-default" src="{{asset('storage/images/vistas/logoc.png')}}" alt="">
                                <img class="logo-scrolled-to-fixed" src="{{asset('storage/images/vistas/logoc.png')}}"
                                    alt="">
                            </a>
                            <ul class="menuzord-menu">
                                <li><a href="{{ route('empresas') }}">EMPRESAS</a>
                                </li>
                                <li><a href="{{ route('rubros') }}">RUBROS</a>
                                </li>
                                <li><a href="{{ route('productos') }}">PRODUCTOS</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <div>
            @yield('vista')
        </div>
    </div>
    <footer id="footer" class="footer bg-theme-coloredv">
        <div class="container pt-40 pb-10">
            <div class="row">
                <div class="col-md-6">
                    <div class="widget dark">
                        <img class="mt-10" alt="" src="{{asset('storage/images/vistas/logob.png')}}">
                        <p class="text-white">Servicio Nacional de Verificación de Exportaciones</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="widget dark ml-30 pl-5">
                        <h4 class="widget-title">Contactos</h4>
                        <div class="latest-posts">
                            <ul class="list mt-5">
                                <li class="m-0 pl-10 pr-10"> <img
                                        src="{{ asset('storage/images/vistas/whatsapp.png') }}" alt="about" width="15"
                                        height="15">
                                    <a class="text-gray" href="https://api.whatsapp.com/send?phone=59169907596">Call
                                        Center 591 +69907596</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom bg-black-222">
            <div class="container pt-10 pb-10">
                <div class="row text-center">
                    <div class="col-md-12 sm-text-center">
                        <p class="font-13 text-black-777 m-0">Derechos de autor &copy;2024. Senavex</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    </div>
    <script src="{{ asset('vista/js/custom.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('vista/js/revolution-slider/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('vista/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('vista/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('vista/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js') }}">
        </script>
    <script type="text/javascript"
        src="{{ asset('vista/js/revolution-slider/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('vista/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('vista/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('vista/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('vista/js/revolution-slider/js/extensions/revolution.extension.video.min.js') }}"></script>
</body>
</html>