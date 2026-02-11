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

        <div class="card-body p-0">
            <div class="table-responsive">
                <table id="tabla-tickets-usuario"
                    class="table table-hover table-striped table-bordered mb-0 dt-responsive nowrap"
                    data-api-url="{{ url('/api/user/tickets') }}"
                    data-locale="{{ app()->getLocale() }}">
                    <thead class="text-center bg-white font-weight-bold">
                        <tr>
                            <th>{{ __('Título') }}</th>
                            <th>{{ __('Estado') }}</th>
                            <th>{{ __('Prioridad') }}</th>
                            <th>{{ __('Comentarios') }}</th>
                            <th>{{ __('Fecha') }}</th>
                            <th>{{ __('Acciones') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div> <!-- /.card -->

</div> <!-- /.container-fluid -->
@endsection
