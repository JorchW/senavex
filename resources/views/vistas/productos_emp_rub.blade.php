@extends('welcome')
@section('vista')
    <!-- Start main-content -->
    <div class="main-content">
        <section class="inner-header divider parallax layer-overlay overlay-dark-5 pt-150"
            data-bg-img="{{ asset('storage/images/vistas/hd.png') }}" style="background-position: 50% 0px"></section>
        <!-- Section: Blog -->
        <section>
            <div class="container mt-30 mb-30 pt-30 pb-0">
                <div class="container mt-20">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="mt-0 line-height-1">
                                Listar productos por <span class="text-theme-colored3">{{ $titulo }}</span>
                            </h2>
                            
                        </div>

                        <div class="col-md-4">
                            <div class="widget">
                                <div class="search-form">
                                    <form method="get" class="search-form" action="javaScript:void(0)">
                                        <div class="input-group">
                                            <input type="text" placeholder="Haga clic para buscar"
                                                id="buscador_convocatorias" name="buscador_convocatorias"
                                                class="form-control search-input" />
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn search-button">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row multi-row-clearfix">
                    <div id="blog-posts-wrapper" class="blog-posts">
                        @if (count($productos) > 0)
                            @foreach ($productos as $producto)
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <div class="services mb-sm-50 mt-20">
                                        <div class="thumb">
                                            <img class="img-fullwidth" alt=""
                                                src="{{ $producto->imagen_producto }}" />
                                        </div>
                                        <div class="services-details clearfix">
                                            <div class="p-20 p-sm-15 bg-lighter">
                                                <h4 class="mt-0 line-height-1">
                                                    <a href="{{ URL('detalle-producto/' . Crypt::encryptString($producto->id_producto)) }}">

                                                        {{ Str::limit($producto->nombre_producto, 25, $end = ' ...') }}

                                                    </a>
                                                </h4>
                                                <ul
                                                    class="list-inline text-theme-colored2 pull-left xs-pull-left  sm-pull-none sm-text-center">
                                                    <li>
                                                        @for ($i = 0; $i < $producto->estrella; $i++)
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        @endfor
                                                    </li>
                                                </ul>
                                                <div class="course-price bg-theme-colored2 pull-right">
                                                    <span
                                                        class="text-white">{{ $producto->precio_producto . ' ' . $producto->abrv_moneda }}
                                                    </span>
                                                </div>
                                                <div class="clearfix"></div>
                                                <ul class="list-inline mt-15 mb-10 clearfix">
                                                    <li class="pull-left flip pr-0 clearfix">
                                                        Empresa: <span
                                                            class="font-weight-700">{{ $producto->razon_social_empresa }}</span>
                                                    </li>
                                                    <li class="text-theme-colored pull-right flip pr-0">
                                                        Cantidad: <span
                                                            class="font-weight-700">{{ $producto->cantidad_disponible }}</span>
                                                    </li>
                                                </ul>
                                                <a class="btn btn-dark btn-theme-coloredv btn-sm text-uppercase mt-10"
                                                    href="{{ URL('detalle-producto/' . Crypt::encryptString($producto->id_producto)) }}">Ver
                                                    Producto</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div class="pagination"> {{ $productos->links(); }}</div>     --}}
                        @else
                            <br>
                            <br>
                            <br>
                            <br>
                            <h1> Lo siento no se  </h1>
                            <h1>  encontraron productos </h1>
                            
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        @endif
                        {{-- <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="services mb-sm-50 mt-20">
                            <div class="thumb">
                                <img class="img-fullwidth" alt="" src="p21.png" />
                            </div>
                            <div class="services-details clearfix">
                                <div class="p-20 p-sm-15 bg-lighter">
                                    <h4 class="mt-0 line-height-1">
                                        <a href="#">Biochemistry</a>
                                    </h4>

                                    <div class="course-price bg-theme-coloredvc pull-right">
                                        <span class="text-white">$200</span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <ul class="list-inline mt-15 mb-10 clearfix">
                                        <li class="pull-left flip pr-0 clearfix">
                                            Course: <span class="font-weight-700">4 Years</span>
                                        </li>
                                        <li class="text-theme-colored pull-right flip pr-0">
                                            Class Size: <span class="font-weight-700">110</span>
                                        </li>
                                    </ul>
                                    <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10"
                                        href="#">Learn Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="services mb-sm-50 mt-20">
                            <div class="thumb">
                                <img class="img-fullwidth" alt="" src="p31.png" />
                            </div>
                            <div class="services-details clearfix">
                                <div class="p-20 p-sm-15 bg-lighter">
                                    <h4 class="mt-0 line-height-1">
                                        <a href="#">Biochemistry</a>
                                    </h4>
                                    <ul class="list-inline text-theme-colored2 pull-left">
                                        <li>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </li>
                                    </ul>
                                    <div class="course-price bg-theme-colored3 pull-right">
                                        <span class="text-white">$200</span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <ul class="list-inline mt-15 mb-10 clearfix">
                                        <li class="pull-left flip pr-0 clearfix">
                                            Course: <span class="font-weight-700">4 Years</span>
                                        </li>
                                        <li class="text-theme-colored pull-right flip pr-0">
                                            Class Size: <span class="font-weight-700">110</span>
                                        </li>
                                    </ul>
                                    <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10"
                                        href="#">Learn Now</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    </div>
                </div>
                
            </div>
        </section>
    </div>
    <!-- end main-content -->
@endsection
