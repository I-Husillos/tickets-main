<div class="modal fade" id="editAdminModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="edit-admin-form" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('general.admin_edit_admin.heading') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('general.close') }}">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <input type="hidden" name="id" id="edit-admin-id">

        <div class="form-group">
          <label for="edit-admin-name">{{ __('general.admin_edit_admin.label_name') }}</label>
          <input type="text" class="form-control" name="name" id="edit-admin-name">
        </div>

        <div class="form-group">
          <label for="edit-admin-email">{{ __('general.admin_edit_admin.label_email') }}</label>
          <input type="email" class="form-control" name="email" id="edit-admin-email">
        </div>

        <div class="form-group">
          <label for="edit-admin-password">{{ __('general.admin_edit_admin.label_password') }}</label>
          <input type="password" class="form-control" name="password" id="edit-admin-password">
          <small class="text-muted">{{ __('general.admin_edit_admin.password_help') }}</small>
        </div>

        <div class="form-group">
          <label for="edit-admin-password-confirmation">{{ __('general.admin_edit_admin.label_password_confirm') }}</label>
          <input type="password" class="form-control" name="password_confirmation" id="edit-admin-password-confirmation">
          <small class="text-muted">{{ __('general.admin_edit_admin.password_confirm_help') }}</small>
        </div>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">{{ __('general.admin_edit_admin.update_button') }}</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('general.admin_edit_admin.cancel_button') }}</button>
      </div>
    </form>
  </div>
</div>
