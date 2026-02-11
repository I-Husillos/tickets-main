<div class="btn-group" role="group">
    <button type="button"
            class="btn btn-sm btn-warning rounded-circle shadow btn-edit-user"
            data-id="{{ $user->id }}"
            data-name="{{ $user->name }}"
            data-email="{{ $user->email }}"
            data-toggle="tooltip"
            title="{{ __('Editar') }}">
        <i class="fas fa-edit"></i>
    </button>

    <button type="button"
            class="btn btn-sm btn-danger rounded-circle shadow btn-delete-user"
            data-id="{{ $user->id }}"
            data-name="{{ $user->name }}"
            data-toggle="tooltip"
            title="{{ __('Eliminar') }}">
        <i class="fas fa-trash-alt"></i>
    </button>
</div>
