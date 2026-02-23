@extends('layouts.admin')

@section('title', __('general.admin_projects.create_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_projects.page_title'), 'url' => route('admin.projects.index', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_projects.create_title')]
    ];
@endphp

<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title m-0">
                <i class="fas fa-plus"></i> {{ __('general.admin_projects.create_title') }}
            </h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.projects.store', ['locale' => app()->getLocale()]) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">{{ __('general.admin_projects.name') }} <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">{{ __('general.admin_projects.description') }}</label>
                    <input type="text" name="description" id="description"
                           class="form-control"
                           value="{{ old('description') }}">
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> {{ __('general.admin_projects.save') }}
                </button>
                <a href="{{ route('admin.projects.index', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">
                    {{ __('general.admin_projects.cancel') }}
                </a>
            </form>
        </div>
    </div>
</div>

@endsection
