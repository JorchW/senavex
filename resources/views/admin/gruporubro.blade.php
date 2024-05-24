@extends('home')
@section('content')
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Rubros Grupos</a></li>
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Grupo Empresa-Rubro</h4>
                        <div class="col-xl-3 col-lg-4 mb-4 mb-lg-0">
                            <a href="javascript:void(0);" class="btn btn-secondary  btn-lg btn-block rounded text-white"
                                data-bs-toggle="modal" data-bs-target="#addNewCustomer">+Nuevo Producto</a>
                            <!-- Add Order -->

                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Empresa</th>
                                        <th>Rubro</th>
                                        <th>Fecha Creado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gruporubros as $data)
                                        <tr>
                                            <td>{{ $data->razon_social_empresa }}</td>
                                            <td>{{ $data->nombre_rubro }}</td>
                                            <td>{{ $data->created_at }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ URL('eliminar-grupo-rubros-admin/' . Crypt::encryptString($data->id)) }}"
                                                        class="btn btn-danger shadow btn-xs sharp"><i
                                                            class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addNewCustomer">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Grupo Empresa-Rubro</h5>
                    <a href="javascript:void(0);" class="btn-close" data-bs-dismiss="modal"></a>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ URL('crea-grup-rubro') }}"
                        enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <input type="hidden" name="id_empresa" id="id_empresa" value="{{ $id_empresa}}" />
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="text-black font-w500">Rubro</label>
                                <select class="default-select form-control wide focus:outline-none" name="id_rubro"
                                    id="id_rubro" required>
                                    <option value="" selected></option>
                                    @foreach ($rubros as $rubro)
                                        <option value="{{ $rubro->id_rubro }}">
                                            {{ $rubro->nombre_rubro }}
                                        </option>
                                    @endforeach
                                </select>
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
@endsection
