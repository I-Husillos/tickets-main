@extends('layouts.admin')

@section('title', __('general.admin_projects.confirm_delete_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_projects.page_title'), 'url' => route('admin.projects.index', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_projects.confirm_delete_title')]
    ];
@endphp

<div class="container-fluid mt-3">
    <div class="card border-danger">
        <div class="card-header bg-danger text-white">
            <h3 class="card-title m-0">
                <i class="fas fa-exclamation-triangle"></i> {{ __('general.admin_projects.confirm_delete_title') }}
            </h3>
        </div>
        <div class="card-body">
            <p>{{ __('general.admin_projects.confirm_delete_message', ['name' => $project->name]) }}</p>
            <p class="text-muted small">{{ __('general.admin_projects.confirm_delete_warning') }}</p>

            <form action="{{ route('admin.projects.destroy', ['locale' => app()->getLocale(), 'project' => $project]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash"></i> {{ __('general.admin_projects.delete') }}
                </button>
                <a href="{{ route('admin.projects.index', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">
                    {{ __('general.admin_projects.cancel') }}
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
