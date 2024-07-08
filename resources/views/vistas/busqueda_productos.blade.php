@extends('welcome')
@section('vista')
    <!-- Start main-content -->
    <div class="main-content">
    {{--<section class="inner-header divider parallax layer-overlay overlay-dark-5 pt-150"
            data-bg-img="https://agronomia.upea.bo/assets/pagina/assets/images/bg/bg3.jpg"
            style="
            background-image: url('https://agronomia.upea.bo/assets/pagina/assets/images/bg/bg3.jpg');
            background-position: 50% 0px;
          ">
    </section>--}}
    <br>
    <br>
    <br>
    <br>
        <!-- Section: Blog -->
        <section>
            <div class="container mt-30 mb-30 pt-30 pb-0">
                <div class="container mt-20">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="mt-0 line-height-1">
                                Productos <span class="text-theme-colored3">encontrados</span>
                            </h2>
                        </div>

                        <div class="col-md-4">
                            <div class="widget">
                                <div class="search-form">
                                    <form method="get" class="search-form" action="{{ URL('productos/')}}">
                                        <div class="input-group">
                                            <input type="text" placeholder="Haga clic para buscar"
                                                id="descripcion_busqueda" name="descripcion_busqueda"
                                                class="form-control search-input" value="{{$descripcion_busqueda}}" />
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
                                    <div class="services mb-sm-50 mt-20">
                                        <div class="thumb">
                                            <img class="img-fullwidth" alt="Imagen" src="{{ $producto->path_file_photo1 }}" />
                                        </div>
                                        <div class="services-details clearfix">
                                            <div class="p-20 p-sm-15 bg-lighter">
                                                <h4 class="mt-0 line-height-1">
                                                    <a href="{{ URL('detalle-producto/'.Crypt::encryptString($producto->id_producto)) }}">

                                                        {{ Str::limit($producto->denominacion_comercial, 25, $end = ' ...') }}

                                                    </a>
                                                </h4>
                                                <div class="clearfix"></div>
                                                <ul class="list-inline mt-15 mb-10 clearfix">
                                                    <li class="pull-left flip pr-0 clearfix">
                                                        Empresa: <span class="font-weight-700">{{$producto->razon_social}}</span>
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
                    </div>
                </div>
                
            </div>
        </section>
    </div>
    <!-- end main-content -->
@endsection
