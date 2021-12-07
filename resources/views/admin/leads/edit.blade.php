@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        Edit lead
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.leads.update", $lead) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="client">Client</label>
                <input class="form-control {{ $errors->has('client') ? 'is-invalid' : '' }}" type="text" name="client" id="client" value="{{ old('client', $lead->client) }}" required>
                @if($errors->has('client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @endif
            </div>

               <div class="form-group">
                <label for="company">Company</label>
                <input class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" type="text" name="company" id="company" value="{{ old('company', $lead->company) }}" required>
                @if($errors->has('company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="coast">Coast</label>
                <input class="form-control {{ $errors->has('coast') ? 'is-invalid' : '' }}" type="number" name="coast" id="coast" step="0.01" value="{{ old('coast', $lead->coast) }}">
                @if($errors->has('coast'))
                    <div class="invalid-feedback">
                        {{ $errors->first('coast') }}
                    </div>
                @endif
            </div>

                     <div class="form-group">
                <label for="origin">Origin</label>
                <input class="form-control {{ $errors->has('origin') ? 'is-invalid' : '' }}" type="text" name="origin" id="origin" value="{{ old('origin', $lead->origin) }}" required>
                @if($errors->has('origin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('origin') }}
                    </div>
                @endif
            </div>

                <div class="form-group">
                <select class="form-select {{ $errors->has('state') ? 'is-invalid' : '' }}" aria-label="Default select example"  id="state" name="state" required autofocus>
                    <option value="{{ old('state', $lead->state) }}">À faire</option>
                    <option value="{{ old('state', $lead->state) }}">Fait</option>
                    <option value="{{ old('state', $lead->state) }}">À appeler</option>
                    <option value="{{ old('state', $lead->state) }}">Perdu</option>
                </select>
                 @if($errors->has('state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('state') }}
                    </div>
                @endif
                </div>

                <div class="d-flex" style="margin-top: 5px">
                    <input id="email" placeholder="Email" class="block mt-1 w-full" type="email" name="email" value=" {{old('email', $lead->email)}}" required />
                      @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                </div>

                <div>
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
                </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    Edit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
