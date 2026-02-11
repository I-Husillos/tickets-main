@php
    $isRead = $notification->read_at !== null;
    $isAdmin = $context === 'admin';
@endphp

<div class="list-group-item {{ $isRead ? 'list-group-item-light' : 'list-group-item-info' }}">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <strong>{{ $notification->data['message'] }}</strong><br>
            <small>{{ $notification->created_at->format('d/m/Y H:i') }}</small>
        </div>

        <div class="btn-group">
            <button
                type="button"
                class="btn btn-sm btn-outline-info show-notification"
                data-id="{{ $notification->id }}"
                data-guard="admin"
                data-locale="{{ app()->getLocale() }}"
            >
                <i class="fas fa-eye"></i>
            </button>


            @if (! $isRead)
                <form action="{{ route($isAdmin ? 'admin.notifications.read' : 'user.notifications.read', ['locale' => app()->getLocale(), 'notification' => $notification->id]) }}"
                    method="POST" style="display:inline;" onclick="event.stopPropagation()">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-sm btn-outline-success">
                        <i class="fas fa-check-circle"></i>
                        {{ $isAdmin ? __('general.admin_notifications.mark_as_read') : __('frontoffice.mark_as_read') }}
                    </button>
                </form>
            @endif

            @if ($isRead)
                <form action="{{ route($isAdmin ? 'admin.notifications.unread' : 'user.notifications.unread', ['locale' => app()->getLocale(), 'notification' => $notification->id]) }}"
                    method="POST" style="display:inline;" onclick="event.stopPropagation()">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-sm btn-outline-warning">
                        <i class="fas fa-undo"></i>
                        {{ $isAdmin ? __('general.admin_notifications.mark_as_unread') : __('frontoffice.mark_as_unread') }}
                    </button>
                </form>
            @endif

        </div>
    </div>
</div>
