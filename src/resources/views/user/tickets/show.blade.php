@extends('layouts.user')

@section('title', __('frontoffice.tickets.detail_tiket'))

@section('content')
@php 
$breadcrumbs = [
    ['label' => __('general.home'), 'url' => route('user.dashboard', ['locale' => app()->getLocale()])],
    ['label' => __('frontoffice.tickets.list_title'), 'url' => route('user.tickets.index', ['locale' => app()->getLocale()])],
    ['label' => __('frontoffice.tickets.detail_tiket')]
];
@endphp


<div class="container-fluid mt-3">

    {{-- Flash Messages --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle"></i> <strong>Existen errores de validación:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Fila principal: Información y comentario -->
    <div class="row">

        <!-- Información del Ticket -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4>{{ __('frontoffice.tickets.detail_tiket') }}</h4>
                </div>
                <div class="card-body">
                    <p><strong>{{ __('frontoffice.tickets.title') }}:</strong> {{ $ticket->title }}</p>
                    <p><strong>{{ __('frontoffice.tickets.description') }}:</strong> {{ $ticket->description }}</p>
                    <p><strong>{{ __('frontoffice.tickets.type') }}:</strong> {{ ucfirst($ticket->type) }}</p>
                    <p><strong>{{ __('frontoffice.tickets.priority') }}:</strong> {{ ucfirst($ticket->priority) }}</p>
                    <p><strong>{{ __('frontoffice.tickets.status') }}:</strong> 
                        <span class="badge 
                            @if($ticket->status === 'new') badge-primary 
                            @elseif($ticket->status === 'resolved') badge-success 
                            @elseif($ticket->status === 'closed') badge-dark 
                            @elseif($ticket->status === 'pending') badge-warning 
                            @else badge-secondary 
                            @endif">
                            {{ ucfirst($ticket->status) }}
                        </span>
                    </p>
                    <p><strong>{{ __('frontoffice.tickets.created_at') }}:</strong> {{ $ticket->created_at->format('d/m/Y') }}</p>
                </div>
            </div>

            @if ($ticket->status === 'resolved')
                <div class="alert alert-info">
                    <h5><i class="icon fas fa-info"></i> {{ __('Validación requerida') }}</h5>
                    {{ __('Por favor, confirme si la solución aplicada por el administrador ha resuelto su incidencia.') }}
                </div>
                <form method="POST" action="{{ route('user.tickets.validate', ['locale' => app()->getLocale(), 'ticket' => $ticket->id]) }}" class="text-center mb-4">
                    @csrf
                    <button type="submit" name="status" value="closed" class="btn btn-success btn-lg mx-2">
                        <i class="fas fa-check"></i> {{ __('frontoffice.tickets.validate') }}
                    </button>
                    <button type="submit" name="status" value="pending" class="btn btn-danger btn-lg mx-2">
                        <i class="fas fa-times"></i> {{ __('frontoffice.tickets.unvalidate') }}
                    </button>
                </form>
            @elseif ($ticket->status === 'closed')
                <div class="alert alert-success text-center mb-4">
                    <h5><i class="icon fas fa-check-circle"></i> {{ __('Ticket Validado y Cerrado') }}</h5>
                    <p>{{ __('Has validado la solución correctamente. El ticket se encuentra cerrado.') }}</p>
                </div>
            @endif
        </div>

        <!-- Formulario de Comentario -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-secondary text-white">
                    <h4>{{ __('frontoffice.tickets.add_comment_heading') }}</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.tickets.comment', ['locale' => app()->getLocale(), 'ticket' => $ticket]) }}">
                        @csrf
                        <div class="form-group">
                            <textarea 
                                name="message" 
                                class="form-control" 
                                rows="4" 
                                placeholder="{{ __('frontoffice.tickets.comment_placeholder') }}"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">{{ __('frontoffice.tickets.add_comment') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de Comentarios -->
    @if ($ticket->comments->isNotEmpty())
        <div class="card">
            <div class="card-header bg-info text-white">
                <h4>{{ __('frontoffice.tickets.comment') }}</h4>
            </div>
            <div class="card-body p-0">
                <div class="timeline">
                    @foreach ($ticket->comments as $comment)
                        <div class="time-label">
                            <span class="bg-secondary">
                                {{ $comment->created_at->format('d M Y') }}
                            </span>
                        </div>
                        <div>
                            <i class="fas fa-comment bg-info"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> {{ $comment->created_at->format('H:i') }}</span>
                                <h3 class="timeline-header">
                                    <strong>{{ $comment->author->name }}</strong>
                                </h3>
                                <div class="timeline-body">
                                    {{ $comment->message }}
                                </div>
                                <div class="timeline-footer text-right">
                                    <!-- Editar -->
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal{{ $comment->id }}">
                                        <i class="fas fa-edit"></i> {{ __('Editar') }}
                                    </button>
                                    <!-- Eliminar -->
                                    <form 
                                        method="POST" 
                                        action="{{ route('user.ticket.comment.delete', [
                                            'locale' => app()->getLocale(), 
                                            'ticket' => $ticket->id,
                                            'comment' => $comment->id
                                        ]) }}" 
                                        style="display:inline"
                                        onsubmit="return confirm('{{ __('¿Eliminar este comentario?') }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> {{ __('Eliminar') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @push('modals')
                            @include('components.modals.edit-comment', ['comment' => $comment, 'ticket' => $ticket])
                        @endpush
                    @endforeach
                    <div><i class="far fa-clock bg-gray"></i></div>
                </div>
            </div>
        </div>
    @endif
</div>

@endsection




