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
                                Listado de  <span class="text-theme-colored3">Productos</span>
                            </h2>
                        </div>
                        <div class="col-md-4">
                            <div class="widget">
                                <div class="search-form">
                                    <form method="get" class="search-form" action="{{ URL('productos/')}}">
                                        <div class="input-group">
                                            <input type="text" placeholder="Haga clic para buscar"
                                                id="buscador_producto" name="buscador_producto"
                                                class="form-control search-input" value="{{$buscador_producto}}" />
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
                                    <div class="services-details clearfix">
                                        <div class="p-20 p-sm-15 bg-lighter">
                                            <h4 class="mt-0 line-height-1">
                                                <a href="{{ URL('detalle-producto/'.Crypt::encryptString($producto->id_producto)) }}">

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
                                                    Empresa: <span class="font-weight-700">{{$producto->razon_social_empresa}}</span>
                                                </li>
                                                <li class="text-theme-colored pull-right flip pr-0">
                                                    Cantidad: <span
                                                        class="font-weight-700">{{ $producto->cantidad_disponible }}</span>
                                                </li>
                                            </ul>
                                            <a class="btn btn-dark btn-theme-coloredv btn-sm text-uppercase mt-10"
                                                href="{{ URL('detalle-producto/'.Crypt::encryptString($producto->id_producto)) }}">Ver Producto</a>
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
                        <div class="pagination"> {{ $productos->links() }}</div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
