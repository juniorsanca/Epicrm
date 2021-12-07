@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        Create lead
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.leads.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Client</label>
                <input class="form-control {{ $errors->has('client') ? 'is-invalid' : '' }}" type="text" name="client" id="client" value="{{ old('client', '') }}" required>
                @if($errors->has('client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @endif
            </div>

               <div class="form-group">
                <label for="company">Company</label>
                <input class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" type="text" name="company" id="company" value="{{ old('company', '') }}" required>
                @if($errors->has('company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="coast">Coast</label>
                <input class="form-control {{ $errors->has('coast') ? 'is-invalid' : '' }}" type="number" name="coast" id="coast" step="0.01" value="{{ old('coast', '') }}">
                @if($errors->has('coast'))
                    <div class="invalid-feedback">
                        {{ $errors->first('coast') }}
                    </div>
                @endif
            </div>

                <div class="form-group">
                <label for="origin">Origin</label>
                <input class="form-control {{ $errors->has('origin') ? 'is-invalid' : '' }}" type="text" name="origin" id="origin" value="{{ old('origin', '') }}" required>
                @if($errors->has('origin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('origin') }}
                    </div>
                @endif
            </div>

                <div class="form-group">
                <select class="custom-select {{ $errors->has('state') ? 'is-invalid' : '' }}" aria-label="Default select example"  id="state" name="state" required autofocus>
                    <option value="À faire">À faire</option>
                    <option value="Fait">Fait</option>
                    <option value="À appeler">À appeler</option>
                    <option value="Perdu">Perdu</option>
                </select>
                 @if($errors->has('state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('state') }}
                    </div>
                @endif
                </div>

                <div class="form-groupe">
                    <input id="email" placeholder="Email" class="form-control" type="email" name="email" :value="old('email', '')" required />
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                </div><br>

                <div class="form-groupe">
                    <input type="number" maxlength="10" class="form-control" placeholder="Téléphone" id="phone" name="phone" aria-label="phone" aria-describedby="basic-addon1" style="margin-left: 5px">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                </div><br>

                <div class="form-floating">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" placeholder="Écrivez un commentaire ci-dessus" id="description" :value="old('description')" style="height: 100px"></textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                </div><br>

            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    Create
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
