@extends('layouts.auth')

@section('content')
<div class="container" style="padding-top: 15px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
         <div class="text-center">
          <main class="form-signin">

        <form method="POST" action="{{ route("manager.store") }}" enctype="multipart/form-data">
            @csrf

            <a href="/" >
            <img class="mb-4" src="{{asset('./img/dashboard.png')}}" alt="" width="100" height="100">
            </a>
            <h3 class="">Créez votre compte EpiCRM</h3><br>

            <div class="form-floating">
                <input
                class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}"
                type="text"
                name="firstname"
                id="firstname"
                placeholder="Prénom"
                value="{{ old('firstname', '') }}" required>

                @if($errors->has('firstname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('firstname') }}
                    </div>
                @endif
            </div>


            <div class="form-floating">
                <input
                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                type="text"
                name="name"
                id="name"
                placeholder="Nom"
                value="{{ old('name', '') }}" required>

                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <div class="form-floating">
                <input
                class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                type="number"
                name="number"
                id="number"
                placeholder="Téléphone"
                value="{{ old('phone', '') }}" required>

                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
            </div>


            <div class="form-floating">
                <input
                class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                type="email"
                name="email"
                id="email"
                placeholder="Email"
                value="{{ old('email', '') }}" required>

                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>


            <div class="form-floating">
                <input
                class="form-control {{ $errors->has('domain') ? 'is-invalid' : '' }}"
                type="text"
                name="domain"
                id="domain"
                placeholder="Entreprise"
                value="{{ old('email', '') }}" required>

                @if($errors->has('domain'))
                    <div class="invalid-feedback">
                        {{ $errors->first('domain') }}
                    </div>
                @endif
            </div><br>

            <div class="d-flex">
                <div class="">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    </div>
                </div>
                 <p class="text-muted"> J'accepte les
                        <a href="#" class="">Conditions d'utilisation</a>
                        <a href="#"> - Politique de cofidentialité</a>.
                    </p>
            </div>

            <button class="w-100 btn btn-lg btn-success" type="submit">Créer votre compte</button>
        </form>
    </div>
    </div>
</div>
    </div>
</div>
@endsection
