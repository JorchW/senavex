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
    <!-- row -->
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
                        <input type="hidden" value="{{--{{ $productoEdit->id_producto }}--}}" id="id_producto"
                            name="id_producto" />
                        <input type="hidden" value="{{--{{ $productoEdit->imagen_producto }}--}}" id="imagen_producto"
                            name="imagen_producto" />
                        <div class="mb-3">
                            <label class="text-black font-w500">Denominacion del Producto:</label>
                            <input type="text" class="form-control form-control-lg focus:outline-none"
                                placeholder="Introduzca el producto..." name="nombre_producto" id="nombre_producto"
                                value="{{ $empresas->denominacion_comercial }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="text-black font-w500">Foto 1</label>
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
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="text-black font-w500">Foto 2</label>
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
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="text-black font-w500">Foto 3</label>
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
                            <p class="text-image-2"> </p>
                            @error('path_file_photo3')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            @forelse ($rubrosel as $r)
                                <label class="text-black font-w500">Rubro Actual</label>
                                <input type="text" class="form-control" value="{{ $r->descripcion_rubro }}" readonly>
                            @empty
                                <div class="mb-3">
                                    <label class="text-black font-w500">Seleccionar Rubro</label>
                                    <select class="form-control focus:outline-none" name="id_rubro" id="id_rubro">
                                        <option>Seleccione un rubro...</option>
                                        @foreach ($rubros as $rubro)
                                            <option value="{{ $rubro->id_rubro }}">
                                                {{mb_strtolower(Str::limit($rubro->descripcion_rubro, 100, $end = ' ...'))}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforelse
                        </div>
                        <div class="mb-3">
                            @forelse ($categoriasel as $c)
                                <label class="text-black font-w500">Rubro Actual</label>
                                <input type="text" class="form-control" value="{{ $c->descripcion }}" readonly>
                            @empty
                                <div class="mb-3">
                                    <label class="text-black font-w500">Seleccionar Categoria</label>
                                    <select class="form-control focus:outline-none" name="id_categoria" id="id_categoria">
                                        <option>Seleccione una Categoria...</option>
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->id_categoria }}">
                                                {{mb_strtolower(Str::limit($categoria->descripcion, 100, $end = ' ...'))}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforelse
                        </div>

                        <input type="hidden" name="id_empresa" value="{{ $empresas->id_empresa }}">
                        <div class="mb-3 row text-center">
                            <div class="">
                                <button type="submit" class="btn btn-primary">Enviar Datos</button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="text-black font-w500">Numero DDJJ:</label>
                            <input type="text" class="form-control form-control-lg focus:outline-none"
                                placeholder="Introduzca el producto..." name="nombre_producto" id="nombre_producto"
                                value="{{ $empresas->numero_ddjj }}" readonly>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="text-black font-w500 ">Codigo Nandina</label>
                                <input type="number" maxlength="10"
                                    class="form-control focus:outline-none focus:ring-2 input-number"
                                    name="codigo_nandina" id="codigo_nandina" value="{{ $empresas->codigo_nandina }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="mb-3  read-content">
                            <label class="text-black font-w500">Caracteristicas</label>
                            <div class="mb-3 pt-3">
                                <textarea class="form-control focus:outline-none" maxlength="100" rows="4"
                                    name="descripcion_producto" id="descripcion_producto"
                                    readonly>{{ $empresas->caracteristicas }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="text-black font-w500">Acuerdo</label>
                                <input type="text" class="form-control focus:outline-none focus:ring-2"
                                    name="numero_producto" id="numero_producto" value="{{ $empresas->acuerdo }}"
                                    readonly>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="text-black font-w500">Sigla</label>
                                <input type="text" class="form-control focus:outline-none focus:ring-2"
                                    name="numero_producto" id="numero_producto" value="{{ $empresas->sigla }}" readonly>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection