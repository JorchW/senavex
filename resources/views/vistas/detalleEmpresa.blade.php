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
                        <li><strong>Teléfono:</strong> {{ $detEmpresa->telefono ?? 'No proporcionado!.' }}</li>
                        <li><strong>Celular:</strong> {{ $detEmpresa->celular ?? 'No proporcionado!.'}}</li>
                        <li><strong>Correo:</strong> {{ $detEmpresa->mail ?? 'No proporcionado!.'}}</li>
                        <li><strong>Pagina Web:</strong>
                            @if ($detEmpresa->paginaweb)
                                <a href="{{ $detEmpresa->paginaweb }}" target="_blank"> {{$detEmpresa->paginaweb}}</a>
                            @else 
                                <span>No proporcionado!.</span>
                            @endif
                        </li>
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
            <h3 class="mt-0 line-height-1 line-bottom-edu">
                Redes <span class="text-theme-colored3"> Sociales:</span>
            </h3>
            <div class="row pt-10">

                <div class="col-md-5">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="icon-box left media bg-deep p-30 mb-20">
                                <a class="media-left pull-left">
                                    <i class="fab fa-facebook text-theme-colored"></i></a>
                                <div class="media-body">
                                    <h5 class="mt-0">
                                        <font style="vertical-align: inherit">
                                            <font style="vertical-align: inherit">FACEBOOK DE LA EMPRESA</font>
                                        </font>
                                    </h5>
                                    <p>
                                        <font style="vertical-align: inherit">
                                            <font style="vertical-align: inherit">
                                                @if ($detEmpresa->facebook)
                                                    <a href="{{ $detEmpresa->facebook }}" target="_blank">
                                                        <strong>Ir a la pagina...</strong>
                                                    </a>
                                                @else
                                                    <span>No proporcionado!.</span>
                                                @endif
                                            </font>
                                        </font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="icon-box left media bg-deep p-30 mb-20">
                                <a class="media-left pull-left">
                                    <i class="fab fa-tiktok text-theme-colored"></i></a>
                                <div class="media-body">
                                    <h5 class="mt-0">
                                        <font style="vertical-align: inherit">
                                            <font style="vertical-align: inherit">TIKTOK DE LA EMPRESA</font>
                                        </font>
                                    </h5>
                                    <p>
                                        <font style="vertical-align: inherit">
                                            @if ($detEmpresa->tiktok)
                                                <a href="https://www.tiktok.com/{{ '@' . $detEmpresa->tiktok}}"
                                                    target="_blank">
                                                    <font style="vertical-align: inherit">
                                                        <strong>{{ $detEmpresa->tiktok }}</strong>
                                                    </font>
                                                </a>
                                            @else
                                                <span>No proporcionado!.</span>
                                            @endif
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
                            <a class="media-left pull-left">
                                <i class="fab fa-instagram text-theme-colored"></i></a>
                            <div class="media-body">
                                <h5 class="mt-0">
                                    <font style="vertical-align: inherit">
                                        <font style="vertical-align: inherit">INSTRAGRAM DE LA EMPRESA</font>
                                    </font>
                                </h5>
                                <p>
                                    <font style="vertical-align: inherit">
                                        @if ($detEmpresa->instagram)
                                            <a href="https://www.instagram.com/{{ $detEmpresa->instagram }}"
                                                target="_blank">
                                                <font style="vertical-align: inherit">
                                                    <i class="fas fa-map-marker-alt"></i><strong>{{ $detEmpresa->instagram }}</strong>
                                                </font>
                                            </a>
                                        @else
                                            <span>No proporcionado!.</span>
                                        @endif
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