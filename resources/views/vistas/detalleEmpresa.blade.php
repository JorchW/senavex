@extends('welcome')
@section('vista')
    <!-- Start main-content -->
    <div class="main-content">
        <!-- Section: inner-header -->
        <section class="inner-header divider parallax layer-overlay overlay-dark-5 pt-150"
            data-bg-img="https://agronomia.upea.bo/assets/pagina/assets/images/bg/bg3.jpg"
            style="
        background-image: url('https://agronomia.upea.bo/assets/pagina/assets/images/bg/bg3.jpg');
        background-position: 50% 0px;
      ">
        </section>

        <!-- Divider: Contact -->
        <section class="divider">
            <div class="container">
                <h2 class="mt-0 line-height-1 line-bottom-edu">
                    Bienvenido a <span class="text-theme-colored3">{{ $detEmpresa->razon_social_empresa }}</span>
                </h2>

                <div class="row pt-10">
                    <div class="col-md-4">
                        <img class="img-fullwidth" src="{{ $detEmpresa->imagen_empresa }}" alt="" />
                    </div>

                    <div class="col-md-8">
                        <h3 class="mt-10 mb-30">{{ $detEmpresa->razon_social_empresa }}</h3>
                        <p class="lead">
                            {{ $detEmpresa->descripcion_empresa }}
                        </p>

                        <ul class="list angle-double-right">
                            <li><strong>Teléfono:</strong> {{ $detEmpresa->telefono }}</li>
                            <li><strong>Correo electrónico:</strong> {{ $detEmpresa->email }}</li>
                            <li><strong>Encargados:</strong> {{ $detEmpresa->nombre_1 }}  / {{ $detEmpresa->nombre_2 }}</li>
                            <li><strong>Celulares:</strong> {{ $detEmpresa->celular_1 }} / {{ $detEmpresa->celular_2 }}</li>
                            <li>
                                <strong>Dirección:</strong>  {{ $detEmpresa->direccion }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mt-30 mb-0">
                    <ul class="styled-icons icon-circled m-0 pull-right">
                        <li>
                            <a href="{{ $detEmpresa->facebook }}" target="_blank" data-bg-color="#3A5795" style="background: rgb(58, 87, 149) !important"><i
                                    class="fa fa-facebook text-white"></i></a>
                        </li>
                        <li>
                            <a href="{{ $detEmpresa->whatsapp }}" target="_blank" data-bg-color="#25D366" style="background: rgb(85, 238, 108) !important"><i
                                    class="fa fa-whatsapp text-white"></i></a>
                        </li>
                        
                    </ul>
                </div>
                <div class="col-md-12 mt-30">
                    <h4>Productos Relacionados</h4>
                    <div class="products related owl-carousel-4col" data-nav="true">
                        @foreach ($productos as $producto)
                            <div class="item">
                                <div class="product">
                                    {{-- <span class="tag-sale">Sale!</span> --}}
                                    <div class="product-thumb">
                                        <img alt="" src="{{ $producto->imagen_producto }}"
                                            class="img-responsive img-fullwidth" />
                                        <div class="overlay"></div>
                                    </div>
                                    <div class="product-details text-center">
                                        <a href="{{ URL('detalle-producto/' . Crypt::encryptString($producto->id_producto)) }}">
                                            <h5 class="product-title">
                                                {{ $producto->nombre_producto }}
                                            </h5>
                                        </a>
                                        <div class="star-rating" title="Rated 4.50 out of 5">

                                            <span data-width="{{ $producto->estrella * 20 }}%">5</span>

                                        </div>
                                        <div class="price">
                                            {{-- <del><span class="amount">$520.00</span></del> --}}
                                            <ins><span
                                                    class="amount">{{ $producto->precio_producto . ' ' . $producto->abrv_moneda }}</span></ins>
                                        </div>
                                        <div class="btn-add-to-cart-wrapper">
                                            <a class="btn btn-default btn-xs btn-add-to-cart"
                                                href="{{ URL('detalle-producto/' . Crypt::encryptString($producto->id_producto)) }}">Mas
                                                Detalle</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </section>

        <section class="divider bg-lighter">
            <div class="container">
                <div class="row pt-10">
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="icon-box left media bg-deep p-30 mb-20">
                                    <a class="media-left pull-left" href="#">
                                        <i class="pe-7s-map-2 text-theme-colored"></i></a>
                                    <div class="media-body">
                                        <h5 class="mt-0">
                                            <font style="vertical-align: inherit">
                                                <font style="vertical-align: inherit">Ubicación de nuestra oficina</font>
                                            </font>
                                        </h5>
                                        <p>
                                            <font style="vertical-align: inherit">
                                                <font style="vertical-align: inherit">O{{ $detEmpresa->direccion }}</font>
                                            </font>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="icon-box left media bg-deep p-30 mb-20">
                                    <a class="media-left pull-left" href="#">
                                        <i class="pe-7s-call text-theme-colored"></i></a>
                                    <div class="media-body">
                                        <h5 class="mt-0">
                                            <font style="vertical-align: inherit">
                                                <font style="vertical-align: inherit">Número de contacto</font>
                                            </font>
                                        </h5>
                                        <p>
                                            <font style="vertical-align: inherit">
                                                <font style="vertical-align: inherit">{{ $detEmpresa->celular_1 }}</font> /
                                                <font style="vertical-align: inherit">{{ $detEmpresa->celular_2 }}</font>
                                            </font>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="icon-box left media bg-deep p-30 mb-20">
                                    <a class="media-left pull-left" href="#">
                                        <i class="pe-7s-mail text-theme-colored"></i></a>
                                    <div class="media-body">
                                        <h5 class="mt-0">
                                            <font style="vertical-align: inherit">
                                                <font style="vertical-align: inherit">Dirección de correo electrónico</font>
                                            </font>
                                        </h5>
                                        <p>
                                            <font style="vertical-align: inherit">
                                                <font style="vertical-align: inherit"> {{ $detEmpresa->email }}
                                                </font>
                                            </font>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <!-- Google Map HTML Codes -->
                            {!!$detEmpresa->ubicacion!!}
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end main-content -->
@endsection
