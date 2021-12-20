@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Gestion des rôles
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @can('role_management_create')
                        <div class="form-group">
                            <a href="{{ route('admin.roles.create') }}" class="btn btn-success">Ajouter un rôle</a>
                        </div>
                    @endcan
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable">
                        <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Title
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
            ajax: "{{ route('admin.roles.index') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name: 'title' },
                { data: 'actions', name: '' }
            ],
            orderCellsTop: true,
            order: [[ 0, 'desc' ]],
            pageLength: 100,

                "language": {
                "search": "Rechercher :",
                "sProcessing":    "Traitement...",
                "sLengthMenu":    "Afficher _MENU_ rôles",
                "sZeroRecords":   "Aucun résultat trouvé",
                "sEmptyTable":    "Aucune donnée disponible dans ce tableau",
                "sInfo":          "_TOTAL_ rôle disponibles",
                "sInfoEmpty":     "Votre recherche ne correspond avec aucun résultat !",
                "sInfoFiltered":  "vous avez un total de _MAX_ rôles",
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
