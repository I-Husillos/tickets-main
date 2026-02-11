<span class="badge badge-{{ 
    $ticket->priority === 'critical' ? 'danger' :
    ($ticket->priority === 'high' ? 'warning' :
    ($ticket->priority === 'medium' ? 'info' : 'secondary')) }}">
    {{ __('general.priorities.' . $ticket->priority) }}
</span>
