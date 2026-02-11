<span class="badge badge-{{ 
    $ticket->status === 'new' ? 'primary' :
    ($ticket->status === 'resolved' ? 'success' :
    ($ticket->status === 'closed' ? 'secondary' : 'warning')) }}">
    {{ __('general.statuses.' . $ticket->status) }}
</span>
