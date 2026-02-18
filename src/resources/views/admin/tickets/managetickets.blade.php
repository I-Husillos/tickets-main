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

    <!-- Card contenedora -->
    <div class="card">
        <div class="card-header bg-warning text-white d-flex justify-content-between align-items-center">
            <h3 class="card-title m-0">
                <i class="fas fa-tools"></i>
                {{ __('general.admin_ticket_manage.list_title') }}
            </h3>
            <!-- Aquí podrías añadir un botón si se necesitara -->
        </div>

        <div class="card-body">
            <!-- Resumen de Tickets -->
            <div class="row mb-4">
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning">
                            <i class="fas fa-ticket-alt"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('general.admin_dashboard.total_tickets') }}</span>
                            <span class="info-box-number">{{ $totalTickets }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success">
                            <i class="fas fa-ticket-alt"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('general.admin_dashboard.resolved_tickets') }}</span>
                            <span class="info-box-number">{{ $resolvedTickets }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger">
                            <i class="fas fa-ticket-alt"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('general.admin_dashboard.pending_tickets') }}</span>
                            <span class="info-box-number">{{ $pendingTickets }}</span>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Tabla de tickets -->
            <div class="table-responsive">
                <table id="tabla-tickets"
                    class="table table-hover table-striped table-bordered text-center"
                    data-api-url="{{ url('/api/admin/tickets') }}"
                    data-locale="{{ app()->getLocale() }}">
                    <thead class="text-center bg-white font-weight-bold">
                        <tr>
                            <th>{{ __('Título') }}</th>
                            <th>{{ __('Descripción') }}</th>
                            <th>{{ __('Estado') }}</th>
                            <th>{{ __('Prioridad') }}</th>
                            <th>{{ __('Tipo') }}</th>
                            <th>{{ __('Comentarios') }}</th>
                            <th>{{ __('Asignado a') }}</th>
                            <th>{{ __('Acciones') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection