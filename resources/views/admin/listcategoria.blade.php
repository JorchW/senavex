@extends('home')
@section('content')
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Categoria</a></li>
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Rubros</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Abreviacion</th>
                                        <th>Rubro</th>
                                        <th>Estado</th>
                                        <th>Fecha Creado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categorias as $data)
                                        @if ($data->estado != 'eliminado')
                                            <tr>
                                                <td>{{ $data->nombre_categoria }}</td>
                                                <td>{{ $data->descripcion_corta }}</td>
                                                <td>{{ $data->id_rubro  }}</td>
                                                <td><a
                                                        href="{{ URL('estado-categorias-admin/' . $data->id_categoria ) }}"><strong>{{ $data->estado }}</strong></a>
                                                </td>
                                                <td>{{ $data->created_at }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ URL('one-categorias-admin/' . Crypt::encryptString($data->id_categoria )) }}"
                                                            class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <a href="{{ URL('eliminar-categorias-admin/' . Crypt::encryptString($data->id_categoria )) }}"
                                                            class="btn btn-danger shadow btn-xs sharp"><i
                                                                class="fa fa-trash"></i></a>
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
