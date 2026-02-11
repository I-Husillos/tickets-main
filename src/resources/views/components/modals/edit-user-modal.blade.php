<div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="edit-user-form" class="modal-content" data-user-id="">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('general.admin_edit_user.heading') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('general.close') }}">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="edit-user-id">

        <div class="form-group">
          <label for="edit-user-name">{{ __('general.admin_edit_user.label_name') }}</label>
          <input type="text" class="form-control" name="name" id="edit-user-name">
        </div>

        <div class="form-group">
          <label for="edit-user-email">{{ __('general.admin_edit_user.label_email') }}</label>
          <input type="email" class="form-control" name="email" id="edit-user-email">
        </div>

        <div class="form-group">
          <label for="edit-user-password">{{ __('general.admin_edit_user.label_password') }}</label>
          <input type="password" class="form-control" name="password" id="edit-user-password">
          <small class="text-muted">{{ __('general.admin_edit_user.password_help') }}</small>
        </div>

        <div class="form-group">
          <label for="edit-user-password-confirmation">{{ __('general.admin_edit_user.label_password_confirm') }}</label>
          <input type="password" class="form-control" name="password_confirmation" id="edit-user-password-confirmation">
          <small class="text-muted">{{ __('general.admin_edit_user.password_confirm_help') }}</small>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">{{ __('general.admin_edit_user.update_button') }}</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('general.admin_edit_user.cancel_button') }}</button>
      </div>
    </form>
  </div>
</div>


