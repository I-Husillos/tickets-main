<!-- Modal para comentar -->
<div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="commentModalLabel">{{ __('Agregar Comentario') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="comment-form" method="POST" action="{{ route('user.tickets.comment', ['locale' => app()->getLocale(), 'ticket' => $ticket->id]) }}">
                @csrf
                <div class="modal-body">
                    <textarea name="message" id="comment-body" class="form-control" rows="4" placeholder="Escribe tu comentario..."></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cerrar') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Guardar Comentario') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>