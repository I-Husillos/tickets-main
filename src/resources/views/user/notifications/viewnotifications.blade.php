@extends('layouts.user')

@section('title', 'Mis Notificaciones')

@section('content')
@php
$breadcrumbs = [
    ['label' => __('general.home'), 'url' => route('user.dashboard', ['locale' => app()->getLocale()])],
    ['label' => __('frontoffice.notifications_title')]
];
@endphp

<div class="container-fluid mt-3">
    @if ($notifications->isEmpty())
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i> {{ __('No tienes notificaciones.') }}
        </div>
    @else
        <!-- Card contenedora -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center bg-info text-white">
                <h3 class="card-title m-0">
                    <i class="fas fa-bell"></i>
                    {{ __('frontoffice.notifications_title') }}
                </h3>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="tabla-notificaciones-usuario"
                        class="table table-bordered table-hover mb-0 dt-responsive nowrap"
                        data-api-url="{{ url('/api/user/notifications') }}"
                        data-locale="{{ app()->getLocale() }}">
                        <thead class="text-center bg-white font-weight-bold">
                            <tr>
                                <th>{{ __('Tipo') }}</th>
                                <th>{{ __('Contenido') }}</th>
                                <th>{{ __('Fecha') }}</th>
                                <th>{{ __('Acciones') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            @if ($notifications->hasPages())
                <div class="card-footer d-flex justify-content-center">
                    {{ $notifications->links('pagination::bootstrap-4') }}
                </div>
            @endif
        </div>

        <!-- Modales -->
        @push('modals')
            @include('components.modals.showNotifications', [
                'notifications' => $notifications,
                'guard' => 'user'
            ])
        @endpush
    @endif
</div>
@endsection
