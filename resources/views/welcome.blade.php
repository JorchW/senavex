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
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('storage/images/vistas/icono.png') }}" />
    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}



    <!-- PAGE TITLE HERE -->
    <title>Senavex : Directorio Exportador</title>

    <!-- Fonts -->

    <!-- Stylesheet -->
    <link href="{{ asset('vista/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vista/css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vista/css/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vista/css/css-plugin-collections.css') }}" rel="stylesheet" />
    <!-- CSS | menuzord megamenu skins -->
    <link href="{{ asset('vista/css/menuzord-megamenu.css') }}" rel="stylesheet" />
    {{-- <link id="menuzord-menu-skins" href="{{ asset('css/menuzord-skins/menuzord-boxed.css') }}" rel="stylesheet" /> --}}
    <!-- CSS | Main style file -->
    <link href="{{ asset('vista/css/style-main.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Preloader Styles -->
    <link href="{{ asset('vista/css/preloader.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Custom Margin Padding Collection -->
    <link href="{{ asset('vista/css/custom-bootstrap-margin-padding.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Responsive media queries -->
    <link href="{{ asset('vista/css/responsive.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Theme Color -->
    <link href="{{ asset('vista/css/colors/theme-skin-color-set1.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
    <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->
    <link href="{{ asset('vista/js/revolution-slider/css/settings.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vista/js/revolution-slider/css/layers.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vista/js/revolution-slider/css/navigation.css') }}" rel="stylesheet" type="text/css" />

    <!-- external javascripts -->
    <script src="{{ asset('vista/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('vista/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('vista/js/bootstrap.min.js') }}"></script>
    <!-- JS | jquery plugin collection for this theme -->
    <script src="{{ asset('vista/js/jquery-plugin-collection.js') }}"></script>

    <!-- Revolution Slider 5.x SCRIPTS -->
    <script src="{{ asset('vista/js/revolution-slider/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('vista/js/revolution-slider/js/jquery.themepunch.revolution.min.js') }}"></script>

</head>
</head>

<body class="">
    <div id="wrapper" class="header">
        <!-- Header -->
        <header id="header" class="header header-floating">
            <div class="header-top bg-theme-coloredv sm-text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="widget text-white">
                                <ul class="list-inline xs-text-center text-white">
                                    <li class="m-0 pl-10 pr-10"> <a href="tel:+59174310408" class="text-white"><i
                                                class="fa fa-phone text-white"></i> 123-456-789</a> </li>
                                    <li class="m-0 pl-10 pr-10">
                                        <a href="mailto:senaxe@gmail.com" class="text-white"><i
                                                class="fa fa-envelope-o text-white mr-5"></i> senavex@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <ul class="list-inline sm-pull-none sm-text-center text-right text-white mb-sm-20 mt-10">
                                <li class="m-0 pl-10">
                                    @if (Route::has('login'))
                                        @auth
                                            <a href="{{ url('home') }}" target="_blank" class="text-white"><i
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
            <div class="header-nav navbar-scrolltofixed navbar-sticky-animated">
                <div class="header-nav-wrapper">
                    <div class="container">
                        <nav id="menuzord-right" class="menuzord blue no-bg">
                            <a class="menuzord-brand switchable-logo pull-left flip mb-15" href="{{URL('/') }}">
                                <img class="logo-default" src="{{asset('storage/images/vistas/logob.png')}}" alt="">
                                <img class="logo-scrolled-to-fixed" src="{{asset('storage/images/vistas/logoc.png')}}" alt="">
                            </a>
                            <ul class="menuzord-menu">
                                <li><a href="{{ URL('empresas') }}">EMPRESAS</a>
                                </li>
                                <li><a href="{{ URL('rubros') }}">RUBROS</a>
                                </li>
                                <li><a href="{{ URL('productos') }}">PRODUCTOS</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <!--**********************************
            Content body start
        ***********************************-->
        <div>
            @yield('vista')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->



    </div>
    <!-- end main-content -->
    <!-- Footer -->
    <footer id="footer" class="footer bg-theme-coloredv">
        <div class="container pt-40 pb-10">

            <div class="row">
                <div class="col-md-4">
                    <div class="widget dark">
                        <img class="mt-10" alt="" src="{{asset('storage/images/vistas/logob.png')}}">
                        <p class="text-white">Servicio Nacional de Verificacion de Exportaciones</p>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget dark ml-30 pl-5">
                        <h4 class="widget-title">Contactos</h4>
                        <div class="latest-posts">
                            <ul class="list mt-5">
                                <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored2 mr-5"></i> <a
                                        class="text-gray" href="tel:123-456-789">123-456-789</a> </li>
                                <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored2 mr-5"></i>
                                    <a class="text-gray" href="mailto::senavex@gmail.com"
                                        target="_blank">senavex@gmail.com</a>
                                </li>
                                <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-colored2 mr-5"></i> <a
                                        class="text-gray" href="https://www.senavex.gob.bo/"
                                        target="_blank">www.senavex.gob.bo</a> </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget dark">
                        <h4 class="widget-title">Horario de apertura</h4>
                        <div class="opening-hours">
                            <ul class="list-border">
                                <li class="clearfix text-white">Miércoles - Jueves : 8.00 am - 6.00 pm
                                </li>
                            </ul>
                        </div>
                        <ul class="styled-icons icon-dark icon-circled icon-sm">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
        <div class="footer-bottom bg-black-222">
            <div class="container pt-10 pb-10">
                <div class="row text-center">
                    <div class="col-md-12 sm-text-center">
                        <p class="font-13 text-black-777 m-0">Derechos de autor &copy;2022. Directorio exportador</p>
                    </div>

                </div>
            </div>
        </div>
    </footer>

    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    </div>
    <!-- end wrapper -->

    <!-- Footer Scripts -->
    <!-- JS | Custom script for all pages -->
    <script src="{{ asset('vista/js/custom.js') }}"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS
      (Load Extensions only on Local File Systems !
       The following part can be removed on Server for On Demand Loading) -->
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
