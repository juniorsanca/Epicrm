@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
         <small>Détails</small>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tr>
                <th>
                    Client
                </th>
                <td>
                    {{ $lead->client ?? '' }}
                </td>
            </tr>
                      <tr>
                <th>
                    Entreprise
                </th>
                <td>
                    {{ $lead->company ?? '' }}
                </td>
            </tr>
                      <tr>
                <th>
                    Prix
                </th>
                <td>
                    {{ $lead->coast ?? '' }} €
                </td>
            </tr>
                      <tr>
                <th>
                    Provenance
                </th>
                <td>
                    {{ $lead->origin ?? '' }}
                </td>
            </tr>
                      <tr>
                <th>
                    Suivie
                </th>
                <td>
                    {{ $lead->state ?? '' }}
                </td>
            </tr>
                      <tr>
                <th>
                    Adresse email
                </th>
                <td>
                    {{ $lead->email ?? '' }}
                </td>
            </tr>
                      <tr>
                <th>
                    Téléphone
                </th>
                <td>
                    {{ $lead->phone ?? '' }}
                </td>
            </tr>
            <tr>
                <th>
                    Description
                </th>
                <td>
                    {{ $lead->description ?? '' }}
                </td>
            </tr>

            <tr>
                <th>
                    User Assign
                </th>
                <td>
                    {{ $lead->user_id ?? '' }}
                </td>
            </tr>

        </table>
        <div class="form-group">
            <a href="{{ route('admin.leads.index') }}" class="btn btn-info">
                Back to list
            </a>
        </div>
    </div>
</div>
@endsection
