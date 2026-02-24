@extends('layouts.admin')

@section('title', __('general.admin_admins.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_admins.page_title')]
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

    <!-- Card principal -->
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <div class="d-flex justify-content-between align-items-center flex-wrap w-100">
                <h3 class="card-title m-0">
                    <i class="fas fa-user-shield"></i> {{ __('general.admin_admins.list_title') }}
                </h3>
                <a href="{{ route('admin.admins.create', ['locale' => app()->getLocale()]) }}"
                class="btn btn-light text-dark mt-2 mt-md-0 shadow rounded-4">
                    <i class="fas fa-user-plus"></i> {{ __('general.admin_admins.create_button') }}
                </a>
            </div>
        </div>


        <div class="card-body">
            <div class="table-responsive">
                <table id="tabla-admins"
                    class="table table-hover table-striped table-bordered mb-0 dt-responsive"
                    data-api-url="{{ url('/api/admin/admins') }}"
                    data-locale="{{ app()->getLocale() }}">
                    <thead class="text-center bg-white font-weight-bold">
                        <tr>
                            <th class="align-middle">{{ __('general.admin_admins.table_name') }}</th>
                            <th class="align-middle">{{ __('general.admin_admins.table_email') }}</th>
                            <th class="align-middle">{{ __('general.admin_admins.table_actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div> <!-- /.card -->

    <!-- Modales de edición y eliminación -->
    @include('components.modals.edit-admin-modal')
    @include('components.modals.delete-admin-modal')

</div> <!-- /.container-fluid -->
@endsection
