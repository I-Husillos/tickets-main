@extends('layouts.admin')

{{-- Título de la página para crear un tipo --}}
@section('title', __('general.admin_types.create_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_types.page_title'), 'url' => route('admin.types.index', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_types.create_title')]
    ];
@endphp
<div class="container-fluid mt-3">
    <!-- Encabezado para la creación -->
    <h2>{{ __('general.admin_types.create_heading') }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ __('general.admin_types.create_error') }}
        </div>
    @endif

    <form id="create-type-form" action="/api/admin/types/store" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">{{ __('general.admin_types.name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">{{ __('general.admin_types.description') }}</label>
            <input type="text" name="description" class="form-control" value="{{ old('description') }}">
        </div>

        <button type="submit" class="btn btn-success">{{ __('general.admin_types.save') }}</button>
        <a href="{{ route('admin.types.index', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">
            {{ __('general.admin_types.cancel') }}
        </a>
    </form>
</div>
@endsection
