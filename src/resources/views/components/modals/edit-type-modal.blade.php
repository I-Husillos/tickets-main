<div class="modal fade" id="editTypeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="edit-type-form" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('general.admin_types.edit_title') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Cerrar') }}">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <input type="hidden" name="id" id="edit-type-id">

        <div class="form-group">
          <label for="edit-type-name">{{ __('general.admin_types.name') }}</label>
          <input type="text" name="name" id="edit-type-name" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="edit-type-description">{{ __('general.admin_types.description') }}</label>
          <input type="text" name="description" id="edit-type-description" class="form-control">
        </div>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">
          {{ __('general.admin_types.update') }}
        </button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          {{ __('general.admin_types.cancel') }}
        </button>
      </div>
    </form>
  </div>
</div>
