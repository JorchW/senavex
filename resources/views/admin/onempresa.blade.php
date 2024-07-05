@extends('home')
@section('title', 'Editar Empresas')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Empresa</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="modal-body">
                    <form method="POST" action="{{ URL('update-empr/' . Crypt::encryptString($empresas->id_empresa)) }}"
                        enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{--{{$imagen->imagen_empresa}}--}}" id="imagen_empresa"
                            name="imagen_empresa" />
                        <div class="mb-3">
                            <label class="text-black font-w500">Nombre de la Empresa</label>
                            <input type="text" class="form-control form-control-lg focus:outline-none"
                                style="font-weight:bolder; background-color:rgb(225, 225, 225);" name="razon_social"
                                id="razon_social" value="{{$empresas->nombre_comercial}}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="text-black font-w500">Imagen de la Empresa</label>
                            <div class="input-group">
                                <div class="form-file ">
                                    <input accept="image/png,image/jpeg,image/jpg" type="file"
                                        class="form-file-input form-control focus:outline-none input-image"
                                        name="path_file_foto1" id="path_file_foto1">
                                </div>
                            </div>
                            <br>
                            <div class="mb-3 row text-center">
                                <div class='form-file'>
                                    @if($imagen && strlen($imagen->path_file_foto1) > 0)
                                        <img class="img-fullwidth rounded border border-primary shadow"
                                            src="{{$imagen->path_file_foto1}}" height="100%" width="250" alt="Imagen">
                                    @else
                                        <img class="img-fullwidth rounded border border-primary shadow"
                                            src="{{ asset('storage/images/vistas/senavex1.png') }}" height="100%"
                                            width="250" alt="">
                                    @endif
                                </div>
                            </div>
                            <p class="text-image-2"> </p>
                            @error('path_file_foto1')
                                <div class="alert alert-danger alert-dismissable">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="alert alert-primary" role="alert">
                            <strong>Nota: </strong>La imagen de la Empresa debe tener una dimension de 1920(Ancho) x
                            1080(Alto) pixeles(px).
                        </div>
                        <div class="mb-3">
                            <label class="text-black font-w500">Logo de la Empresa</label>
                            <div class="input-group">
                                <div class="form-file ">
                                    <input accept="image/png,image/jpeg,image/jpg" type="file"
                                        class="form-file-input form-control focus:outline-none input-image"
                                        name="path_file_foto2" id="path_file_foto2">
                                </div>
                            </div>
                            <br>
                            <div class="mb-3 row text-center">
                                <div class='form-file'>
                                    @if($imagen && strlen($imagen->path_file_foto2) > 0)
                                        <img class="img-fullwidth rounded border border-primary shadow"
                                            src="{{$imagen->path_file_foto2}}" height="100%" width="250" alt="Imagen">
                                    @else
                                        <img class="img-fullwidth rounded border border-primary shadow"
                                            src="{{ asset('storage/images/vistas/senavex1.png') }}" height="100%"
                                            width="250" alt="">
                                    @endif
                                </div>
                            </div>
                            <p class="text-image-2"> </p>
                            @error('path_file_foto2')
                                <div class="alert alert-danger alert-dismissable">
                                    <strong>{{$message}}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="alert alert-primary" role="alert">
                            <strong>Nota: </strong>El logo de la Empresa debe tener una dimension de 1080(Ancho) x
                            1080(Alto) pixeles(px).
                        </div>

                        <div class="mb-3 row text-center">
                            <div class="">
                                <button type="submit" class="btn btn-primary">Subir</button>
                            </div>
                        </div>
                        <div class="mb-3 read-content">
                            <label class="text-black font-w500">Descripción</label>
                            <div class="mb-3 pt-3">
                                <textarea class="form-control form-control-lg focus:outline-none"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);" maxlength="50"
                                    cols="30" rows="5" name="descripcion_empresa" id="descripcion_empresa"
                                    readonly>{{ucfirst(mb_strtolower($empresas->descripcion_empresa))}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-3">
                                <label class="text-black font-w500 ">Nit</label>
                                <input type="text" class="form-control focus:outline-none focus:ring-2 input-number"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);" name="nit" id="nit"
                                    value="{{$empresas->nit}}" readonly>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="text-black font-w500 ">Matricula</label>
                                <input type="text" class="form-control focus:outline-none focus:ring-2 input-number"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);" name="matricula"
                                    id="matricula" value="{{$empresas->matricula}}" readonly>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="text-black font-w500 ">Ruex</label>
                                <input type="text" class="form-control focus:outline-none focus:ring-2 input-number"
                                    name="ruex" style="font-weight:bolder; background-color:rgb(225, 225, 225);"
                                    id="ruex" value="{{$empresas->ruex}}" readonly>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="text-black font-w500 ">Página Web</label>
                                <input type="text" class="form-control focus:outline-none focus:ring-2" name="pag_web"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);" id="pag_web"
                                    value="{{$empresas->pag_web}}" readonly>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="text-black font-w500 ">Correo Electronico</label>
                                <input type="text" class="form-control focus:outline-none focus:ring-2" name="email"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);" id="email"
                                    value="{{$empresas->email}}" readonly>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="text-black font-w500 ">Persona Encargada</label>
                                <input type="text" class="form-control" name="nombre_1"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);" id="nombre_1"
                                    value="{{--{{$empresasEdit->nombre_1}}--}}" readonly>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="text-black font-w500 ">Persona Encargada</label>
                                <input type="text" class="form-control" name="nombre_2"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);" id="nombre_2"
                                    value="{{--{{$empresasEdit->nombre_2}}--}}" readonly>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="text-black font-w500 ">Telefono</label>
                                <input type="text" class="form-control " name="telefono"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);" id="telefono"
                                    value="{{$empresas->telefono}}" readonly>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="text-black font-w500 ">Celular</label>
                                <input type="text" class="form-control " name="celular"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);" id="celular"
                                    value="{{$empresas->celular}}" readonly>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="text-black font-w500 ">Dirección</label>
                                <div class="post-input">
                                    <textarea class="form-control form-control-lg focus:outline-none"
                                        style="font-weight:bolder; background-color:rgb(225, 225, 225);" cols="30"
                                        rows="5" name="direccion_descriptiva" id="direccion_descriptiva"
                                        readonly>{{$empresas->direccion_descriptiva}}</textarea>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="text-black font-w500 ">Ubicación Fiscal</label>
                                <div class="post-input">
                                    <textarea class="form-control form-control-lg focus:outline-none"
                                        style="font-weight:bolder; background-color:rgb(225, 225, 225);" cols="30"
                                        rows="5" name="ubicacion" id="direccion_fiscal"
                                        readonly>{{$empresas->direccion_fiscal}}</textarea>
                                </div>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="text-black font-w500 ">Facebook</label>
                                <input type="text" class="form-control " name="facebook" id="facebook"
                                    value="{{--{{$empresasEdit->facebook--}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="text-black font-w500 ">WhatsApp</label>
                                <input type="text" class="form-control " name="whatsapp" id="whatsapp"
                                    value="{{--{{$empresasEdit->whatsapp}}--}}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="text-black font-w500 ">Tiktok</label>
                                <input type="text" class="form-control " name="tiktok" id="tiktok"
                                    value="{{--{{$empresasEdit->tiktok}}--}}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection