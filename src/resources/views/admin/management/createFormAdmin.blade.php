@extends('layouts.admin')

@section('title', __('general.admin_create_admin.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_admins.page_title'), 'url' => route('admin.dashboard.list.admins', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_create_admin.page_title')]
    ];
@endphp


<div class="container mt-5">
    <h1 class="text-center mb-4">{{ __('general.admin_create_admin.heading') }}</h1>

    <form id="create-admin-form" action="/api/admin/admins/store" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('general.admin_create_admin.label_name') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('general.admin_create_admin.label_email') }}</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">{{ __('general.admin_create_admin.label_password') }}</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('general.admin_create_user.label_password_confirm') }}</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="superadmin" class="form-label">{{ __('general.admin_create_admin.label_superadmin') }}</label>
            <select class="form-select @error('superadmin') is-invalid @enderror" id="superadmin" name="superadmin">
                <option value="">{{ __('general.admin_create_admin.select_placeholder') }}</option>
                <option value="0" {{ old('superadmin') == '0' ? 'selected' : '' }}>{{ __('general.admin_create_admin.option_no') }}</option>
                <option value="1" {{ old('superadmin') == '1' ? 'selected' : '' }}>{{ __('general.admin_create_admin.option_yes') }}</option>
            </select>
            @error('superadmin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">{{ __('general.admin_create_admin.create_button') }}</button>
    </form>
    <div class="mt-4">
        <a href="{{ route('admin.dashboard.list.admins', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">{{ __('general.admin_create_admin.back_button') }}</a>
    </div>
</div>
@endsection
