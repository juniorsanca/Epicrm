@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        Modifier le prospects
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.leads.update", $lead) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

             <div class="form-group">
                <label for="date">Date</label>
                <input class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $lead->date) }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="client">Nom Prénom</label>
                <input class="form-control {{ $errors->has('client') ? 'is-invalid' : '' }}" type="text" name="client" id="client" value="{{ old('client', $lead->client) }}" required>
                @if($errors->has('client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="company">Entreprise</label>
                <input class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" type="text" name="company" id="company" value="{{ old('company', $lead->company) }}" required>
                @if($errors->has('company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company') }}
                    </div>
                @endif
            </div>

            <!-----[CHANGE STATE]----->
               <div class="form-group" style="width: 99%">
                <label for="company">Qualification</label>
                <!--{!! Form::select('state_id', $states, old('state_id'), ['class' => 'form-control select2']) !!}-->
                <p class="help-block"></p>

                <select class="form-control select2 {{ $errors->has('state_id') ? 'is-invalid' : '' }}" id="state_id" name="state_id">
                    @foreach($states as $id => $state)
                        <option value="{{ $id }}" {{ old('state_id', $lead->state_id) == $id ? 'selected' : '' }}>{{ $state }}</option>
                    @endforeach
                </select>

              @if($errors->has('state_id'))
                    <p class="help-block">
                        {{ $errors->first('state_id') }}
                    </p>
                @endif
            </div>
            <!-------[END STATE]-------->

            <div class="form-group">
                <label for="coast">Montant</label>
                <input class="form-control {{ $errors->has('coast') ? 'is-invalid' : '' }}" type="number" name="coast" id="coast" step="0.01" value="{{ old('coast', $lead->coast) }}">
                @if($errors->has('coast'))
                    <div class="invalid-feedback">
                        {{ $errors->first('coast') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="origin">Provenance</label>
                <input class="form-control {{ $errors->has('origin') ? 'is-invalid' : '' }}" type="text" name="origin" id="origin" value="{{ old('origin', $lead->origin) }}" required>
                @if($errors->has('origin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('origin') }}
                    </div>
                @endif
            </div>

            <!--next_action-->
            <div class="form-group">
                <label for="next_action">Date de rappel</label>
                <input class="form-control {{ $errors->has('next_action') ? 'is-invalid' : '' }}" type="text" name="next_action" id="next_action" value="{{ old('next_action', $lead->next_action) }}" required>
                @if($errors->has('next_action'))
                    <div class="invalid-feedback">
                        {{ $errors->first('next_action') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="action_state">Statut d'action</label>
                <input class="form-control {{ $errors->has('action_state') ? 'is-invalid' : '' }}" type="text" name="action_state" id="action_state" value="{{ old('action_state', $lead->action_state) }}" required>
                @if($errors->has('action_state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('action_state') }}
                    </div>
                @endif
            </div>

                <div class="form-group" style="">
                    <label for="origin">Adresse email</label>
                    <input id="email" placeholder="Email" class="form-control" type="email" name="email" value=" {{old('email', $lead->email)}}" required />
                      @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                </div>

                <div>
                    <label for="origin">Téléphone</label>
                    <div class="input-group mb-3">
                        <input type="number" maxlength="10" class="form-control" placeholder="Téléphone" id="phone" name="phone" value="{{old('phone', $lead->phone)}}" aria-label="phone" aria-describedby="basic-addon1" style="margin-left: 5px">
                    </div>
                       @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                </div>

                <label for="description">Description</label>
                <div class="form-floating">
                    <textarea name="description" class="form-control" placeholder="Écrivez un commentaire ci-dessus" id="description" style="height: 100px">{{old('description', $lead->description)}}</textarea>
                          @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                </div><br>

            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    Mettre à jour l'opportunité
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
