@extends('layouts.admin')

@section('title', __('general.admin_own_tickets.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_own_tickets.page_title')]
    ];
@endphp

<div class="container-fluid mt-3">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center w-100 flex-wrap">
                <h3 class="card-title m-0">
                    <i class="fas fa-clipboard-list"></i> {{ __('general.admin_own_tickets.list_title') }}
                </h3>
                <div>
                    <a href="{{ route('admin.my.tickets.create', ['locale' => app()->getLocale()]) }}"
                       class="btn btn-light text-dark mr-2">
                        <i class="fas fa-plus"></i> {{ __('general.admin_own_tickets.new_ticket') }}
                    </a>
                    <a href="{{ route('admin.manage.tickets', ['locale' => app()->getLocale()]) }}"
                       class="btn btn-light text-dark">
                        <i class="fas fa-th-large"></i> {{ __('general.admin_own_tickets.view_kanban') }}
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">

            <!-- Filtros -->
            <div class="row mb-3">
                <div class="col-md-3 col-sm-6 mb-2">
                    <select id="filter-status-my" class="form-control">
                        <option value="">{{ __('general.admin_own_tickets.status') }}: {{ __('general.all') }}</option>
                        <option value="new">{{ __('general.statuses.new') }}</option>
                        <option value="pending">{{ __('general.statuses.pending') }}</option>
                        <option value="in_progress">{{ __('general.statuses.in_progress') }}</option>
                        <option value="resolved">{{ __('general.statuses.resolved') }}</option>
                        <option value="closed">{{ __('general.statuses.closed') }}</option>
                    </select>
                </div>
                <div class="col-md-3 col-sm-6 mb-2">
                    <select id="filter-priority-my" class="form-control">
                        <option value="">{{ __('general.admin_own_tickets.priority') }}: {{ __('general.all') }}</option>
                        <option value="low">{{ __('general.priorities.low') }}</option>
                        <option value="medium">{{ __('general.priorities.medium') }}</option>
                        <option value="high">{{ __('general.priorities.high') }}</option>
                        <option value="critical">{{ __('general.priorities.critical') }}</option>
                    </select>
                </div>
                <div class="col-md-3 col-sm-6 mb-2">
                    <button id="clear-filters-my" class="btn btn-secondary btn-block">
                        <i class="fas fa-times"></i> {{ __('general.reset_filters') }}
                    </button>
                </div>
            </div>

            @if($tickets->isEmpty())
                <p class="text-muted text-center py-4">{{ __('general.admin_own_tickets.no_tickets') }}</p>
            @else
                <div class="table-responsive">
                    <table id="tabla-my-tickets" class="table table-hover table-striped table-bordered align-middle dt-responsive">
                        <thead class="thead-light text-center">
                            <tr>
                                <th>#</th>
                                <th>{{ __('general.admin_own_tickets.title') }}</th>
                                <th>{{ __('general.admin_own_tickets.status') }}</th>
                                <th>{{ __('general.admin_own_tickets.priority') }}</th>
                                <th>{{ __('general.admin_own_tickets.project') }}</th>
                                <th>{{ __('general.admin_own_tickets.tags') }}</th>
                                <th>{{ __('general.admin_own_tickets.created_at') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $ticket)
                            <tr data-status="{{ $ticket->status }}" data-priority="{{ $ticket->priority }}">
                                <td class="text-center">{{ $ticket->id }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($ticket->title, 60) }}</td>
                                <td class="text-center">
                                    @include('components.badges.status', compact('ticket'))
                                </td>
                                <td class="text-center">
                                    @include('components.badges.priority', compact('ticket'))
                                </td>
                                <td class="text-center">
                                    @if($ticket->project)
                                        <span class="badge badge-secondary">
                                            {{ $ticket->project->name }}
                                        </span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @foreach($ticket->tags as $tag)
                                        <span class="badge badge-info">{{ $tag->name }}</span>
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    {{ $ticket->created_at->format('d/m/Y H:i') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var table = $('#tabla-my-tickets').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        responsive: {
            details: {
                type: 'inline',
                target: 'tr'
            }
        },
        autoWidth: false,
        order: [[6, 'desc']],
        columnDefs: [
            { responsivePriority: 1, targets: 1 },
            { responsivePriority: 2, targets: 2 },
            { responsivePriority: 3, targets: 3 },
            { responsivePriority: 4, targets: 6 },
            { responsivePriority: 100, targets: 0 },
            { responsivePriority: 101, targets: 4 },
            { responsivePriority: 102, targets: 5 },
        ],
    });

    // Custom filtering by status and priority data attributes
    $.fn.DataTable.ext.search.push(function (settings, data, dataIndex) {
        if (settings.nTable.id !== 'tabla-my-tickets') return true;

        var statusFilter   = $('#filter-status-my').val();
        var priorityFilter = $('#filter-priority-my').val();
        var row = table.row(dataIndex).node();

        if (!row) return true;

        var rowStatus   = $(row).data('status') || '';
        var rowPriority = $(row).data('priority') || '';

        if (statusFilter   && rowStatus   !== statusFilter)   return false;
        if (priorityFilter && rowPriority !== priorityFilter) return false;

        return true;
    });

    $('#filter-status-my, #filter-priority-my').on('change', function () {
        table.draw();
    });

    $('#clear-filters-my').on('click', function () {
        $('#filter-status-my, #filter-priority-my').val('');
        table.search('').draw();
    });
});
</script>
@endpush
@endsection
