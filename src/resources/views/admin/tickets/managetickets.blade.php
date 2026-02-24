@extends('layouts.admin')

@section('title', __('general.admin_ticket_manage.page_title'))

@section('admincontent')
@php
$breadcrumbs = [
['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
['label' => __('general.admin_ticket_manage.page_title')]
];
@endphp

<div class="container-fluid mt-3">

    {{-- Toggle tabla / kanban --}}
    <div class="d-flex justify-content-end mb-2">
        <div class="btn-group btn-group-sm" role="group" id="view-toggle">
            <button type="button" class="btn btn-secondary active" id="btn-view-table" title="Table">
                <i class="fas fa-list"></i>
            </button>
            <button type="button" class="btn btn-secondary" id="btn-view-kanban" title="{{ __('general.admin_kanban.page_title') }}">
                <i class="fas fa-columns"></i>
            </button>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-warning text-white">
            <h3 class="card-title m-0">
                <i class="fas fa-tools"></i>
                {{ __('general.admin_ticket_manage.list_title') }}
            </h3>
        </div>

        <div class="card-body">

            {{-- ===== VISTA TABLA ===== --}}
            <div id="view-section-table">

                <div class="row mb-4">
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning"><i class="fas fa-ticket-alt"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('general.admin_dashboard.total_tickets') }}</span>
                                <span class="info-box-number">{{ $totalTickets }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="fas fa-ticket-alt"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('general.admin_dashboard.resolved_tickets') }}</span>
                                <span class="info-box-number">{{ $resolvedTickets }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3 col-sm-6 mb-2">
                        <select id="filter-status" class="form-control">
                            <option value="">{{ __('general.admin_ticket_manage.status_filter') }}: {{ __('general.all') }}</option>
                            <option value="new">{{ __('general.statuses.new') }}</option>
                            <option value="pending">{{ __('general.statuses.pending') }}</option>
                            <option value="in_progress">{{ __('general.statuses.in_progress') }}</option>
                            <option value="resolved">{{ __('general.statuses.resolved') }}</option>
                            <option value="closed">{{ __('general.statuses.closed') }}</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                        <select id="filter-priority" class="form-control">
                            <option value="">{{ __('general.admin_ticket_manage.priority_filter') }}: {{ __('general.all') }}</option>
                            <option value="low">{{ __('general.priorities.low') }}</option>
                            <option value="medium">{{ __('general.priorities.medium') }}</option>
                            <option value="high">{{ __('general.priorities.high') }}</option>
                            <option value="critical">{{ __('general.priorities.critical') }}</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                        <select id="filter-type" class="form-control">
                            <option value="">{{ __('general.admin_types.page_title') }}: {{ __('general.all') }}</option>
                            @foreach($types as $type)
                                <option value="{{ $type->name }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                        <button id="clear-filters" class="btn btn-secondary btn-block">
                            <i class="fas fa-times"></i> {{ __('general.reset_filters') }}
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="tabla-tickets"
                        class="table table-hover table-striped table-bordered mb-0 text-center dt-responsive"
                        data-api-url="{{ url('/api/admin/tickets') }}"
                        data-locale="{{ app()->getLocale() }}">
                        <thead class="text-center bg-white font-weight-bold">
                            <tr>
                                <th class="align-middle text-left">{{ __('Título') }}</th>
                                <th class="align-middle text-left">{{ __('Descripción') }}</th>
                                <th class="align-middle">{{ __('Estado') }}</th>
                                <th class="align-middle">{{ __('Prioridad') }}</th>
                                <th class="align-middle">{{ __('Tipo') }}</th>
                                <th class="align-middle">{{ __('Comentarios') }}</th>
                                <th class="align-middle">{{ __('Asignado a') }}</th>
                                <th class="align-middle">{{ __('Acciones') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>{{-- /view-section-table --}}

            {{-- ===== VISTA KANBAN ===== --}}
            <div id="view-section-kanban"
                 style="display:none;"
                 data-update-url="{{ route('admin.kanban', ['locale' => app()->getLocale()]) }}"
                 data-update-suffix="{{ app()->getLocale() === 'es' ? 'estado' : 'status' }}"
                 data-error-msg="{{ __('general.admin_kanban.update_error') }}">

                <div class="row flex-nowrap overflow-auto pb-3">
                    @foreach($statuses as $status)
                    @php $columnTickets = $kanbanTickets[$status] ?? collect(); @endphp

                    <div class="col-kanban">
                        <div class="card">
                            <div class="card-header bg-{{ $statusColors[$status] }} {{ in_array($status, ['new', 'in_progress']) ? 'text-dark' : 'text-white' }} py-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <strong>{{ __('general.' . $status) }}</strong>
                                    <span class="badge badge-light text-dark kanban-count">{{ $columnTickets->count() }}</span>
                                </div>
                            </div>

                            <div class="card-body p-2 kanban-column-body" data-status="{{ $status }}">
                                @forelse($columnTickets as $ticket)

                                <div class="card mb-2 shadow-sm kanban-card"
                                     draggable="true"
                                     data-ticket-id="{{ $ticket->id }}"
                                     data-status="{{ $status }}">
                                    <div class="card-body p-2">

                                        <div class="d-flex justify-content-between align-items-start mb-1">
                                            <a href="{{ route('admin.view.ticket', ['locale' => app()->getLocale(), 'ticket' => $ticket]) }}"
                                               class="font-weight-bold text-dark small">
                                                {{ \Illuminate\Support\Str::limit($ticket->title, 55) }}
                                            </a>
                                            <span class="badge badge-{{ $priorityColors[$ticket->priority] ?? 'secondary' }} small">
                                                {{ ucfirst($ticket->priority) }}
                                            </span>
                                        </div>

                                        @if($ticket->project)
                                        <div class="mb-1">
                                            <span class="badge badge-secondary small">
                                                <i class="fas fa-project-diagram"></i> {{ $ticket->project->name }}
                                            </span>
                                        </div>
                                        @endif

                                        @if($ticket->tags->isNotEmpty())
                                        <div class="mb-1">
                                            @foreach($ticket->tags as $tag)
                                                <span class="badge badge-info small">{{ $tag->name }}</span>
                                            @endforeach
                                        </div>
                                        @endif

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
                                <p class="text-muted text-center small py-3 kanban-empty">—</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>{{-- /view-section-kanban --}}

        </div>
    </div>
</div>

@endsection