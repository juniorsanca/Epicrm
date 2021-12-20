@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Gestion des notes
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @can('note_management_create')
                        <div class="form-group">
                            <a href="{{ route('admin.notes.create') }}" class="btn-sm btn btn-success">Ajouter une note</a>
                        </div>
                    @endcan
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable">
                        <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Asset
                            </th>
                            <th>
                                Note Text
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
            ajax: "{{ route('admin.notes.index') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'asset', name: 'asset' },
                { data: 'text', name: 'text' },
                { data: 'actions', name: '' }
            ],
            orderCellsTop: true,
            order: [[ 0, 'desc' ]],
            pageLength: 100,
                      "language": {
                "search": "Rechercher :",
                "sProcessing":    "Traitement...",
                "sLengthMenu":    "Afficher _MENU_ notes",
                "sZeroRecords":   "Aucun résultat trouvé",
                "sEmptyTable":    "Aucune donnée disponible dans ce tableau",
                "sInfo":          "_TOTAL_ note disponibles",
                "sInfoEmpty":     "Votre recherche ne correspond avec aucun résultat !",
                "sInfoFiltered":  "vous avez un total de _MAX_ notes",
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
