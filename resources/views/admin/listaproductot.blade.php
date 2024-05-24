@extends('home')
@section('title', 'Lista prodresas')
@section('content')
    <!-- row -->
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ URL('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Productos</a></li>
            </ol>
        </div>
        <div class="form-head mb-4 d-flex flex-wrap align-items-center">
            <div class="me-auto">
                <h2 class="font-w600 mb-0">Productos</h2>
                <p class="text-light"> </p>
            </div>
            {{-- <div class="input-group search-area2 d-xl-inline-flex mb-2 me-4">
                <button class="input-group-text"><i class="flaticon-381-search-2 text-primary"></i></button>
                <input type="text" class="form-control" placeholder="Search here...">
            </div> --}}
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body px-4 py-3 py-md-2">
                        <div class="row align-items-center">
                            <div class="col-sm-12 col-md-7">
                                <ul class="nav nav-pills review-tab">
                                    <li class="nav-item">
                                        <a href="#navpills-1" class="nav-link active" data-bs-toggle="tab"
                                            aria-expanded="false">Todos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#navpills-2" class="nav-link" data-bs-toggle="tab"
                                            aria-expanded="false">Publicados</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#navpills-3" class="nav-link" data-bs-toggle="tab"
                                            aria-expanded="true">Pendientes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#navpills-4" class="nav-link" data-bs-toggle="tab"
                                            aria-expanded="true">Observados</a>
                                    </li>
                                </ul>
                            </div>
                            {{-- <div class="col-sm-12 col-md-5 text-md-end mt-md-0 mt-4">
                                    <a href="javascript:void(0);" class="btn btn-secondary me-1 px-4">Publish</a>
                                    <a href="javascript:void(0);" class="btn btn-danger px-4">Delete</a>
                                </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="tab-content">
                    <div id="navpills-1" class="tab-pane fade show active">
                        <div class="table-responsive rounded table-hover fs-14">
                            <table class="table mb-4 dataTablesCard card-table p-0  review-table fs-14" id="example3">
                                <thead>
                                    <tr>
                                        
                                        <th>Titulo</th>
                                        <th style="width:250px;" class="d-none d-lg-table-cell">Imagen</th>
                                        <th>Descripcion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prodTodos as $prodTod)
                                        @if ($prodTod->estado != 'eliminado')
                                            <tr>
                                                
                                                <td>
                                                    <div class="media-body">
                                                        <h4 class="font-w600 mb-1 ">{{ $prodTod->nombre_producto }}</h4>
                                                        <span>{{ $prodTod->created_at }}</span>
                                                    </div>
                                                </td>
                                                @if (strlen($prodTod->imagen_producto) > 0)
                                                    <td class="d-none d-lg-table-cell">
                                                        <div class="media align-items-center tbl-img">
                                                            <img class="img-fluid  me-3 d-none d-xl-inline-block"
                                                                width="250" heigth="250"
                                                                src="{{ $prodTod->imagen_producto }}" alt="DexignZone">
                                                        </div>
                                                    </td>
                                                @else
                                                    <td class="d-none d-lg-table-cell">
                                                        <div class="media align-items-center tbl-img">
                                                            <img class="img-fluid  me-3 d-none d-xl-inline-block"
                                                                width="250" heigth="250"
                                                                src="{{ asset('storage/images/vistas/senavex1.png') }}"
                                                                alt="DexignZone">
                                                        </div>
                                                    </td>
                                                @endif
                                                <td>
                                                    <p class="mb-0 d-none d-xl-inline-block">
                                                        {{ $prodTod->descripcion_producto }}</p>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        @if ($prodTod->estado == 'inactivo')
                                                            <span
                                                                class="badge badge-secondary btn-sm">{{ $prodTod->estado }}</span>
                                                        @elseif ($prodTod->estado == 'activo')
                                                            <span
                                                                class="badge badge-success btn-sm">{{ $prodTod->estado }}</span>
                                                        @elseif ($prodTod->estado == 'observado')
                                                            <span
                                                                class="badge badge-warning btn-sm ">{{ $prodTod->estado }}</span>
                                                        @endif
                                                        <a href="{{ URL('one-prod-admin/'.Crypt::encryptString($prodTod->id_producto)) }}"
                                                            class="btn btn-primary btn-rounded text-white btn-sm ms-2 px-4">Editar</a>
                                                        <a href="{{ URL('eliminar-prod-admin/'.Crypt::encryptString($prodTod->id_producto)) }}"
                                                            class="btn btn-outline-danger btn-rounded btn-sm ms-2 px-4">Eliminar</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="navpills-2" class="tab-pane fade active">
                        <div class="table-responsive rounded table-hover fs-14">
                            <table class="table mb-4 dataTablesCard card-table p-0  review-table fs-14" id="example3">
                                <thead>
                                    <tr>
                                       
                                        <th style="width:250px;">Titulo</th>
                                        <th class="d-none d-lg-table-cell">Imagen</th>
                                        <th>Descripcion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prodActivos as $prodAct)
                                        @if ($prodAct->estado != 'eliminado')
                                            <tr>
                                                
                                                <td>
                                                    <div class="media-body">
                                                        <h4 class="font-w600 mb-1 ">{{ $prodAct->nombre_producto }}</h4>
                                                        <span>{{ $prodAct->created_at }}</span>
                                                    </div>
                                                </td>
                                                @if (strlen($prodAct->imagen_producto) > 0)
                                                    <td class="d-none d-lg-table-cell">
                                                        <div class="media align-items-center tbl-img">
                                                            <img class="img-fluid  me-3 d-none d-xl-inline-block"
                                                                width="250" heigth="250"
                                                                src="{{ $prodAct->imagen_producto }}" alt="DexignZone">
                                                        </div>
                                                    </td>
                                                @else
                                                    <td class="d-none d-lg-table-cell">
                                                        <div class="media align-items-center tbl-img">
                                                            <img class="img-fluid  me-3 d-none d-xl-inline-block"
                                                                width="250" heigth="250"
                                                                src="{{ asset('storage/images/vistas/senavex1.png') }}"
                                                                alt="DexignZone">
                                                        </div>
                                                    </td>
                                                @endif
                                                <td>
                                                    <p class="mb-0 d-none d-xl-inline-block">
                                                        {{ $prodAct->descripcion_producto }}</p>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ URL('observar-prod-admin/'.Crypt::encryptString($prodAct->id_producto)) }}"
                                                            class="btn btn-warning btn-rounded text-white btn-sm ms-2  px-4">Observar</a>
                                                        <a href="{{ URL('one-prod-admin/'.Crypt::encryptString($prodAct->id_producto)) }}"
                                                            class="btn btn-primary btn-rounded text-white btn-sm ms-2  px-4">Editar</a>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="navpills-3" class="tab-pane fade active">
                        <div class="table-responsive rounded table-hover fs-14">
                            <table class="table mb-4 dataTablesCard card-table p-0  review-table fs-14" id="example3">
                                <thead>
                                    <tr>
                                        
                                        <th style="width:250px;">Titulo</th>
                                        <th class="d-none d-lg-table-cell">Imagen</th>
                                        <th>Descripcion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prodInactivos as $prodInac)
                                        @if ($prodInac->estado != 'eliminado')
                                            <tr>
                                                
                                                <td>
                                                    <div class="media-body">
                                                        <h4 class="font-w600 mb-1 ">{{ $prodInac->nombre_producto }}</h4>
                                                        <span>{{ $prodInac->created_at }}</span>
                                                    </div>
                                                </td>
                                                @if (strlen($prodInac->imagen_producto) > 0)
                                                    <td class="d-none d-lg-table-cell">
                                                        <div class="media align-items-center tbl-img">
                                                            <img class="img-fluid  me-3 d-none d-xl-inline-block"
                                                                width="250" heigth="250"
                                                                src="{{ $prodInac->imagen_producto }}" alt="DexignZone">
                                                        </div>
                                                    </td>
                                                @else
                                                    <td class="d-none d-lg-table-cell">
                                                        <div class="media align-items-center tbl-img">
                                                            <img class="img-fluid  me-3 d-none d-xl-inline-block"
                                                                width="250" heigth="250"
                                                                src="{{ asset('storage/images/vistas/senavex1.png') }}"
                                                                alt="DexignZone">
                                                        </div>
                                                    </td>
                                                @endif
                                                <td>
                                                    <p class="mb-0 d-none d-xl-inline-block">
                                                        {{ $prodInac->descripcion_producto }}</p>
                                                </td>
                                                <td>
                                                    
                                                    <div class="d-flex">
                                                        
                                                        <a href="{{ URL('publicar-prod-admin/'.Crypt::encryptString($prodInac->id_producto)) }}"
                                                            class="btn btn-secondary btn-rounded text-white btn-sm px-4">Publicar</a>
                                                        <a href="{{ URL('observar-prod-admin/'.Crypt::encryptString($prodInac->id_producto)) }}"
                                                            class="btn btn-warning btn-rounded text-white btn-sm ms-2  px-4">Observar</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="navpills-4" class="tab-pane fade active">
                        <div class="table-responsive rounded table-hover fs-14">
                            <table class="table mb-4 dataTablesCard card-table p-0  review-table fs-14" id="example3">
                                <thead>
                                    <tr>
                                        
                                        <th style="width:250px;">Titulo</th>
                                        <th class="d-none d-lg-table-cell">Imagen</th>
                                        <th>Descripcion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prodObservados as $prodObs)
                                        @if ($prodObs->estado != 'eliminado')
                                            <tr>
                                                
                                                <td>
                                                    <div class="media-body">
                                                        <h4 class="font-w600 mb-1 ">{{ $prodObs->nombre_producto }}</h4>
                                                        <span>{{ $prodObs->created_at }}</span>
                                                    </div>
                                                </td>
                                                @if (strlen($prodObs->imagen_producto) > 0)
                                                    <td class="d-none d-lg-table-cell">
                                                        <div class="media align-items-center tbl-img">
                                                            <img class="img-fluid  me-3 d-none d-xl-inline-block"
                                                                width="250" heigth="250"
                                                                src="{{ $prodObs->imagen_producto }}" alt="DexignZone">
                                                        </div>
                                                    </td>
                                                @else
                                                    <td class="d-none d-lg-table-cell">
                                                        <div class="media align-items-center tbl-img">
                                                            <img class="img-fluid  me-3 d-none d-xl-inline-block"
                                                                width="250" heigth="250"
                                                                src="{{ asset('storage/images/vistas/senavex1.png') }}"
                                                                alt="DexignZone">
                                                        </div>
                                                    </td>
                                                @endif
                                                <td>
                                                    <p class="mb-0 d-none d-xl-inline-block">
                                                        {{ $prodObs->descripcion_producto }}</p>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ URL('publicar-prod-admin/'.Crypt::encryptString($prodObs->id_producto)) }}"
                                                            class="btn btn-secondary btn-rounded text-white btn-sm ms-2 px-4">Publicar</a>
                                                        <a href="{{ URL('eliminar-prod-admin/'.Crypt::encryptString($prodObs->id_producto)) }}"
                                                            class="btn btn-outline-danger btn-rounded btn-sm ms-2 px-4">Eliminar</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
