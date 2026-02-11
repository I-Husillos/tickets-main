<div class="modal fade" id="deleteAdminModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="delete-admin-form" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('general.admin_delete_admin.page_title') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('general.close') }}">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <input type="hidden" name="id" id="delete-admin-id">
        <p>{{ __('general.admin_delete_admin.confirmation') }} <strong id="delete-admin-name"></strong>?</p>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">{{ __('general.admin_delete_admin.confirm_button') }}</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('general.admin_delete_admin.cancel_button') }}</button>
      </div>
    </form>
  </div>
</div>
