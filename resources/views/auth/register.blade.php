@extends('layouts.app')

@section('content')
    
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-8">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.html"><img src="admin/images/logo-full.png" alt=""></a>
                                    </div>
                                    {{-- <div class="card-header">{{ __('Registro') }}</div> --}}

                                    <div class="card-body">
                                        <form method="POST" action="{{ redirect()->route('register') }}">
                                            @csrf
                                            <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="usuario" class="mb-1">{{ __('CI') }}</label>
                                                <input id="ci" type="text" placeholder="__________________" value="{{ $dataPerson->ci }}" disabled="disabled"
                                                    class="form-control @error('ci') is-invalid @enderror" name="ci"
                                                    value="{{ old('ci') }}" required autocomplete="name" autofocus>

                                                @error('ci')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="nombres" class="mb-1">{{ __('Nombres') }}</label>
                                                <input id="nombres" type="text" placeholder="__________________" value="{{ $dataPerson->nombres }}" disabled="disabled"
                                                    class="form-control @error('nombres') is-invalid @enderror"
                                                    name="nombres" value="{{ old('nombres') }}" required
                                                    autocomplete="name" autofocus>

                                                @error('nombres')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                            
                                            <div class="mb-3 col-md-6">
                                                <label for="primerApellido"
                                                    class="mb-1">{{ __('Primer Apellido') }}</label>
                                                <input id="primerApellido" type="text" placeholder="__________________" value="{{ $dataPerson->primerApellido }}" disabled="disabled"
                                                    class="form-control @error('primerApellido') is-invalid @enderror"
                                                    name="primerApellido" value="{{ old('primerApellido') }}" required
                                                    autocomplete="name" autofocus>

                                                @error('primerApellido')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="segundoApellido"
                                                    class="mb-1">{{ __('Segundo Apellido') }}</label>
                                                    <input id="segundoApellido" type="text" placeholder="__________________" value="{{ $dataPerson->segundoApellido }}" disabled="disabled"
                                                        class="form-control @error('segundoApellido') is-invalid @enderror"
                                                        name="segundoApellido" value="{{ old('segundoApellido') }}"
                                                        required autocomplete="name" autofocus>

                                                    @error('segundoApellido')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                            <div class="mb-3">
                                                <label for="email"
                                                    class="mb-1">{{ __('Correo electrónico') }}</label>

                                                    <input id="email" type="text" placeholder="example@example.com" value="{{ $dataPerson->email }}"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email" autofocus>

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="username"
                                                    class="mb-1">{{ __('Usuario') }}</label>

                                                    <input id="text" type="username" placeholder="" value="{{ $dataPerson->ci }}"
                                                        class="form-control @error('username') is-invalid @enderror"
                                                        name="username" value="{{ old('username') }}" required
                                                        autocomplete="name">

                                                    @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="password"
                                                    class="mb-1">{{ __('Contraseña') }}</label>

                                                    <input id="password" type="password" placeholder="" value="{{ $contrasena }}"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="new-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="password-confirm" placeholder=""
                                                    class="mb-1">{{ __('Confirmar Contraseña') }}</label>

                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                                <div class="text-center mt-4">
                                                    <button type="submit" class="btn btn-primary btn-block">
                                                        {{ __('Register') }}
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
    </div>


    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="usuario" class="col-md-4 col-form-label text-md-end">{{ __('CI') }}</label>

                            <div class="col-md-6">
                                <input id="ci" type="text" class="form-control @error('ci') is-invalid @enderror" name="ci" value="{{ old('ci') }}" required autocomplete="name" autofocus>

                                @error('ci')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="nombres" class="col-md-4 col-form-label text-md-end">{{ __('Nombres') }}</label>

                            <div class="col-md-6">
                                <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" value="{{ old('nombres') }}" required autocomplete="name" autofocus>

                                @error('nombres')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="primerApellido" class="col-md-4 col-form-label text-md-end">{{ __('Primer Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="primerApellido" type="text" class="form-control @error('primerApellido') is-invalid @enderror" name="primerApellido" value="{{ old('primerApellido') }}" required autocomplete="name" autofocus>

                                @error('primerApellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="segundoApellido" class="col-md-4 col-form-label text-md-end">{{ __('Segundo Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="segundoApellido" type="text" class="form-control @error('segundoApellido') is-invalid @enderror" name="segundoApellido" value="{{ old('segundoApellido') }}" required autocomplete="name" autofocus>

                                @error('segundoApellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="usuario" class="col-md-4 col-form-label text-md-end">{{ __('Usuario') }}</label>

                            <div class="col-md-6">
                                <input id="text" type="usuario" class="form-control @error('usuario') is-invalid @enderror" name="usuario" value="{{ old('usuario') }}" required autocomplete="name">

                                @error('usuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
