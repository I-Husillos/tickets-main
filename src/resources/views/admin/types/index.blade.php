@extends('layouts.admin')

@section('title', __('general.admin_types.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_types.page_title')]
    ];
@endphp

<div class="container-fluid mt-3">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Cerrar') }}">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Card contenedora del índice -->
    <div class="card">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center w-100 flex-wrap">
                <h3 class="card-title m-0">
                    <i class="fas fa-list"></i> {{ __('general.admin_types.list_title') }}
                </h3>
                <a href="{{ route('admin.types.create', ['locale' => app()->getLocale()]) }}"
                   class="btn btn-light text-dark mt-2 mt-md-0">
                    <i class="fas fa-plus"></i> {{ __('general.admin_types.new_type') }}
                </a>
            </div>
        </div>

        <div class="card-body">
            <table id="tabla-types"
                class="table table-hover table-bordered text-center align-middle dt-responsive nowrap"
                data-api-url="{{ url('/api/admin/types') }}"
                data-locale="{{ app()->getLocale() }}">
                <thead class="text-center bg-white font-weight-bold">
                    <tr>
                        <th>{{ __('general.admin_types.name') }}</th>
                        <th>{{ __('general.admin_types.description') }}</th>
                        <th>{{ __('general.admin_types.actions') }}</th>
                    </tr>
                </thead>
            </table>
        </div> <!-- /.card-body -->
    </div> <!-- /.card -->

</div> <!-- /.container-fluid -->

@include('components.modals.edit-type-modal')
@include('components.modals.delete-type-modal')
@endsection
