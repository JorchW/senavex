@extends('home')
@section('content')
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Rubros</a></li>
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
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Abreviacion</th>
                                        <th>Estado</th>
                                        <th>Fecha Creado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rubros as $data)
                                        @if ($data->estado != 'eliminado')
                                            <tr>
                                                @if (strlen($data->imagen_rubro) > 0)
                                                    <td><img class="rounded-rectangle" width="100"
                                                            src="{{ $data->imagen_rubro }}" alt=""></td>
                                                @else
                                                    <td><img class="rounded-rectangle" width="100"
                                                            src="{{ asset('admin/images/profile/small/pic1.jpg') }}"
                                                            alt=""></td>
                                                @endif
                                                <td>{{ $data->nombre_rubro }}</td>
                                                <td>{{ $data->abreviacion_rubro }}</td>
                                                <td><a
                                                        href="{{ URL('estado-rubros-admin/' . Crypt::encryptString($data->id_rubro)) }}"><strong>{{ $data->estado }}</strong></a>
                                                </td>
                                                <td>{{ $data->created_at }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ URL('one-rubros-admin/' . Crypt::encryptString($data->id_rubro)) }}"
                                                            class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <a href="{{ URL('eliminar-rubros-admin/' . Crypt::encryptString($data->id_rubro)) }}"
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
