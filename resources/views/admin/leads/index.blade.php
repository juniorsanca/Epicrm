@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Lead management
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
                            <a href="{{ route('admin.leads.create') }}" class="btn btn-success">Add lead</a>
                        </div>
                    @endcan

                    @can('lead_management_export')
                          <div class="form-group" style="margin-left: 5px">
                            <a href="{{ route('admin.leads.export') }}" class="btn btn-dark">Export</a>
                        </div>
                    @endcan

                    @can('lead_management_import')
              <!--            <div class="form-group" style="margin-left: 5px">
                            <a href="{{ route('admin.leads.import') }}" class="btn btn-info">Import</a>
                        </div>
                    -->
                                <form method="POST"
                                  enctype="multipart/form-data"
                                  action="{{route('admin.leads.import')}}">
                                @csrf
                                <div class="d-flex form-group">
                                    <input class="form-control form-control-sm" name="import_file" id="formFileSm" type="file">
                                    <button type="submit" name="button" class="btn btn-secondary btn-sm" style="margin-left: 10px">Importer</button>
                                </div>
                            </form>
                    @endcan
                      </div>

                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable">
                        <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                client
                            </th>
                             <th>
                                company
                            </th>
                             <th>
                                coast
                            </th>
                             <th>
                                origin
                            </th>
                             <th>
                                state
                            </th>
                             <th>
                                email
                            </th>
                             <th>
                                phone
                            </th>
                            <th>
                                description
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
                { data: 'id', name: 'id' },
                { data: 'client', name: 'client' },
                { data: 'company', name: 'company' },
                { data: 'coast', name: 'coast' },
                { data: 'origin', name: 'origin' },
                { data: 'state', name: 'state' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'description', name: 'description' },
                { data: 'actions', name: '' }

            ],
            orderCellsTop: true,
            order: [[ 0, 'desc' ]],
            pageLength: 100,
        });
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });

    });

</script>
@endsection
