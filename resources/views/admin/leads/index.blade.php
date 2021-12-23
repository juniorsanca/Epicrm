@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Liste des opportunités
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="d-flex">
                    @can('lead_management_create')
                    <div class="form-group">
                            <a href="{{ route('admin.leads.create') }}" class="btn btn-outline-success btn-sm">Ajouter</a>
                        </div>
                    @endcan

                    @can('lead_management_export')
                          <div class="form-group" style="margin-left: 5px">
                            <a href="{{ route('admin.leads.export') }}" class="btn btn-outline-dark btn-sm">Exporter</a>
                        </div>
                    @endcan

                    @can('lead_management_import')
                    <div class="form-group">
                            <form method="POST"
                                  enctype="multipart/form-data"
                                  action="{{route('admin.leads.import')}}">
                                @csrf
                                <div class="mb-3 d-flex form-group">
                                    <input class="form-control form-control-sm" name="import_file" id="formFileSm" type="file" style="margin-left: 10px">
                                    <button type="submit" name="button" class="btn btn-outline-primary btn-sm" style="margin-left: 10px;">Importer </button>
                                </div>
                            </form>
                        </div>
                    @endcan

                      </div>
                    <table class="table table-bordered table-striped table-hover ajaxTable datatable">
                        <thead>
                        <tr>
                            <th>
                                Date
                            </th>
                            <th>
                                Client
                            </th>
                             <th>
                                Entreprise
                            </th>
                             <th>
                                Montant
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
            ajax: "{{ route('admin.leads.index') }}",
            columns: [
                { data: 'date', name: 'date' },
                { data: 'client', name: 'client' },
                { data: 'company', name: 'company' },
                { data: 'coast', name: 'coast' },
                //{ data: 'user.name'},
                //{ data: 'states.title' },
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
