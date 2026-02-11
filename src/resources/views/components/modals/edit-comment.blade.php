<!-- MODAL DE EDICIÓN -->
<div class="modal fade" id="editModal{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $comment->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('user.ticket.comment.update', [
            'locale' => app()->getLocale(),
            'ticket' => $ticket->id,
            'comment' => $comment->id
        ]) }}">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="editModalLabel{{ $comment->id }}">
                        <i class="fas fa-edit"></i> {{ __('Editar Comentario') }}
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea class="form-control" name="message" rows="4" required>{{ old('message', $comment->message) }}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> {{ __('Cancelar') }}
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> {{ __('Guardar') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>