@extends('home')
@section('title', 'Muestra Correo')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Correo</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Leer</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="right-box-padding">
                                    <div class="read-content">
                                        <div class="media pt-3 d-sm-flex d-block justify-content-between">
                                            <div class="clearfix mb-3 d-flex">
                                                <img class="me-3 rounded" width="70" height="70" alt="image"
                                                    src="{{ asset('/storage/images/vistas/icono.png') }}">
                                                <div class="media-body me-2">
                                                    <h5 class="text-primary mb-0 mt-1">De:  {{$notificacion->correo_de}}</h5>
                                                    <p class="mb-0">{{Carbon\Carbon::parse($notificacion->updated_at)->format('M d/Y') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="media mb-2 mt-3">
                                            <div class="media-body"><span class="pull-end">
                                                {{ Carbon\Carbon::parse($notificacion->updated_at)->format('H:i') }}
                                            </span>
                                                <h5 class="my-1 text-primary">{{$notificacion->titulo}}</h5>
                                                <p class="read-content-email">
                                                    Para:   {{$notificacion->correo_para}}</p>
                                            </div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-8">
                                                <div class="read-content-body">
                                                    <p>{{$notificacion->mensaje}} </p>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                    <img src="{{$notificacion->imagen}}" height="75%" width="75%" alt="" />
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
