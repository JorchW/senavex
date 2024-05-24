@extends('home')
@section('title', 'Lista Empresas')
@section('content')
    <!-- row -->
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ URL('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Empresas</a></li>
            </ol>
        </div>
        <div class="form-head mb-4 d-flex flex-wrap align-items-center">
            <div class="me-auto">
                <h2 class="font-w600 mb-0">Empresas</h2>
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
                                        <th>
                                            <div class="form-check checkbox-secondary">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkAll">
                                                <label class="form-check-label" for="checkAll">
                                                </label>
                                            </div>
                                        </th>
                                        <th style="width:100px;">Nombre</th>
                                        <th style="width:250px;" class="d-none d-lg-table-cell">Imagen</th>
                                        <th>Descripcion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($empTodos as $empTod)
                                    @if($empTod->estado != 'eliminado')
                                    <tr>
                                        <td>
                                            <div class="form-check checkbox-secondary">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault11">
                                                <label class="form-check-label" for="flexCheckDefault11">
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="media-body">
                                                <h4 class="font-w600 mb-1 ">{{$empTod->razon_social_empresa}}</h4>
                                                <span>{{$empTod->created_at}}</span>
                                            </div>
                                        </td>
                                        @if(strlen($empTod->imagen_empresa) > 0)
                                        <td class="d-none d-lg-table-cell">
                                            <div class="media align-items-center tbl-img">
                                                <img class="img-fluid  me-3 d-none d-xl-inline-block" width="250"
                                                    heigth="250" src="{{$empTod->imagen_empresa}}" alt="DexignZone">
                                            </div>
                                        </td>
                                        @else
                                        <td class="d-none d-lg-table-cell">
                                            <div class="media align-items-center tbl-img">
                                                <img class="img-fluid  me-3 d-none d-xl-inline-block" width="250"
                                                    heigth="250" src="{{ asset('storage/images/vistas/senavex1.png')}}" alt="DexignZone">
                                            </div>
                                        </td>
                                        @endif
                                        <td>
                                            <p class="mb-0 d-none d-xl-inline-block">{{$empTod->descripcion_empresa}}</p>
                                        </td>
                                        <td>
                                            @if ($empTod->estado == 'activo')
                                            <div class="d-flex">
                                                <a href="{{ URL('eliminar-emp-admin/' . Crypt::encryptString($empTod->id_empresa )) }}"
                                                    class="btn btn-outline-danger btn-rounded btn-sm ms-2 px-4">Pendiente</a>
                                            </div>
                                            @else
                                            <div class="d-flex">
                                                <a href="{{ URL('publicar-emp-admin/' . Crypt::encryptString($empTod->id_empresa) ) }}"
                                                    class="btn btn-secondary btn-rounded text-white btn-sm px-4">Publicar</a>
                                            </div>
                                            @endif
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
                            <table class="table mb-4 dataTablesCard card-table p-0  review-table fs-14" id="example6">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check checkbox-secondary">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkAll2">
                                                <label class="form-check-label" for="checkAll2">
                                                </label>
                                            </div>
                                        </th>
                                        <th style="width:250px;">Nombre</th>
                                        <th class="d-none d-lg-table-cell">Imagen</th>
                                        <th>Descripcion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($empActivos as $empAct)
                                    @if($empAct->estado != 'eliminado')
                                    <tr>
                                        <td>
                                            <div class="form-check checkbox-secondary">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault11">
                                                <label class="form-check-label" for="flexCheckDefault11">
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="media-body">
                                                <h4 class="font-w600 mb-1 ">{{$empAct->razon_social_empresa}}</h4>
                                                <span>{{$empAct->created_at}}</span>
                                            </div>
                                        </td>
                                        @if(strlen($empAct->imagen_empresa) > 0)
                                        <td class="d-none d-lg-table-cell">
                                            <div class="media align-items-center tbl-img">
                                                <img class="img-fluid  me-3 d-none d-xl-inline-block" width="250"
                                                    heigth="250" src="{{$empAct->imagen_empresa}}" alt="DexignZone">
                                            </div>
                                        </td>
                                        @else
                                        <td class="d-none d-lg-table-cell">
                                            <div class="media align-items-center tbl-img">
                                                <img class="img-fluid  me-3 d-none d-xl-inline-block" width="250"
                                                    heigth="250" src="{{ asset('storage/images/vistas/senavex1.png')}}" alt="DexignZone">
                                            </div>
                                        </td>
                                        @endif
                                        <td>
                                            <p class="mb-0 d-none d-xl-inline-block">{{$empAct->descripcion_empresa}}</p>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ URL('eliminar-emp-admin/' . Crypt::encryptString($empAct->id_empresa )) }}"
                                                    class="btn btn-outline-danger btn-rounded btn-sm ms-2 px-4">Pendiente</a>
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
                            <table class="table mb-4 dataTablesCard card-table p-0  review-table fs-14" id="example6">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check checkbox-secondary">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkAll2">
                                                <label class="form-check-label" for="checkAll2">
                                                </label>
                                            </div>
                                        </th>
                                        <th style="width:250px;">Nombre</th>
                                        <th class="d-none d-lg-table-cell">Imagen</th>
                                        <th>Descripcion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($empInactivos as $empInac)
                                    @if($empInac->estado != 'eliminado')
                                    <tr>
                                        <td>
                                            <div class="form-check checkbox-secondary">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault11">
                                                <label class="form-check-label" for="flexCheckDefault11">
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="media-body">
                                                <h4 class="font-w600 mb-1 ">{{$empInac->razon_social_empresa}}</h4>
                                                <span>{{$empInac->created_at}}</span>
                                            </div>
                                        </td>
                                        @if(strlen($empInac->imagen_empresa) > 0)
                                        <td class="d-none d-lg-table-cell">
                                            <div class="media align-items-center tbl-img">
                                                <img class="img-fluid  me-3 d-none d-xl-inline-block" width="250"
                                                    heigth="250" src="{{$empInac->imagen_empresa}}" alt="DexignZone">
                                            </div>
                                        </td>
                                        @else
                                        <td class="d-none d-lg-table-cell">
                                            <div class="media align-items-center tbl-img">
                                                <img class="img-fluid  me-3 d-none d-xl-inline-block" width="250"
                                                    heigth="250" src="{{ asset('storage/images/vistas/senavex1.png')}}" alt="DexignZone">
                                            </div>
                                        </td>
                                        @endif
                                        <td>
                                            <p class="mb-0 d-none d-xl-inline-block">{{$empInac->descripcion_empresa}}</p>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ URL('publicar-emp-admin/' . Crypt::encryptString($empInac->id_empresa )) }}"
                                                    class="btn btn-secondary btn-rounded text-white btn-sm px-4">Publicar</a>
                                                
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
