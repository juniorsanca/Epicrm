@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        Nouvelle opportunité
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.leads.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name"></label>
                <input class="form-control {{ $errors->has('client') ? 'is-invalid' : '' }}" type="text" placeholder="NOM Prénom" name="client" id="client" value="{{ old('client', '') }}" required>
                @if($errors->has('client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @endif
            </div>

               <div class="form-group">
                <label for="company">Tags</label>
                <input class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" type="text"  placeholder="PME, Partenanires, France" name="company" id="company" value="{{ old('company', '') }}" required>
                @if($errors->has('company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company') }}
                    </div>
                @endif
            </div>

            <label for="coast">Montant</label>
            <div class="input-group" style="width: 50%">
                <input class="form-control {{ $errors->has('coast') ? 'is-invalid' : '' }}" type="number" name="coast" id="coast" step="0.01" value="{{ old('coast', '') }}">
                    <div class="input-group-append">
                        <span class="input-group-text">€</span>
                    </div>
                    @if($errors->has('coast'))
                        <div class="invalid-feedback">
                            {{ $errors->first('coast') }}
                        </div>
                    @endif
            </div> <br>

            <!-----[SELECT USER]----->
            <div class="form-group" style="width: 99%">
                {!! Form::label('tenant_id', trans('Assigner à'). '',  ['class' => 'control-label']) !!}

                {!! Form::select('tenant_id', $users, old('tenant_id'), ['class' => 'form-control select2']) !!}
                <p class="help-block"></p>
            </div>
              @if($errors->has('tenant_id'))
                    <p class="help-block">
                        {{ $errors->first('tenant_id') }}
                    </p>
              @endif

            <!-----[SELECT STATE]----->
            <div class="form-group" style="width: 99%">
                {!! Form::label('state_id', trans('Entrant'). '',  ['class' => 'control-label']) !!}

                {!! Form::select('state_id', $states, old('state_id'), ['class' => 'form-control select2']) !!}
                <p class="help-block"></p>

              @if($errors->has('state_id'))
                    <p class="help-block">
                        {{ $errors->first('state_id') }}
                    </p>
                @endif
            </div>

                <div class="form-group">
                <label for="origin">Provenance</label>
                <input class="form-control {{ $errors->has('origin') ? 'is-invalid' : '' }}" type="text" name="origin" id="origin" value="{{ old('origin', '') }}" required>
                @if($errors->has('origin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('origin') }}
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
                    <textarea name="description" class="form-control" placeholder="Entrez une description ci-dessus" id="description" :value="old('description')" style="height: 100px"></textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                </div><br>

            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    Créer l'opportunité
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
