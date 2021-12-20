@can($permissionPrefix . 'show')
  <a class=" btn-sm btn btn-outline-primary" href="{{ route('admin.' . $crudRoutePart . '.show', $row->id) }}">
        Voir
    </a>
@endcan

@can($permissionPrefix . 'edit')
<a class=" btn-sm btn btn-outline-info" href="{{ route('admin.' . $crudRoutePart . '.edit', $row->id) }}">
    Modifier
</a>
@endcan

@can($permissionPrefix . 'delete')
    @if ($crudRoutePart === 'tenants')
        <a class="btn btn-sm btn-info" href="{{ route('admin.tenants.suspend', $row->id) }}">
            @if ($row->is_suspended)
                Resume
            @else
                Suspend
            @endif
        </a>
    @endif

    <form action="{{ route('admin.' . $crudRoutePart . '.destroy', $row->id) }}" method="POST" onsubmit="return confirm('etes vous sûr de vouloir supprimer?');" style="display: inline-block;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="btn btn-outline-danger btn-sm" value="Supprimer">
    </form>
@endcan
