@can('delete', $comment)
<button 
    class="btn btn-danger btn-sm btn-delete-comment"
    data-id="{{ $comment->id }}"
    data-locale="{{ app()->getLocale() }}"
>
    <i class="fas fa-trash-alt"></i> {{ __('general.admin_ticket_details.delete') }}
</button>
@endcan
