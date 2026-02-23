@extends('layouts.admin')

@section('title', __('general.admin_own_tickets.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_own_tickets.page_title')]
    ];
@endphp

<div class="container-fluid mt-3">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center w-100 flex-wrap">
                <h3 class="card-title m-0">
                    <i class="fas fa-clipboard-list"></i> {{ __('general.admin_own_tickets.list_title') }}
                </h3>
                <div>
                    <a href="{{ route('admin.my.tickets.create', ['locale' => app()->getLocale()]) }}"
                       class="btn btn-light text-dark mr-2">
                        <i class="fas fa-plus"></i> {{ __('general.admin_own_tickets.new_ticket') }}
                    </a>
                    <a href="{{ route('admin.manage.tickets', ['locale' => app()->getLocale()]) }}"
                       class="btn btn-light text-dark">
                        <i class="fas fa-th-large"></i> {{ __('general.admin_own_tickets.view_kanban') }}
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if($tickets->isEmpty())
                <p class="text-muted text-center py-4">{{ __('general.admin_own_tickets.no_tickets') }}</p>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle">
                        <thead class="thead-light text-center">
                            <tr>
                                <th>#</th>
                                <th>{{ __('general.admin_own_tickets.title') }}</th>
                                <th>{{ __('general.admin_own_tickets.status') }}</th>
                                <th>{{ __('general.admin_own_tickets.priority') }}</th>
                                <th>{{ __('general.admin_own_tickets.project') }}</th>
                                <th>{{ __('general.admin_own_tickets.tags') }}</th>
                                <th>{{ __('general.admin_own_tickets.created_at') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $ticket)
                            <tr>
                                <td class="text-center">{{ $ticket->id }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($ticket->title, 60) }}</td>
                                <td class="text-center">
                                    @include('components.badges.status', compact('ticket'))
                                </td>
                                <td class="text-center">
                                    @include('components.badges.priority', compact('ticket'))
                                </td>
                                <td class="text-center">
                                    @if($ticket->project)
                                        <span class="badge badge-secondary">
                                            {{ $ticket->project->name }}
                                        </span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @foreach($ticket->tags as $tag)
                                        <span class="badge badge-info">{{ $tag->name }}</span>
                                    @endforeach
                                </td>
                                <td class="text-center text-nowrap">
                                    {{ $ticket->created_at->format('d/m/Y H:i') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
