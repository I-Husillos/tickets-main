@extends('layouts.admin')

{{-- Título de la página para editar, obtenido de traducción --}}
@section('title', __('general.admin_types.edit_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_types.page_title'), 'url' => route('admin.types.index', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_types.edit_title')]
    ];
@endphp


<div class="container mt-4">
    <!-- Título del formulario de edición, usando parámetro para el nombre -->
    <h2>{{ __('general.admin_types.edit_heading', ['name' => $type->name]) }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.types.update', ['type' => $type->id, 'locale' => app()->getLocale()]) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group mt-3">
            <label for="name">{{ __('general.admin_types.name') }}</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $type->name) }}">
        </div>

        <div class="form-group mt-3">
            <label for="description">{{ __('general.admin_types.description') }}</label>
            <input type="text" name="description" class="form-control" value="{{ old('description', $type->description) }}">
        </div>

        <div class="mt-2">
            <button type="submit" class="btn btn-primary">{{ __('general.admin_types.update') }}</button>
            <a href="{{ route('admin.types.index', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">
                {{ __('general.admin_types.cancel') }}
            </a>
        </div>
    </form>
</div>
@endsection
