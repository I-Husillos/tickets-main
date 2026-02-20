@extends('layouts.admin')

@section('title', __('general.admin_kanban.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_kanban.page_title')]
    ];
@endphp

<div class="container-fluid mt-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">
            <i class="fas fa-th-large mr-2"></i>{{ __('general.admin_kanban.page_title') }}
        </h4>
        <a href="{{ route('admin.my.tickets.create', ['locale' => app()->getLocale()]) }}"
           class="btn btn-primary">
            <i class="fas fa-plus"></i> {{ __('general.admin_kanban.new_ticket') }}
        </a>
    </div>

    {{-- Columnas de estado --}}
    <div class="row flex-nowrap overflow-auto pb-3">
        @foreach($statuses as $status)
        @php $columnTickets = $tickets[$status] ?? collect(); @endphp

        <div class="col-kanban">
            <div class="card">
                <div class="card-header bg-{{ $statusColors[$status] }} {{ in_array($status, ['new', 'in_progress']) ? 'text-dark' : 'text-white' }} py-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <strong>{{ __('general.' . $status) }}</strong>
                        <span class="badge badge-light text-dark">{{ $columnTickets->count() }}</span>
                    </div>
                </div>

                <div class="card-body p-2 kanban-column-body">
                    @forelse($columnTickets as $ticket)
                    <div class="card mb-2 shadow-sm">
                        <div class="card-body p-2">

                            {{-- Cabecera: Titulo del ticket + prioridad --}}
                            <div class="d-flex justify-content-between align-items-start mb-1">
                                <a href="{{ route('admin.view.ticket', ['locale' => app()->getLocale(), 'ticket' => $ticket]) }}"
                                   class="font-weight-bold text-dark small">
                                    {{ \Illuminate\Support\Str::limit($ticket->title, 55) }}
                                </a>
                                <span class="badge badge-{{ $priorityColors[$ticket->priority] ?? 'secondary' }} small">
                                    {{ ucfirst($ticket->priority) }}
                                </span>
                            </div>

                            {{-- Proyecto --}}
                            @if($ticket->project)
                            <div class="mb-1">
                                <span class="badge badge-secondary small">
                                    <i class="fas fa-project-diagram"></i> {{ $ticket->project->name }}
                                </span>
                            </div>
                            @endif

                            {{-- Etiquetas --}}
                            @if($ticket->tags->isNotEmpty())
                            <div class="mb-1">
                                @foreach($ticket->tags as $tag)
                                    <span class="badge badge-info small">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                            @endif

                            {{-- Asignado a / creador --}}
                            @if($ticket->user)
                            <div class="text-muted small">
                                <i class="fas fa-user"></i> {{ $ticket->user->name }}
                            </div>
                            @elseif($ticket->createdByAdmin)
                            <div class="text-muted small">
                                <i class="fas fa-user-shield"></i> {{ $ticket->createdByAdmin->name }}
                            </div>
                            @endif

                        </div>
                    </div>
                    @empty
                    <p class="text-muted text-center small py-3">—</p>
                    @endforelse
                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>
@endsection
