@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrarse</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row justify-content-center mb-3">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="name" class="form-label">Nombre</label>

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-12 col-md-6 mb-3">
                                
                                <label for="email" class="form-label">Correo Electrónico</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <label for="phone_number_code" class="form-label">Código de Área</label>

                                <select class="select2 form-control @error('phone_number_code') is-invalid @enderror" name="phone_number_code" >
                                    <option selected>Código de Área</option>
                                    @foreach ($country_codes_array['countries'] as $item)
                                        <option value="{{ $item['dial_code'] }}">{{ $item['name_es'] }} ({{ $item['dial_code'] }})</option>                     
                                    @endforeach
                                </select>
                                @error('phone_number_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <label for="phone_number" class="form-label">Número de Teléfono</label>

                                <input type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <label for="password" class="form-label">Contraseña</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="password-confirm" class="form-label">Confirmar Contraseña</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row justify-content-center mb-0">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">
                                    Registrarse
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap-5',
            containerCssClass: "select2--small"
        });
    });
</script>
@endsection
