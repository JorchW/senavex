@extends('welcome')
@section('vista')
<div class="main-content">
    <br><br>
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
                                                <img src="{{ $empresa->path_file_foto1 }}" alt="" />
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
                                                {{ ucfirst(mb_strtolower(Str::limit($empresa->descripcion_empresa, 140, $end = ' ...')))  }}
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
                                                <li class="row pl-sm-15">
                                                    <div class="text-theme-colored">
                                                        <strong>TELEFONO </strong>
                                                    </div>
                                                    <i class="fa fa-phone mr-5"></i>{{$empresa->telefono ?? 'No Proporcionado!.'}}
                                                </li>
                                                <li class="row pl-sm-15">
                                                <div class="text-theme-colored">
                                                        <strong>CELULAR </strong>
                                                    </div>
                                                    <i class="fa fa-mobile mr-5"></i> {{$empresa->celular ?? 'No Proporcionado!.'}}
                                                </li>
                                                <li class="row pl-sm-15">
                                                <div class="text-theme-colored">
                                                        <strong>CORREO </strong>
                                                    </div>
                                                    <i class="fa fa-envelope mr-5"></i> {{$empresa->mail ?? 'No Proporcionado!.'}}
                                                </li>
                                                <li class="row pl-sm-15">
                                                <div class="text-theme-colored">
                                                        <strong>PAGINA WEB </strong>
                                                    </div>
                                                    <i class="fa fa-globe mr-5"></i> {{$empresa->paginaweb ?? 'No Proporcionado!.'}}
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
            </div>
        </div>
    </section>
</div>
@endsection