@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Gestion des factures
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @can('user_management_create')
                        <div class="form-group">
                            <a href="{{ route('admin.invoices.create') }}" class="btn-sm btn btn-success">Ajouter une facture</a>
                        </div>
                    @endcan
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable">
                        <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Titre
                            </th>
                            <th>
                                Entreprise
                            </th>
                            <th>
                                Numero de facture
                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                &nbsp;
                            </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>

    $(function () {
        let table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            retrieve: true,
            aaSorting: [],
            ajax: "{{ route('admin.invoices.index') }}",
            columns: [
                { data: 'id', name: '' },
                { data: 'invoice_title', name: 'invoice_title' },
                { data: 'company', name: 'company' },
                { data: 'invoice_number', name: 'invoice_number' },
                { data: 'date', name: 'date' },
                { data: 'actions', name: '' }

            ],

            orderCellsTop: true,
            order: [[ 0, 'desc' ]],
            pageLength: 100,

                "language": {
                "search": "Rechercher :",
                "sProcessing":    "Traitement...",
                "sLengthMenu":    "Afficher _MENU_ prospects",
                "sZeroRecords":   "Aucun résultat trouvé",
                "sEmptyTable":    "Aucune donnée disponible dans ce tableau",
                "sInfo":          "_TOTAL_ prospects disponibles",
                "sInfoEmpty":     "Votre recherche ne correspond avec aucun résultat !",
                "sInfoFiltered":  "vous avez un total de _MAX_ prospects",
                "sInfoPostFix":   "",
                "sUrl":           "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Mise en charge...",
                "oPaginate": {
                    "sFirst":    "Premier",
                    "sLast":    "Dernier",
                    "sNext":    "Prochain",
                    "sPrevious": "Précédent"
                },
                "oAria": {
                    "sSortAscending":  ": Activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": Activer pour trier la colonne par ordre décroissant"
                }
            }
        });
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });

    });

</script>
@endsection
