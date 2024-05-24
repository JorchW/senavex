@extends('home')
@section('title', 'Editar Empresas')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Rubro</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Rubro</h5>
                        <a href="javascript:void(0);" class="btn-close" data-bs-dismiss="modal"></a>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ URL('update-rubros/' . Crypt::encryptString($rubroEdit->id_rubro)) }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{$rubroEdit->imagen_rubro}}" id="imagen_producto" name="imagen_producto" />
                            <div class="mb-3">
                                <label class="text-black font-w500">Abreviacion</label>
                                <input type="text" class="form-control focus:outline-none"
                                    name="abreviacion_rubro" id="abreviacion_rubro" value="{{$rubroEdit->abreviacion_rubro}}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="text-black font-w500">Nombre</label>
                                <textarea class="form-control focus:outline-none" rows="4" name="nombre_rubro" 
                                    id="nombre_rubro" required>{{$rubroEdit->nombre_rubro}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="text-black font-w500">Imagen</label>
                                <div class="input-group">
                                    <div class="form-file ">
                                        <input accept="image/png,image/jpeg,image/jpg" type="file"
                                            class="form-file-input form-control focus:outline-none"
                                            name="imagen_rubro" id="imagen_rubro" value="{{$rubroEdit->imagen_rubro}}" required>
                                    </div>
                                </div>
                                <p class="text-image-2"> </p>
                                <img src="{{$rubroEdit->imagen_rubro}}" >
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
