@extends('welcome')
@section('vista')
    <br><br><br><br>
    <section>
        <div class="container mt-30 mb-30 pt-30 pb-0">
            <div class="container mt-20">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="mt-0 line-height-1">
                            Lista de productos por <span class="text-theme-colored3">{{ $titulo }}</span>
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
                                        <div class="owl-carousel-1col" data-dots="true">
                                            <div class="item">
                                                <img class="img-fullwidth" alt="Imagen"
                                                    src="{{ $producto->path_file_photo1 }}" />
                                            </div>
                                            <div class="item">
                                                <img class="img-fullwidth" alt="Imagen"
                                                    src="{{ $producto->path_file_photo2 }}" />
                                            </div>
                                            <div class="item">
                                                <img class="img-fullwidth" alt="Imagen"
                                                    src="{{ $producto->path_file_photo3 }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="services-details clearfix">
                                        <div class="p-20 p-sm-15 bg-lighter">
                                            <h4 class="mt-0 line-height-1">
                                                {{ $producto->denominacion_comercial }}
                                            </h4>
                                            <div class="col-sm-12 col-md-12 text-center">
                                                <img src="{{ asset('storage/images/vistas/distintivo.png') }}" alt="distintivo">
                                            </div>
                                            <div class="clearfix"></div>
                                            <ul class="list-inline mt-15 mb-10 clearfix">
                                                <li class="pull-left flip pr-0 clearfix">
                                                    Empresa: <span class="font-weight-700">{{$producto->razon_social}}</span>
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
                    @else
                        <br>
                        <br>
                        <br>
                        <br>
                        <h1> Lo siento no se </h1>
                        <h1> encontraron productos </h1>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
@endsection