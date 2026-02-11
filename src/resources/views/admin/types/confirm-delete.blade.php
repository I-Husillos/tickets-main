@extends('layouts.admin')

{{-- Título de la página para confirmar la eliminación --}}
@section('title', __('general.admin_types.confirm_deletion_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_types.page_title'), 'url' => route('admin.types.index', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_types.confirm_deletion_title')]
    ];
@endphp


<div class="container mt-5">
    <!-- Encabezado de confirmación -->
    <h2>{{ __('general.admin_types.confirm_deletion_heading') }}</h2>

    <!-- Mensaje de confirmación, se pasa el nombre del tipo como parámetro -->
    <p>{{ __('general.admin_types.confirm_deletion_message', ['name' => $type->name]) }}</p>

    <form method="POST" action="{{ route('admin.types.destroy', ['type' => $type->id, 'locale' => app()->getLocale()]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            {{ __('general.admin_types.confirm_deletion_yes') }}
        </button>
        <a href="{{ route('admin.types.index', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">
            {{ __('general.admin_types.cancel') }}
        </a>
    </form>
</div>
@endsection
