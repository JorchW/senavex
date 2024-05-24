@extends('home')
@section('title', 'Lista Correo')
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
                    <a href="javascript:void(0)">Inbox</a>
                </li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="email-list mt-3">
                            @foreach ($notificaciones as $notificacion)
                                <div class="message">
                                    <div>
                                        <div class="d-flex message-single">
                                            {{-- <div class="ps-1 align-self-center">
                                                <div class="form-check custom-checkbox">
                                                    <input type="checkbox" class="form-check-input" id="checkbox21" />
                                                    <label class="form-check-label" for="checkbox21"></label>
                                                </div>
                                            </div> --}}
                                            <div class="ms-2">
                                                <button class="border-0 bg-transparent align-middle p-0">
                                                    <i class="fa fa-google" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <a href="{{ URL('one-correo-admin/'.Crypt::encryptString($notificacion->id_notificacion)) }}" class="col-mail col-mail-2">
                                                    
                                            <div class="subject">
                                                {{ Str::limit($notificacion->mensaje, 100, $end = ' ...') }}
                                            </div>
                                            <div class="date">{{$notificacion->updated_at}}</div>
                                        </a>
                                        
                                    </div>
                                </div>
                            @endforeach
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
