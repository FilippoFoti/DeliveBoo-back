@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="registerForm">
                        @csrf

                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }} *</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus minlength="2" maxlength="50" pattern="[A-Za-z]+">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }} *</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('name') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus minlength="2" maxlength="50" pattern="[A-Za-z]+">
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }} *</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }} *</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }} *</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="alert alert-warning">
                            <p class="text-decoration-underline fw-bold">Tutti i campi contrassegnati con * sono obbligatori</p>
                            <p class="m-0 fw-bold">Nota:</p>
                            <p>Il Nome e Cognome devono contenere solo lettere minuscole e maiuscole senza spazi o caratteri speciali</p>
                        </div>

                        <div class="mb-4 row mb-0 my-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const registerForm = document.getElementById('registerForm');
                    
                            registerForm.addEventListener('submit', function(event) {
                                const passwordInput = document.getElementById('password');
                                const confirmPasswordInput = document.getElementById('password-confirm');
                    
                                if (passwordInput.value !== confirmPasswordInput.value) {
                                    event.preventDefault(); // Blocca l'invio del form
                                    confirmPasswordInput.setCustomValidity('Le password non coincidono');
                                }
                            });
                        });
                    </script>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
