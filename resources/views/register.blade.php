@extends('layouts.auth')

@section('content')
<div class="container" style="">
    <div class="row justify-content-center">
        <div class="col-md-8">
         <div class="text-center">
          <main class="form-signin">

        @if(session()->has('message'))
            <div class="alert alert-success">
                <small>
                    {{ session()->get('message') }}
                </small>
            </div>
        @endif

        <form method="POST" action="{{ route("manager.store") }}" enctype="multipart/form-data">
            @csrf

            <a href="/" >
            <img class="mb-4" src="{{asset('./img/dashboard.png')}}" alt="" width="80" height="50">
            </a>
            <h3 class="">Créez votre compte EpiCRM</h3>
            <small>7 jours d'essai gratuit, sans carte</small>

            <div>
            <div class="form-floating mb-3">
                <input
                class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}"
                type="text"
                aria-label="Prénom"
                name="firstname"
                id="firstname"
                placeholder="Prénom"
                value="{{ old('firstname', '') }}" required>
                <label for="floatingInput">Prénom</label>
            </div>
                @if($errors->has('firstname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('firstname') }}
                    </div>
                @endif
            </div>

            <div class="form-floating mb-3">
                <input
                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                type="text"
                name="name"
                id="name"
                placeholder="Nom"
                value="{{ old('name', '') }}" required>
                <label for="floatingInput">Nom</label>
                     @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <div class="form-floating mb-3">
                <input
                class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                type="number"
                name="number"
                id="number"
                placeholder="Téléphone"
                value="{{ old('phone', '') }}" required>
                <label for="floatingInput">Téléphone</label>
            </div>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif


            <div class="form-floating mb-3">
                <input
                class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                type="email"
                name="email"
                id="email"
                placeholder="Email"
                value="{{ old('email', '') }}" required>
                <label for="floatingInput">Adresse email</label>
            </div>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif


            <div class="form-floating mb-3">
                <input
                class="form-control {{ $errors->has('domain') ? 'is-invalid' : '' }}"
                type="text"
                name="domain"
                id="domain"
                placeholder="Entreprise"
                value="{{ old('email', '') }}" required>
                <label for="floatingInput">Entreprise</label>
            </div><br>
                @if($errors->has('domain'))
                    <div class="invalid-feedback">
                        {{ $errors->first('domain') }}
                    </div>
                @endif

            <div class="d-flex">
                <div class="">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    </div>
                </div>
                 <small class="text-muted"> J'accepte les
                        <a href="#" class="">Conditions d'utilisation</a>
                        <a href="#"> Politique de cofidentialité</a>.
                    </small>
                    <br>
                    <br>
            </div>

            <button class="w-100 btn btn-lg btn-success" type="submit">Créer votre compte</button>
        </form>
    </div>
    </div>
</div>
    </div>
</div>
@endsection
