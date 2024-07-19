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
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="modal-body">
                    <form method="POST" action="{{ route('update-empr',['id' => Crypt::encryptString($empresas->id_empresa)]) }}"
                        enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            @if (session('success'))
                                <div class="alert alert-success text-center">
                                    <strong>{{ session('success') }}</strong>
                                </div>
                            @endif
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
                            <div class="alert alert-success">
                                <p class="h4 text-center">*Campos Opcionales*</p>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="text-black font-w500">Telefono de la Empresa</label>
                                <input type="text" class="form-control"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);" name="telefono"
                                    id="telefono" onkeypress="return soloNumeros(event)" inputmode="numeric"
                                    value="{{ old('telefono', $directorioempresa->telefono ?? '') }}">
                                @error('telefono')
                                    <div class="alert alert-danger alert-dismissable">
                                        <strong>{{$message}}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="text-black font-w500">Celular de la Empresa</label>
                                <input type="text" class="form-control"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);" name="celular"
                                    id="celular" onkeypress="return soloNumeros(event)" inputmode="numeric"
                                    value="{{ old('celular', $directorioempresa->celular ?? '') }}">
                                @error('celular')
                                    <div class="alert alert-danger alert-dismissable">
                                        <strong>{{$message}}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="text-black font-w500 ">Página Web</label>
                                <input type="text" class="form-control focus:outline-none focus:ring-2"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);" name="paginaweb"
                                    id="paginaweb" value="{{ old('paginaweb', $directorioempresa->paginaweb ?? '') }}">
                                @error('paginaweb')
                                    <div class="alert alert-danger alert-dismissable">
                                        <strong>{{$message}}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="text-black font-w500 ">Correo Electronico</label>
                                <input type="email" class="form-control focus:outline-none focus:ring-2"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);" name="mail"
                                    id="mail" value="{{ old('mail', $directorioempresa->mail ?? '') }}">
                                @error('mail')
                                    <div class="alert alert-danger alert-dismissable">
                                        <strong>{{$message}}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="text-black font-w500 ">Facebook (Agregue el link)</label>
                                <input type="text" class="form-control"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);" name="facebook"
                                    id="facebook" value="{{ old('facebook', $directorioempresa->facebook ?? '') }}">
                                @error('facebook')
                                    <div class="alert alert-danger alert-dismissable">
                                        <strong>{{$message}}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="text-black font-w500 ">Instagram (Nombre)</label>
                                <input type="text" class="form-control"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);" name="instagram"
                                    id="instagram" value="{{ old('instagram', $directorioempresa->instagram ?? '') }}">
                                @error('instagram')
                                    <div class="alert alert-danger alert-dismissable">
                                        <strong>{{$message}}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="text-black font-w500 ">Tiktok (Nombre)</label>
                                <input type="text" class="form-control"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);" name="tiktok"
                                    id="tiktok" value="{{ old('tiktok', $directorioempresa->tiktok ?? '') }}">
                                @error('tiktok')
                                    <div class="alert alert-danger alert-dismissable">
                                        <strong>{{$message}}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 row text-center">
                                <div>
                                    <button type="submit" class="btn btn-primary">Subir Datos</button>
                                    <a href="{{ route('home', ['id' => Crypt::encryptString($empresas->id_empresa)]) }}" class="btn btn-danger">Volver Atras</a>
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection