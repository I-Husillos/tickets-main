<div class="btn-group" role="group">
    <button type="button"
            class="btn btn-sm btn-warning rounded-circle shadow btn-edit-type"
            data-id="{{ $type->id }}"
            data-name="{{ $type->name }}"
            data-description="{{ $type->description }}"
            data-toggle="tooltip"
            title="{{ __('Editar') }}">
        <i class="fas fa-edit"></i>
    </button>

    <button type="button"
            class="btn btn-sm btn-danger rounded-circle shadow btn-delete-type"
            data-id="{{ $type->id }}"
            data-name="{{ $type->name }}"
            data-toggle="tooltip"
            title="{{ __('Eliminar') }}">
        <i class="fas fa-trash-alt"></i>
    </button>
</div>
