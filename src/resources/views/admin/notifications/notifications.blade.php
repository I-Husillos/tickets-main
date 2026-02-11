@extends('layouts.admin')

@section('title', __('general.admin_notifications.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_notifications.page_title')]
    ];
@endphp

<div class="container-fluid mt-3">

    {{-- Alertas de éxito o error --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Cerrar') }}">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Cerrar') }}">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Card contenedora -->
    <div class="card">
        <div class="card-header bg-info text-white">
            <div class="d-flex justify-content-between align-items-center w-100 flex-wrap">
                <h3 class="card-title m-0">
                    <i class="fas fa-bell"></i> {{ __('general.admin_notifications.list_title') }}
                </h3>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table id="tabla-notificaciones-admin"
                    class="table table-hover table-striped table-bordered mb-0 dt-responsive nowrap"
                    data-api-url="{{ url('/api/admin/notifications') }}"
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
    </div> <!-- /.card -->

    {{-- Incluir modal dinámico --}}
    @include('components.modals.admin_notifications', [
        'notifications' => $notifications,
        'guard' => 'admin'
    ])

</div> <!-- /.container-fluid -->
@endsection
