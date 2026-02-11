<div class="btn-group" role="group">
  <button type="button"
          class="btn btn-sm btn-warning rounded-circle shadow btn-edit-admin"
          data-id="{{ $admin->id }}"
          data-name="{{ $admin->name }}"
          data-email="{{ $admin->email }}"
          title="{{ __('Editar') }}">
    <i class="fas fa-edit"></i>
  </button>

  <button type="button"
          class="btn btn-sm btn-danger rounded-circle shadow btn-delete-admin"
          data-id="{{ $admin->id }}"
          data-name="{{ $admin->name }}"
          title="{{ __('Eliminar') }}">
    <i class="fas fa-trash-alt"></i>
  </button>
</div>
