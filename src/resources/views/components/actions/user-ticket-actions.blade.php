<div class="btn-group" role="group">
    <a href="{{ $showUrl }}" class="btn btn-info btn-sm">
        <i class="fas fa-eye"></i> {{ __('Ver') }}
    </a>

    @if ($ticket->status !== 'closed')
        <a href="{{ $editUrl }}" class="btn btn-warning btn-sm">
            <i class="fas fa-edit"></i> {{ __('Editar') }}
        </a>
    @endif

    <button class="btn btn-danger btn-sm btn-delete-user-ticket"
            data-id="{{ $ticket->id }}">
        <i class="fas fa-trash-alt"></i> {{ __('Eliminar') }}
    </button>
</div>
