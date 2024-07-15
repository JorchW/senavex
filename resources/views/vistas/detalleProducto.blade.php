@extends('welcome')
@section('vista')
<div class="main-content">
    <br><br><br><br>
    <section>
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="product">
                        <div class="col-md-5">
                            <div class="product-image" style="height: 450px auto;width: 450px auto;margin:auto;">
                                <ul class="owl-carousel-1col" data-nav="false">
                                    <li data-thumb="{{ $detProducto->path_file_photo1 }}">
                                        <a href="{{ $detProducto->path_file_photo1 }}"><img
                                                src="{{ $detProducto->path_file_photo1 }}" alt="" /></a>
                                    </li>
                                    <li data-thumb="{{ $detProducto->path_file_photo2 }}">
                                        <a href="{{ $detProducto->path_file_photo2 }}"><img
                                                src="{{ $detProducto->path_file_photo2 }}" alt="" /></a>
                                    </li>
                                    <li data-thumb="{{ $detProducto->path_file_photo3 }}">
                                        <a href="{{ $detProducto->path_file_photo3 }}"><img
                                                src="{{ $detProducto->path_file_photo3 }}" alt="" /></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="product-summary">
                                <h2 class="text-theme-colored">{{ $detProducto->denominacion_comercial }}</h2>
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th>RUBRO:</th>
                                            <td>
                                                <p>{{$detProducto->descripcion_rubro}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>COSTO:</th>
                                            <td>
                                                <p></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>DISPONIBLES:</th>
                                            <td>
                                                <p></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="horizontal-tab product-tab">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab1" data-toggle="tab">Informacion de la Empresa</a>
                                    </li>
                                    <li>
                                        <a href="#tab2" data-toggle="tab">Información Adicional</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab1">
                                        <table class="table table-striped row">
                                            <tbody>
                                                <tr>
                                                    <th colspan="2">
                                                        <h3 class="entry-title mt-20 pt-0">
                                                            <a class="text-theme-colored"
                                                                href="#">{{ $detProducto->razon_social }}</a>
                                                        </h3>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">
                                                        @if (strlen($detProducto->path_file_foto1) > 0)
                                                            <img src="{{ $detProducto->path_file_foto1 }}" alt=""
                                                                width="350" />
                                                        @else
                                                            <img class="img-fullwidth"
                                                                src="{{ asset('storage/images/vistas/senavex1.png') }}"
                                                                alt="" width="350" />
                                                        @endif
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>DESCRIPCION:</th>
                                                    <td>
                                                        <div class="short-description">
                                                            <p>
                                                                {{ Str::limit($detProducto->descripcion_empresa, 100, $end = ' ...') }}
                                                            </p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>CELULAR:</th>
                                                    <td>
                                                        <a class="text-theme-colored" target="_blank"
                                                            href="https://wa.me/+591{{ $detProducto->celular }}?text=¡Estoy+interesado!">
                                                            {{$detProducto->celular}}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>TELEFONO:</th>
                                                    <td>
                                                        <a class="text-theme-colored"
                                                            href="tel:{{ $detProducto->telefono }}">{{ $detProducto->telefono }}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>PAGINA WEB:</th>
                                                    <td>
                                                        <div>
                                                            <a class="text-theme-colored"
                                                                href="{{ $detProducto->pag_web }}"
                                                                target="_blank">{{ $detProducto->pag_web }}</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>CORREO ELECTRONICO:</th>
                                                    <td>
                                                        <div>
                                                            {{$detProducto->email}}
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tab2">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th>LUGAR:</th>
                                                    <td>
                                                        <a class="text-theme-colored"
                                                            href="https://www.google.com/maps/search/?api=1&query={{$detProducto->latitud}},{{$detProducto->longitud}}" target="blank_">
                                                            Ver ubicación en Google Maps
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection