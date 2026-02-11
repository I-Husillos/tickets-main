<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="delete-user-form" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('¿Eliminar usuario?') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Cerrar') }}">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>{{ __('general.admin_delete_user.confirmation') }}<strong id="delete-user-name"></strong>?</p>
        <input type="hidden" id="delete-user-id">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">{{ __('Eliminar') }}</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancelar') }}</button>
      </div>
    </form>
  </div>
</div>
