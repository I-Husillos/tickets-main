@extends('layouts.user')

@section('title', __('frontoffice.dashboard.title'))

@section('content')
@php
$breadcrumbs = [
    ['label' => __('general.home'), 'url' => route('user.dashboard', ['locale' => app()->getLocale()])],
    ['label' => __('frontoffice.dashboard.title')]
];
@endphp

<div class="container-fluid mt-3">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Cerrar') }}">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Card principal del Dashboard -->
    <div class="card">
        <div class="card-header bg-info text-white">
            <div class="d-flex justify-content-between align-items-center w-100 flex-wrap">
                <h3 class="card-title m-0">
                    {{ __('frontoffice.dashboard.ticket_list') }}
                </h3>
                <a href="{{ route('user.tickets.create', ['locale' => app()->getLocale()]) }}"
                   class="btn btn-light text-dark mt-2 mt-md-0">
                    <i class="fas fa-plus"></i> {{ __('frontoffice.dashboard.create_ticket') }}
                </a>
            </div>
        </div>

        <div class="card-body">
            <!-- Resumen General -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $openTickets }}</h3>
                            <p>{{ __('frontoffice.dashboard.open_tickets') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $resolvedTickets }}</h3>
                            <p>{{ __('frontoffice.dashboard.resolved_tickets') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check"></i>
                        </div>
                    </div>
                </div>
                <!-- Nota: bg-warning text-white para asegurar contraste si es amarillo AdminLTE -->
                <div class="col-md-4">
                    <div class="small-box bg-warning">
                        <div class="inner text-white">
                            <h3>{{ $pendingTickets }}</h3>
                            <p class="text-white">{{ __('frontoffice.dashboard.pending_tickets') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Últimos Tickets Modificados -->
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    {{ __('frontoffice.dashboard.latest_tickets') }}
                </div>
                <div class="card-body">
                    @if ($latestTickets->isEmpty())
                        <p class="text-muted">{{ __('frontoffice.tickets.no_tickets') }}</p>
                    @else
                        <ul class="list-group">
                            @foreach ($latestTickets as $ticket)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $ticket->title }}</span>
                                    <div class="btn-group">
                                        <a href="{{ route('user.tickets.show', ['locale' => app()->getLocale(), 'ticket' => $ticket->id]) }}"
                                           class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if ($ticket->status !== 'closed')
                                            <a href="{{ route('user.tickets.edit', ['locale' => app()->getLocale(), 'ticket' => $ticket->id]) }}"
                                            class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div> <!-- /.card-body -->
    </div> <!-- /.card -->
</div> <!-- /.container-fluid -->
@endsection
