@extends('welcome')
@section('vista')
    <!-- Start main-content -->
    <div class="main-content">
        <section class="inner-header divider parallax layer-overlay overlay-dark-5 pt-150"
            data-bg-img="https://agronomia.upea.bo/assets/pagina/assets/images/bg/bg3.jpg"
            style="
        background-image: url('https://agronomia.upea.bo/assets/pagina/assets/images/bg/bg3.jpg');
        background-position: 50% 0px;
      ">
        </section>

        <section>
            <div class="container">
                <div class="section-content">
                    <div class="row">
                        <div class="product">
                            <div class="col-md-5">
                                <div class="product-image">
                                    <ul class="owl-carousel-1col" data-nav="false">
                                        <li data-thumb="{{ $detProducto->imagen_producto }}">
                                            <a href="{{ $detProducto->imagen_producto }}"><img
                                                    src="{{ $detProducto->imagen_producto }}" height="450" width="450""
                                                    alt="" /></a>
                                        </li>
                                        <li data-thumb="{{ $detProducto->imagen_producto }}">
                                            <a href="{{ $detProducto->imagen_producto }}"><img
                                                    src="{{ $detProducto->imagen_producto }}" height="450" width="450""
                                                    alt="" /></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="product-summary">
                                    <h2 class="product-title">{{ $detProducto->nombre_producto }}</h2>
                                    <h3 class="entry-title mt-20 pt-0">
                                        <a class="text-theme-colored"
                                            href="#">{{ $detProducto->razon_social_empresa }}</a>
                                    </h3>
                                    <div class="short-description">
                                        <p>
                                            {{ Str::limit($detProducto->descripcion_empresa, 100, $end = ' ...') }}
                                        </p>
                                    </div>

                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <th>COSTO:</th>
                                                <td>
                                                    <p>{{ $detProducto->precio_producto }} {{ $detProducto->abrv_moneda }}
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>DISPONIBLES:</th>
                                                <td>
                                                    <p>{{ $detProducto->cantidad_disponible }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>CELULAR</th>
                                                <td>
                                                    <p>cel: <a class="text-theme-colored" target="_blank"
                                                            href="https://wa.me/+591{{ $detProducto->celular_1 }}?text=¡Estoy+interesado!">{{ $detProducto->celular_1 }}</a>
                                                        <br />tel:

                                                        <a class="text-theme-colored"
                                                            href="tel:{{ $detProducto->telefono }}">{{ $detProducto->telefono }}</a>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>PAGINA WEB:</th>
                                                <td> <a class="text-theme-colored"
                                                        href="http://{{ $detProducto->pag_web }}"
                                                        target="_blank">{{ $detProducto->pag_web }}</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="horizontal-tab product-tab">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab1" data-toggle="tab">Descripcion</a>
                                        </li>
                                        <li>
                                            <a href="#tab2" data-toggle="tab">Información Adicional</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab1">
                                            <h3>Descripcion del producto</h3>
                                            <p>
                                                {{ $detProducto->descripcion_producto }}
                                            </p>
                                           
                                        </div>
                                        <div class="tab-pane fade" id="tab2">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <th>COSTO:</th>
                                                        <td>
                                                            <p>{{ $detProducto->precio_producto }}
                                                                {{ $detProducto->abrv_moneda }}</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>DISPONIBLES:</th>
                                                        <td>
                                                            <p>{{ $detProducto->cantidad_disponible }}</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>CELULAR</th>
                                                        <td>
                                                            <p>cel: <a class="text-theme-colored" target="_blank"
                                                                    href="https://wa.me/+591{{ $detProducto->celular_1 }}?text=¡Estoy+interesado!">{{ $detProducto->celular_1 }}</a>
                                                                <br />tel:

                                                                <a class="text-theme-colored"
                                                                    href="tel:{{ $detProducto->telefono }}">{{ $detProducto->telefono }}</a>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>PAGINA WEB:</th>
                                                        <td> <a class="text-theme-colored"
                                                                href="http://{{ $detProducto->pag_web }}"
                                                                target="_blank">{{ $detProducto->pag_web }}</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-30">
                            <h4>Productos Relacionados</h4>
                            <div class="products related owl-carousel-4col" data-nav="true">
                                @foreach ($productos as $producto)
                                    <div class="item">
                                        <div class="product">
                                            {{-- <span class="tag-sale">Sale!</span> --}}
                                            <div class="product-thumb">
                                                <img alt="" src="{{$producto->imagen_producto}}"
                                                    class="img-responsive img-fullwidth" />
                                                <div class="overlay"></div>
                                            </div>
                                            <div class="product-details text-center">
                                                <a href="{{ URL('detalle-producto/'.Crypt::encryptString($producto->id_producto)) }}">
                                                    <h5 class="product-title">
                                                        {{$producto->nombre_producto}}
                                                    </h5>
                                                </a>
                                                <div class="star-rating" title="Rated 4.50 out of 5">
                                                    
                                                    <span data-width="{{$producto->estrella*20}}%">5</span>
                                                    
                                                </div>
                                                <div class="price">
                                                    {{-- <del><span class="amount">$520.00</span></del> --}}
                                                    <ins><span
                                                            class="amount">{{$producto->precio_producto.' '.$producto->abrv_moneda}}</span></ins>
                                                </div>
                                                <div class="btn-add-to-cart-wrapper">
                                                    <a class="btn btn-default btn-xs btn-add-to-cart" href="{{ URL('detalle-producto/'.Crypt::encryptString($producto->id_producto)) }}">Mas Detalle</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end main-content -->
@endsection
