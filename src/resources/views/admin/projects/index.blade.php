@extends('layouts.admin')

@section('title', __('general.admin_projects.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_projects.page_title')]
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
                    <i class="fas fa-project-diagram"></i> {{ __('general.admin_projects.list_title') }}
                </h3>
                <a href="{{ route('admin.projects.create', ['locale' => app()->getLocale()]) }}"
                   class="btn btn-light text-dark mt-2 mt-md-0">
                    <i class="fas fa-plus"></i> {{ __('general.admin_projects.new_project') }}
                </a>
            </div>
        </div>

        <div class="card-body">
            @if($projects->isEmpty())
                <p class="text-muted text-center py-4">{{ __('general.admin_projects.no_projects') }}</p>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-bordered text-center align-middle">
                        <thead class="thead-light">
                            <tr>
                                <th>{{ __('general.admin_projects.name') }}</th>
                                <th>{{ __('general.admin_projects.description') }}</th>
                                <th>{{ __('general.admin_projects.color') }}</th>
                                <th>{{ __('general.admin_projects.owner') }}</th>
                                <th>{{ __('general.admin_projects.tickets_count') }}</th>
                                <th>{{ __('general.admin_projects.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                            <tr>
                                <td>
                                    <span class="badge badge-secondary">
                                        {{ $project->name }}
                                    </span>
                                </td>
                                <td>{{ $project->description ?? '-' }}</td>
                                <td class="text-monospace">{{ $project->color }}</td>
                                <td>{{ $project->admin->name ?? '-' }}</td>
                                <td>{{ $project->tickets->count() }}</td>
                                <td>
                                    <a href="{{ route('admin.projects.edit', ['locale' => app()->getLocale(), 'project' => $project]) }}"
                                       class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.projects.confirm-delete', ['locale' => app()->getLocale(), 'project' => $project]) }}"
                                       class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
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
