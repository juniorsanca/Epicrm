@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
         <small>Détails de l'opportunité</small>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tr>
                <th>
                    Date
                </th>
                <td>
                    {{ $lead->date ?? '' }}
                </td>
            </tr>

            <tr>
                <th>
                    NOM Prénom
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
                    Qualification
                </th>
                <td>
                    {{ $lead->state_id ?? '' }}
                </td>
            </tr>

            <tr>
                <th>
                    Montant
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
                    Date de rappel
                </th>
                <td>
                    {{ $lead->next_action ?? '' }}
                </td>
            </tr>

            <tr>
                <th>
                    Statut d'action
                </th>
                <td>
                    {{ $lead->action_state ?? '' }}
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
                    Assigner à
                </th>
                <td>
                    <!-----[Afficher la personne à qui le lead a été attribué]---->
                    <!--    {{ $lead->client }}   -->
                   @if (auth()->check() && auth()->user()->id)
                        {{auth()->user()->name}}
                    @endif
                </td>

            </tr>

        </table>
        <div class="form-group">
            <a href="{{ route('admin.leads.index') }}" class="btn btn-info">
                Retourner à la liste
            </a>
        </div>
    </div>
</div>
@endsection
