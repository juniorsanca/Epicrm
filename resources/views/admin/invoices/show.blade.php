@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
         <small>Détails de la facture</small>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">

            <tr>
                <th>
                    NOM
                </th>
                <td>
                    {{ $invoice->name ?? '' }}
                </td>
            </tr>

            <tr>
                <th>
                    Vendeur
                </th>
                <td>
                    {{ $invoice->seller ?? '' }} €
                </td>
            </tr>

            <tr>
                <th>
                    Téléphone
                </th>
                <td>
                    {{ $invoice->phone ?? '' }}
                </td>
            </tr>

                <tr>
                <th>
                    Email
                </th>
                <td>
                    {{ $invoice->email ?? '' }}
                </td>
            </tr>

                <tr>
                <th>
                    Adresse
                </th>
                <td>
                    {{ $invoice->address ?? '' }}
                </td>
            </tr>

                <tr>
                <th>
                    Taxe
                </th>
                <td>
                    {{ $invoice->tax ?? '' }}
                </td>
            </tr>

            <tr>
                <th>
                    Description
                </th>
                <td>
                    {{ $invoice->description ?? '' }}
                </td>
            </tr>


        </table>
        <div class="form-group">
            <a href="{{ route('admin.invoices.index') }}" class="btn btn-info">
                Retourner à la liste
            </a>

            <a href="{{ route('admin.invoices.invoice') }}" class="btn btn-primary">
                Générer facture
            </a>
        </div>
    </div>
</div>
@endsection
