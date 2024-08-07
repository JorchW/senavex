@extends('welcome')
@section('vista')
<div class="main-content">
    <br><br><br><br>
    <section>
        <div class="container mt-30 mb-30 pt-30 pb-0">
            <div class="container mt-20">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="mt-0 line-height-1">
                            Productos <span class="text-theme-colored3">Encontrados</span>
                        </h2>
                    </div>
                    <div class="col-md-4">
                        <div class="widget">
                            <div class="search-form">
                                <form method="get" class="search-form" action="{{ route('productos')}}">
                                    <div class="input-group">
                                        <input type="text" placeholder="Haga clic para buscar" id="descripcion_busqueda"
                                            name="descripcion_busqueda" class="form-control search-input"
                                            value="{{$descripcion_busqueda}}" />
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
                    @if (count($result_busqueda) > 0)
                        @foreach ($result_busqueda as $producto)
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <div class="services-details text-center">
                                    <h4 class="mt-0 line-height-1">
                                        {{ $producto->nombre_comercial }}
                                    </h4>
                                </div>
                                <div class="col-sm-12 col-md-12 text-center">
                                    <img src="{{ asset('storage/images/vistas/distintivot.png') }}" alt="distintivo"
                                        width="100px" class="distintivo-img">
                                </div>
                                <div class="services mb-sm-50 mt-20">
                                    <div class="carousel">
                                        <div class="item">
                                            <img class="img-fullwidth" alt="Imagen 1" src="{{ $producto->path_file_photo1 }}" />
                                        </div>
                                        <div class="item">
                                            <img class="img-fullwidth" alt="Imagen 2" src="{{ $producto->path_file_photo2 }}" />
                                        </div>
                                        <div class="item">
                                            <img class="img-fullwidth" alt="Imagen 3" src="{{ $producto->path_file_photo3 }}" />
                                        </div>
                                        <button class="arrow-prev">&#10094;</button>
                                        <button class="arrow-next">&#10095;</button>
                                    </div>
                                    <div class="services-details clearfix">
                                        <div class="p-20 p-sm-15 bg-lighter">
                                            <h4 class="mt-0 line-height-1">
                                                {{Str::limit($producto->denominacion_comercial, 20, $end = ' ...') }}
                                            </h4>
                                            <div class="clearfix"></div>
                                            <ul class="list-inline mt-15 mb-10 clearfix">
                                                <li class="pull-left flip pr-0 clearfix">
                                                    Descripcion del producto: <span
                                                        class="font-weight-700">{{Str::limit($producto->descripcion, 60, $end = '...')}}</span>
                                                </li>
                                                <li class="pull-left flip pr-0 clearfix">
                                                    Empresa: <span
                                                        class="font-weight-700">{{Str::limit($producto->razon_social, 40, $end = '...')}}</span>
                                                </li>
                                            </ul>
                                            <a class="btn btn-dark btn-theme-coloredv btn-sm text-uppercase mt-10"
                                                href="{{ route('detalle-producto',['id'=> Crypt::encryptString($producto->id_producto)]) }}">Ver
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
                        <br>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
@endsection