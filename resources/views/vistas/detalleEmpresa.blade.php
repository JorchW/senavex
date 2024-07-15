@extends('welcome')
@section('vista')
<div class="main-content">
    <br><br><br><br>
    <section class="divider">
        <div class="container">
            <h2 class="mt-0 line-height-1 line-bottom-edu">
                Bienvenido a <span class="text-theme-colored3">{{ $detEmpresa->razon_social }}</span>
            </h2>
            <div style="height: 450px auto;width: 450px auto;margin:auto;">
                <img class="img-fullwidth" src="{{ $detEmpresa->path_file_foto1 }}" alt="" />
            </div>
            <br>
            <h3 class="mt-0 line-height-1 line-bottom-edu">
                Informacion de la<span class="text-theme-colored3"> Empresa:</span>
            </h3>
            <div class="row pt-10">
                <div class="col-md-4">
                    <img class="img-fullwidth" src="{{ $detEmpresa->path_file_foto2 }}" alt="" />
                </div>
                <div class="col-md-8">
                    <h3 class="mt-10 mb-30">{{ $detEmpresa->razon_social }}</h3>
                    <p class="lead">
                        {{ ucfirst(mb_strtolower($detEmpresa->descripcion_empresa)) }}
                    </p>
                    <ul class="list angle-double-right">
                        <li><strong>Teléfono:</strong> {{ $detEmpresa->telefono }}</li>
                        <li><strong>Correo electrónico:</strong> {{ $detEmpresa->email }}</li>
                        <li><strong>Celulares:</strong> {{ $detEmpresa->celular }}</li>
                        <li><strong>Dirección:</strong> {{ $detEmpresa->direccion_descriptiva }}</li>
                    </ul>
                </div>
            </div>
            <div class="mt-30 mb-0">
                <ul class="styled-icons icon-circled m-0 pull-right">
                </ul>
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
                                    <i class="pe-7s-map-marker text-theme-colored"></i></a>
                                <div class="media-body">
                                    <h5 class="mt-0">
                                        <font style="vertical-align: inherit">
                                            <font style="vertical-align: inherit">Ubicación de nuestra oficina</font>
                                        </font>
                                    </h5>
                                    <p>
                                        <font style="vertical-align: inherit">
                                            <font style="vertical-align: inherit">
                                                O{{ $detEmpresa->direccion_descriptiva }}</font>
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
                                            <font style="vertical-align: inherit">{{ $detEmpresa->telefono }}</font> /
                                            <font style="vertical-align: inherit">{{ $detEmpresa->celular }}</font>
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
                    <div class="media-body">
                        <div class="icon-box left media bg-deep p-30 mb-20">
                            <a class="media-left pull-left" href="#">
                                <i class="pe-7s-map-2 text-theme-colored"></i></a>
                            <div class="media-body">
                                <h5 class="mt-0">
                                    <font style="vertical-align: inherit">
                                        <font style="vertical-align: inherit">Google Map:</font>
                                    </font>
                                </h5>
                                <p>
                                    <font style="vertical-align: inherit">
                                        <font>
                                            <a class="text-theme-colored"
                                                href="https://www.google.com/maps/search/?api=1&query={{$detEmpresa->latitud}},{{$detEmpresa->longitud}}"
                                                target="_blank">
                                                Ver ubicación en Google Maps
                                            </a>
                                        </font>
                                    </font>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection