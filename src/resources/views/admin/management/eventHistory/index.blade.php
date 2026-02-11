@extends('layouts.admin')

@section('title', __('general.admin_history_events.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_history_events.page_title')]
    ];
@endphp

<div class="container-fluid mt-3">

    <!-- Card principal -->
    <div class="card">
        <div class="card-header bg-dark text-white">
            <div class="d-flex justify-content-between align-items-center w-100 flex-wrap">
                <h3 class="card-title m-0">
                    <i class="fas fa-history"></i> {{ __('general.admin_history_events.page_title') }}
                </h3>
                <!-- Si quieres un botón futuro para exportar -->
                {{-- <a href="#" class="btn btn-light text-dark mt-2 mt-md-0">
                    <i class="fas fa-file-export"></i> {{ __('Exportar') }}
                </a> --}}
            </div>
        </div>

        <div class="card-body pb-3">
            <div class="table-responsive">
                <table id="tabla-eventos"
                    class="table table-striped table-bordered text-center mb-3 dt-responsive nowrap"
                    data-api-url="{{ url('/api/admin/historyEvents') }}"
                    data-locale="{{ app()->getLocale() }}">
                    <thead class="text-center bg-white font-weight-bold">
                        <tr>
                            <th>{{ __('general.admin_history_events.table.header_event_type') }}</th>
                            <th>{{ __('general.admin_history_events.table.header_description') }}</th>
                            <th>{{ __('general.admin_history_events.table.header_user') }}</th>
                            <th>{{ __('general.admin_history_events.table.header_date') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div> <!-- /.card -->

</div> <!-- /.container-fluid -->
@endsection
