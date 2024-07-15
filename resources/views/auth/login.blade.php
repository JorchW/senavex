@extends('layouts.app')
@section('content')
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3" style="background-color:#3c3c3c;border-radius:20px;">
                                        <a href=""><img src="{{asset('storage/images/vistas/logoc.png')}}" style="width:250px;margin:auto;" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Inicia sesión en tu cuenta</h4>
                                    <form method="POST" action="{{route('login')}}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Carnet de Identidad</strong></label>
                                            <input id="ci" type="text"
                                                class="form-control @error('ci') is-invalid @enderror" name="ci"
                                                value="{{ old('ci') }}" autocomplete="ci" autofocus>

                                            @error('ci')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Contraseña</strong></label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
