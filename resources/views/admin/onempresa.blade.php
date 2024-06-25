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
                {{--<div class="modal-header">
                    <h5 class="modal-title">{{$empresasEdit->estado_empresa}}</h5>
                    <a href="javascript:void(0);" class="btn-close" data-bs-dismiss="modal"></a>
                </div>--}}
                <div class="modal-body">
                    <form method="POST"
                        action="{{ URL('update-empr/' . Crypt::encryptString($empresaselect->id_empresa)) }}"
                        enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{--{{$imagen->imagen_empresa}}--}}" id="imagen_empresa"
                            name="imagen_empresa" />
                        <div class="mb-3">
                            <label class="text-black font-w500">Imagen:</label>
                            <div class="input-group">
                                <div class="form-file ">
                                    <input accept="image/png,image/jpeg,image/jpg" type="file"
                                        class="form-file-input form-control focus:outline-none input-image"
                                        name="path_file_foto1" id="path_file_foto1">
                                </div>
                                <div class='form-file'>
                                    @if($imagen && strlen($imagen->path_file_foto1) > 0)
                                        <img src="{{$imagen->path_file_foto1}}" height="250" width="250" alt="Imagen">
                                    @endif
                                </div>
                            </div>
                            <p class="text-image-2"> </p>

                        </div>
                        <div class="mb-3">
                            <label class="text-black font-w500">Nombre de la
                                Empresa</label>
                            <input type="text" class="form-control form-control-lg focus:outline-none"
                                style="font-weight:bolder; background-color:rgb(225, 225, 225);" name="razon_social"
                                id="razon_social" value="{{$empresaselect->razon_social}}" readonly>
                        </div>
                        <div class="mb-3 read-content">
                            <label class="text-black font-w500">Descripción</label>
                            <div class="mb-3 pt-3">
                                <textarea class="form-control bg-transparent" maxlength="50" cols="30" rows="5"
                                    name="descripcion_empresa"
                                    id="descripcion_empresa">{{$empresaselect->descripcion_empresa}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-3">
                                <label class="text-black font-w500 ">Nit</label>
                                <input type="text" class="form-control focus:outline-none focus:ring-2 input-number"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);" name="nit" id="nit"
                                    value="{{$empresaselect->nit}}" readonly>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="text-black font-w500 ">Matricula</label>
                                <input type="text" class="form-control focus:outline-none focus:ring-2 input-number"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);" name="matricula"
                                    id="matricula" value="{{$empresaselect->matricula}}" readonly>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="text-black font-w500 ">Ruex</label>
                                <input type="text" class="form-control focus:outline-none focus:ring-2 input-number"
                                    name="ruex" style="font-weight:bolder; background-color:rgb(225, 225, 225);"
                                    id="ruex" value="{{$empresaselect->ruex}}" readonly>
                            </div>
                            {{--<div class="mb-3 col-md-3">
                                <label class="text-black font-w500 ">Teléfono</label>
                                <input type="text" class="form-control focus:outline-none focus:ring-2" name="telefono"
                                    id="telefono" value="{{$empresasEdit->telefono}}" required>
                            </div>--}}
                            <div class="mb-3 col-md-6">
                                <label class="text-black font-w500 ">Página Web</label>
                                <input type="text" class="form-control focus:outline-none focus:ring-2" name="pag_web"
                                    id="pag_web" value="{{$empresaselect->pag_web}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="text-black font-w500 ">Correo Electronico</label>
                                <input type="text" class="form-control focus:outline-none focus:ring-2" name="email"
                                    id="email" value="{{$empresaselect->email}}" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="text-black font-w500 ">Persona Encargado</label>
                                <input type="text" class="form-control" name="nombre_1" id="nombre_1"
                                    value="{{--{{$empresasEdit->nombre_1}}--}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="text-black font-w500 ">Persona Encargado</label>
                                <input type="text" class="form-control" name="nombre_2" id="nombre_2"
                                    value="{{--{{$empresasEdit->nombre_2}}--}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="text-black font-w500 ">Telefono</label>
                                <input type="text" class="form-control " name="telefono" id="telefono"
                                    value="{{$empresaselect->telefono}}">
                            </div>

                            <div class="mb-3 col-md-6">empresaselect
                                <label class="text-black font-w500 ">Celular</label>
                                <input type="text" class="form-control " name="celular" id="celular"
                                    value="{{$empresaselect->celular}}">
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="text-black font-w500 ">Dirección</label>
                                <div class="post-input">
                                    <textarea class="form-control bg-transparent" cols="30" rows="5"
                                        name="direccion_descriptiva"
                                        id="direccion_descriptiva">{{$empresaselect->direccion_descriptiva}}</textarea>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="text-black font-w500 ">Ubicación Fiscal</label>
                                <div class="post-input">
                                    <textarea class="form-control bg-transparent" cols="30" rows="5" name="ubicacion"
                                        id="direccion_fiscal">{{$empresaselect->direccion_fiscal}}</textarea>
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

                        <div class="mb-3 row">
                            <div class="col-lg-8 ms-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <button type="button" class="btn btn-primary center">Create</button>
                        </div> --}}

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection