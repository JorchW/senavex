@extends('home')
@section('title', 'Editar Producto')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Productos</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            @if (session('status'))
                <h6 class="alert alert-succes">{{ session('status') }}</h6>
            @endif
            <div class="card">
                <div class="modal-body">
                    <form method="POST" action="{{ URL('update-prod/' . Crypt::encryptString($empresas->id_ddjj)) }}"
                        enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            @if (session('success'))
                                <div class="alert alert-success text-center">
                                    <strong>{{ session('success') }}</strong>
                                    <br>
                                    <strong>Envie el producto a Revision</strong> ¡Para su Aprobacion y Publicacion!.
                                </div>
                                <div class="alert alert-danger text-center">
                                    Vuelva a la Lista <strong>Por Publicar</strong>
                                </div>
                            @endif
                            <div class="mb-3">
                                <label class="text-black font-w500">Denominacion del Producto:</label>
                                <input type="text" class="form-control form-control-lg focus:outline-none"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);"
                                    placeholder="Introduzca el producto..." name="nombre_producto" id="nombre_producto"
                                    value="{{ $empresas->denominacion_comercial }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="text-black font-w500">Foto 1 del Producto</label>
                                <div class="input-group">
                                    <div class="form-file ">
                                        <input accept="image/png,image/jpeg,image/jpg" type="file"
                                            class="form-file-input form-control focus:outline-none input-image"
                                            name="path_file_photo1" id="path_file_photo1">
                                    </div>
                                </div>
                                <br>
                                <div class="mb-3 row text-center">
                                    <div class='form-file'>
                                        @if($imagen && strlen($imagen->path_file_photo1) > 0)
                                            <img class="img-fullwidth rounded border border-primary shadow"
                                                src="{{$imagen->path_file_photo1}}" height="250" width="250" alt="Imagen">
                                        @endif
                                    </div>
                                </div>
                                <p class="text-image-2"> </p>

                                @error('path_file_photo1')
                                    <div class="alert alert-danger alert-dismissable">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="text-black font-w500">Foto 2 del Producto</label>
                                <div class="input-group">
                                    <div class="form-file ">
                                        <input accept="image/png,image/jpeg,image/jpg" type="file"
                                            class="form-file-input form-control focus:outline-none input-image"
                                            name="path_file_photo2" id="path_file_photo2">
                                    </div>
                                </div>
                                <br>
                                <div class="mb-3 row text-center">
                                    <div class='form-file'>
                                        @if($imagen && strlen($imagen->path_file_photo2) > 0)
                                            <img class="img-fullwidth rounded border border-primary shadow"
                                                src="{{$imagen->path_file_photo2}}" height="250" width="250" alt="Imagen">
                                        @endif
                                    </div>
                                </div>
                                <p class="text-image-2"> </p>
                                @error('path_file_photo2')
                                    <div class="alert alert-danger alert-dismissable">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="text-black font-w500">Foto 3 del Producto</label>
                                <div class="input-group">
                                    <div class="form-file ">
                                        <input accept="image/png,image/jpeg,image/jpg" type="file"
                                            class="form-file-input form-control focus:outline-none input-image"
                                            name="path_file_photo3" id="path_file_photo3">
                                    </div>
                                </div>
                                <br>
                                <div class="mb-3 row text-center">
                                    <div class='form-file'>
                                        @if($imagen && strlen($imagen->path_file_photo3) > 0)
                                            <img class="img-fullwidth rounded border border-primary shadow"
                                                src="{{$imagen->path_file_photo3}}" height="250" width="250" alt="Imagen">
                                        @endif
                                    </div>
                                </div>
                                @error('path_file_photo3')
                                    <div class="alert alert-danger alert-dismissable">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </div>
                                @enderror
                                <p class="text-image-2"> </p>
                            </div>
                            <div class="alert alert-primary" role="alert">
                                <strong>Nota: </strong>Todas las fotos deben tener una dimension de 1920(Ancho) x
                                1920(Alto) pixeles(px).
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label class="text-black font-w500">Seleccionar Rubro</label>
                                    <select class="form-control focus:outline-none" name="id_rubro" id="id_rubro">
                                        @if ($rubrosel->isEmpty())
                                            <option>Seleccione un Rubro</option>
                                        @else
                                            @foreach ($rubrosel as $r)
                                                <option value="{{ $r->id_rubro }}" {{ old('id_rubro', $r->id_rubro) == $r->id_rubro ? 'selected' : '' }}>
                                                    {{ mb_strtolower($r->descripcion_rubro) }}
                                                </option>
                                            @endforeach
                                        @endif
                                        <option disabled>Selección de Rubros:</option>
                                        @foreach ($rubros as $rubro)
                                            <option value="{{ $rubro->id_rubro }}" {{ old('id_rubro') == $rubro->id_rubro ? 'selected' : '' }}>
                                                {{ mb_strtolower(Str::limit($rubro->descripcion_rubro, 100, $end = ' ...')) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_rubro')
                                        <div class="alert alert-danger alert-dismissable">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="text-black font-w500">Nombre Comercial del Producto</label>
                                <input type="text" class="form-control form-control-lg focus:outline-none"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);"
                                    name="nombre_comercial" id="nombre_comercial"
                                    value="{{ old('nombre_comercial', $directorioproducto->nombre_comercial ?? '') }}">
                                @error('nombre_comercial')
                                    <div class="alert alert-danger alert-dismissable">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3  read-content">
                                <label class="text-black font-w500">Descripcion del Producto</label>
                                <div class="mb-3 pt-3">
                                    <textarea class="form-control form-control-lg focus:outline-none"
                                        style="font-weight:bolder; background-color:rgb(225, 225, 225);" maxlength="100"
                                        rows="4" name="descripcion"
                                        id="descripcion">{{ old('descripcion', $directorioproducto->descripcion ?? '') }}</textarea>
                                    @error('descripcion')
                                        <div class="alert alert-danger alert-dismissable">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="id_empresa" value="{{ $empresas->id_empresa }}">
                            <div class="mb-3 row text-center">
                                <div class="">
                                    <button type="submit" class="btn btn-primary">Subir Datos</button>
                                </div>
                            </div>
                            <br>
                            <div class="mb-3 col-md-5">
                                <label class="text-black font-w500">Numero DDJJ:</label>
                                <input type="text" class="form-control form-control-lg focus:outline-none"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);"
                                    placeholder="Introduzca el producto..." name="nombre_producto" id="nombre_producto"
                                    value="{{ $empresas->numero_ddjj }}" readonly>
                            </div>
                            <div class="mb-3 col-md-5">
                                <label class="text-black font-w500">Acuerdo</label>
                                <input type="text" class="form-control form-control-lg focus:outline-none"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);"
                                    name="numero_producto" id="numero_producto" value="{{ $empresas->acuerdo }}"
                                    readonly>
                            </div>
                            <div class="mb-3 col-md-5">
                                <label class="text-black font-w500 ">Codigo Nandina</label>
                                <input type="number" maxlength="10"
                                    class="form-control form-control-lg focus:outline-none"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);"
                                    name="codigo_nandina" id="codigo_nandina" value="{{ $empresas->codigo_nandina }}"
                                    readonly>
                            </div>
                            <div class="mb-3 col-md-5">
                                <label class="text-black font-w500">Sigla</label>
                                <input type="text" class="form-control form-control-lg focus:outline-none"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);"
                                    name="numero_producto" id="numero_producto" value="{{ $empresas->sigla }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3  read-content">
                            <label class="text-black font-w500">Caracteristicas</label>
                            <div class="mb-3 pt-3">
                                <textarea class="form-control form-control-lg focus:outline-none"
                                    style="font-weight:bolder; background-color:rgb(225, 225, 225);" maxlength="100"
                                    rows="4" name="descripcion_producto" id="descripcion_producto"
                                    readonly>{{ $empresas->caracteristicas }}</textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection