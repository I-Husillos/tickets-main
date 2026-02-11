@extends('layouts.admin')

@section('title', __('general.admin_users.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_users.page_title')]
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
                    <i class="fas fa-users-cog"></i> {{ __('general.admin_users.list_title') }}
                </h3>
                <a href="{{ route('admin.users.create', ['locale' => app()->getLocale()]) }}"
                   class="btn btn-light text-dark mt-2 mt-md-0 shadow rounded-4">
                    <i class="fas fa-user-plus"></i> {{ __('general.admin_users.create_button') }}
                </a>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table id="tabla-usuarios"
                    class="table table-hover table-striped table-bordered mb-0 dt-responsive nowrap" 
                    data-api-url="{{ url('/api/admin/users') }}"
                    data-locale="{{ app()->getLocale() }}">

                    <thead class="text-center bg-white font-weight-bold">
                        <tr>
                            <th>{{ __('general.admin_users.table_name') }}</th>
                            <th>{{ __('general.admin_users.table_email') }}</th>
                            <th>{{ __('general.admin_users.table_actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div> <!-- /.card -->

    @include('components.modals.edit-user-modal')
    @include('components.modals.delete-user-modal')

</div> <!-- /.container-fluid -->
@endsection
