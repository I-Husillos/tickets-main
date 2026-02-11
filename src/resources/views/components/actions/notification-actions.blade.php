<div class="btn-group btn-group-sm" role="group">
    {{-- Botón de marcar como leída o no leída --}}
    @if (!$notification->read_at)
        <button type="button"
                class="btn btn-outline-success mark-as-read"
                data-id="{{ $notification->id }}"
                data-guard="{{ $guard }}"
                title="{{ __('general.admin_notifications.mark_as_read') }}">
            <i class="fas fa-check"></i>
        </button>
    @else
        <button type="button"
                class="btn btn-outline-warning mark-as-unread"
                data-id="{{ $notification->id }}"
                data-guard="{{ $guard }}"
                title="{{ __('general.admin_notifications.mark_as_unread') }}">
            <i class="fas fa-times"></i>
        </button>
    @endif

    {{-- Botón para ver el contenido --}}
    <button type="button"
            class="btn btn-sm btn-outline-info show-notification"
            data-id="{{ $notification->id }}"
            data-guard="{{ $guard }}"
            title="{{ __('Ver detalle') }}">
        <i class="fas fa-eye"></i>
    </button>
</div>
