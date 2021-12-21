@extends('layouts.auth')

@section('content')
<div class="container" style="padding-top: 40px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="text-center">
                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                    @endif
                    <main class="form-signin">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <a href="/" >
                                <img class="mb-4" src="{{asset('./img/dashboard.png')}}" alt="" width="82" height="77">
                            </a>
                            <h5 class="">Connexion à votre compte EpiCRM</h5><br>

                            <div class="form-floating">
                                <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                placeholder="name@example.com"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                @enderror
                            </div>

                            <div class="form-floating">
                                <input
                                type="password"
                                class="form-control"
                                id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password"
                                placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="checkbox mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember"> {{ __('Se souvenir de moi') }} </label>
                                </div>
                            </div>


                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Mot de passe oublié ?') }}
                                </a>
                            @endif

                            <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>
                            <p class="mt-5 mb-3 text-muted">© 2021–2022</p>


                                <div class="align-center">
                                    @if (Route::has('register'))
                                        Vous n’avez pas de compte  ? <a class="btn btn-link" href="{{ route('register') }}">
                                            {{ __(' Inscrivez-vous') }}
                                        </a>
                                    @endif
                                </div>

                        </form>
                    </main>
            </div>
        </div>
        <p class="text-muted">EpiCRM un crm epic
            <a href="#" class="">Conditions d'utilisation</a>
            <a href="#"> - Politique de cofidentialité</a>.
        </p>
    </div>
</div>
@endsection
