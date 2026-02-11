<div class="modal fade" id="deleteTypeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="delete-type-form" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('general.admin_types.confirm_deletion_title') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Cerrar') }}">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <input type="hidden" id="delete-type-id">
        <p>{{ __('general.admin_types.confirm_deletion_message') }}<strong id="delete-type-name"></strong>?</p>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">
          {{ __('general.admin_types.confirm_deletion_yes') }}
        </button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          {{ __('general.admin_types.cancel') }}
        </button>
      </div>
    </form>
  </div>
</div>


