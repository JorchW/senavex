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
    <!-- Section: Event List -->
    <section>
        <div class="container">
            <div class="container mt-20">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="mt-0 line-height-1">
                            Listado de <span class="text-theme-colored3">Empresas.</span>
                        </h2>
                    </div>

                    <div class="col-md-4">
                        <div class="widget">
                            <div class="search-form">
                                <form method="get" class="search-form" action="{{ URL('empresas/')}}">
                                    <div class="input-group">
                                        <input type="text" placeholder="Haga clic para buscar" id="buscador_empresa"
                                            name="buscador_empresa" value="{{$buscador_empresa}}"
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
            <div class="row">
                <div class="col-md-9 blog-pull-right">
                    @if (count($empresas) > 0)
                        @foreach ($empresas as $empresa)
                            <div class="upcoming-events bg-white-f3 mb-20">
                                <div class="row">
                                    <div class="col-sm-4 pr-0 pr-sm-15">
                                        <div class="event-details p-15 mt-20">
                                            @if (strlen($empresa->path_file_foto1) > 0)
                                            <img  src="{{ $empresa->path_file_foto1 }}" alt="" />
                                            @else
                                            <img class="img-fullwidth" src="{{ asset('storage/images/vistas/senavex1.png') }}"
                                                alt="" />
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4 pl-0 pl-sm-15">
                                        <div class="event-details p-15 mt-20">
                                            <h4 class="media-heading text-uppercase font-weight-500">

                                                <strong>{{ $empresa->razon_social}}</strong>
                                            </h4>
                                            <p>
                                                {{ ucfirst(mb_strtolower(Str::limit($empresa->descripcion_empresa, 100, $end = ' ...')))  }}
                                            </p>
                                            <a href="{{ URL('detalle-empresas/' . Crypt::encryptString($empresa->id_empresa)) }}"
                                                class="btn btn-flat btn-dark btn-theme-colored btn-sm">Ver Más
                                                <i class="fa fa-angle-double-right"></i></a>
                                            <a href="{{ URL('list-prod-empresas/' . Crypt::encryptString($empresa->id_empresa)) }}"
                                                class="btn btn-flat btn-dark btn-theme-colored btn-sm">Productos
                                                <i class="fa fa-angle-double-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="event-count p-15 mt-15">
                                            <ul>
                                                <li class="mb-10 text-theme-colored">
                                                    <i class="fa fa-clock-o mr-5"></i> {{$empresa->telefono}} - {{$empresa->email}}
                                                </li>
                                                <li class="text-theme-colored">
                                                    <i class="fa fa-map-marker mr-5"></i> {{$empresa->pag_web}}
                                                </li>
                                            </ul>

                                            <ul class="styled-icons icon-sm icon-bordered icon-rounded clearfix mt-20 mb-10">
                                                <li>
                                                    {{--<a href="{{ $empresa->facebook }}"><i
                                                            class="fa fa-facebook"></i></a>--}}
                                                </li>
                                                <li>
                                                    {{--<a href="{{ $empresa->whatsapp }}"><i
                                                            class="fa fa-whatsapp"></i></a>--}}
                                                </li>

                                            </ul>
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
                        <h1> encontraron empresas </h1>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    @endif
                    <div class="pagination"> {{ $empresas->links() }}</div>
                </div>

                {{--<div class="col-md-3">
                    <div class="sidebar sidebar-left mt-sm-30">
                        <div class="widget p-30">
                            <div class="owl-carousel-1col" data-dots="true">
                                <div class="item"><img src="{{ asset('storage/images/vistas/senavex.png') }}" alt="" />
                                </div>
                                <div class="item"><img src="{{ asset('storage/images/vistas/nuestro.png') }}" alt="" />
                                </div>
                                <div class="item"><img src="{{ asset('storage/images/vistas/ministerio.png') }}"
                                        alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <h5 class="widget-title line-bottom">
                                <font style="vertical-align: inherit">
                                    <font style="vertical-align: inherit">Informacion
                                    </font>
                                </font>
                            </h5>
                            <div class="product-list">
                                <div class="categories">
                                    <ul class="list-border">
                                        <li>
                                            <a href="{{ URL('productos') }}">Productos<span></span></a>
                                        </li>
                                        <li>
                                            <a href="{{ URL('rubros') }}">Rubros<span></span></a>
                                        </li>
                                        <li>
                                            <a href="{{ URL('empresas') }}">Empresas<span></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>                       
                    </div>
                </div>--}}
            </div>
        </div>
    </section>
</div>
<!-- end main-content -->
@endsection