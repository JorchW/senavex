@extends('home')
@section('title', '')
@section('content')
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="javascript:void(0)">Email</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">Compose</a>
                </li>
            </ol>
        </div>

        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="compose-content">
                            <div class="row">
                                <div class="col-9">
                                <form  method="POST" action="{{ URL('send-email/' . Crypt::encryptString($idDes)) }}"
                                enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    <input type="hidden" value="{{Auth::id()}}" id="id_user"
                                        name="id_user" />
                                    <input type="hidden" value="{{$productos->imagen_producto}}" id="imagen"
                                        name="imagen" />
                                    
                                    <div class="mb-3">
                                        <input type="text" class="form-control bg-transparent" placeholder=" A:" 
                                            name="correo_para" id="correo_para"  value="{{$productos->email}}"/>
                                    </div>
                                    <div class="mb-3 read-content">
                                        <input type="text" class="form-control bg-transparent" placeholder=" Titulo:" 
                                            name="titulo" id="titulo"
                                            />
                                    </div>
                                    <div class="mb-3 read-content">
                                        <div class="mb-3 pt-3">
                                            <textarea id="email-compose-editor" class="textarea_editor form-control bg-transparent" rows="15"
                                                placeholder="Descripción ..."
                                                name="mensaje" id="mensaje"
                                                ></textarea>
                                        </div>
                                    </div>
                                    <div class="text-start mt-4 mb-3">
                                        <button class="btn btn-primary btn-sl-sm me-2" type="submit">
                                            <span class="me-2"><i class="fa fa-paper-plane"></i></span>Enviar
                                        </button>
                                        {{-- <button class="btn btn-danger light btn-sl-sm" type="button">
                                            <span class="me-2"><i class="fa fa-times"></i></span>Discard
                                        </button> --}}
                                    </div>
                                </form>
                                </div>
                                <div class="col-3">
                                    <img src="{{$productos->imagen_producto}}" height="100%" width="100%" alt="" />
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->
@endsection
