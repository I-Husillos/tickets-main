@extends('layouts.user')

@section('title', __('frontoffice.tickets.list_title'))

@section('content')
@php
$breadcrumbs = [
    ['label' => __('general.home'), 'url' => route('user.dashboard', ['locale' => app()->getLocale()])],
    ['label' => __('frontoffice.tickets.list_title')]
];
@endphp

<div class="container-fluid mt-3">

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Cerrar') }}">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Card principal -->
    <div class="card">
        <div class="card-header bg-info text-white">
            <div class="d-flex justify-content-between align-items-center w-100 flex-wrap">
                <h3 class="card-title m-0">
                    <i class="fas fa-ticket-alt"></i>
                    {{ __('frontoffice.tickets.list_title') }}
                </h3>
                <a href="{{ route('user.tickets.create', ['locale' => app()->getLocale(), 'username' => Auth::user()->id]) }}"
                   class="btn btn-light text-dark mt-2 mt-md-0 shadow rounded-4">
                    <i class="fas fa-plus"></i> {{ __('frontoffice.tickets.create_button') }}
                </a>
            </div>
        </div>

        <div class="card-body">

            <!-- Filtros -->
            <div class="row mb-3">
                <div class="col-md-3 col-sm-6 mb-2">
                    <select id="filter-status" class="form-control">
                        <option value="">{{ __('frontoffice.tickets.table.status') }}: {{ __('general.all') }}</option>
                        <option value="new">{{ __('general.statuses.new') }}</option>
                        <option value="pending">{{ __('general.statuses.pending') }}</option>
                        <option value="in_progress">{{ __('general.statuses.in_progress') }}</option>
                        <option value="resolved">{{ __('general.statuses.resolved') }}</option>
                        <option value="closed">{{ __('general.statuses.closed') }}</option>
                    </select>
                </div>
                <div class="col-md-3 col-sm-6 mb-2">
                    <select id="filter-priority" class="form-control">
                        <option value="">{{ __('frontoffice.tickets.table.priority') }}: {{ __('general.all') }}</option>
                        <option value="low">{{ __('general.priorities.low') }}</option>
                        <option value="medium">{{ __('general.priorities.medium') }}</option>
                        <option value="high">{{ __('general.priorities.high') }}</option>
                        <option value="critical">{{ __('general.priorities.critical') }}</option>
                    </select>
                </div>
                <div class="col-md-3 col-sm-6 mb-2">
                    <select id="filter-type" class="form-control">
                        <option value="">{{ __('frontoffice.tickets.type') }}: {{ __('general.all') }}</option>
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
                <table id="tabla-tickets-usuario"
                    class="table table-hover table-striped table-bordered mb-0 dt-responsive"
                    data-api-url="{{ url('/api/user/tickets') }}"
                    data-locale="{{ app()->getLocale() }}">
                    <thead class="text-center bg-white font-weight-bold">
                        <tr>
                            <th class="align-middle text-left">{{ __('Título') }}</th>
                            <th class="align-middle">{{ __('Estado') }}</th>
                            <th class="align-middle">{{ __('Prioridad') }}</th>
                            <th class="align-middle">{{ __('Comentarios') }}</th>
                            <th class="align-middle">{{ __('Fecha') }}</th>
                            <th class="align-middle">{{ __('Acciones') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div> <!-- /.card -->

</div> <!-- /.container-fluid -->
@endsection
