@extends('layouts.admin')

@section('title', __('general.admin_edit_admin.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_admins.page_title'), 'url' => route('admin.dashboard.list.admins', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_edit_admin.page_title')]
    ];
@endphp


<div class="container mt-5">
    <h2>{{ __('general.admin_edit_admin.heading') }}</h2>

    <form method="POST" action="{{ route('admin.admins.update', ['admin' => $admin->id, 'locale' => app()->getLocale()]) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('general.admin_edit_admin.label_name') }}</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $admin->name) }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('general.admin_edit_admin.label_email') }}</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $admin->email) }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">{{ __('general.admin_edit_admin.label_password') }}</label>
            <input type="password" class="form-control" name="password">
            <small class="text-muted">{{ __('general.admin_edit_admin.password_help') }}</small>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('general.admin_edit_admin.label_password_confirm') }}</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
            <small class="text-muted">{{ __('general.admin_edit_admin.password_confirm_help') }}</small>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="superadmin" class="form-check-input" id="superadmin"
                   {{ old('superadmin', $admin->superadmin) ? 'checked' : '' }}>
            <label for="superadmin" class="form-check-label">{{ __('general.admin_edit_admin.checkbox_superadmin') }}</label>
        </div>

        <button type="submit" class="btn btn-success">{{ __('general.admin_edit_admin.update_button') }}</button>
        <a href="{{ route('admin.dashboard.list.admins', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">{{ __('general.admin_edit_admin.cancel_button') }}</a>
    </form>
</div>
@endsection
