@extends('layouts.admin')

@section('title', __('general.admin_create_user.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_users.page_title'), 'url' => route('admin.dashboard.list.users', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_create_user.page_title')]
    ];
@endphp

<div class="container-fluid mt-3">
    <h1 class="text-center mb-4">{{ __('general.admin_create_user.heading') }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">{{ __('general.admin_create_user.error_message') }}</div>
    @endif

    <form id="create-user-form" action="/api/admin/users/store" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('general.admin_create_user.label_name') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('general.admin_create_user.label_email') }}</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">{{ __('general.admin_create_user.label_password') }}</label>
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

        <button type="submit" class="btn btn-primary">{{ __('general.admin_create_user.create_button') }}</button>
    </form>
    <div class="mt-4">
        <a href="{{ route('admin.dashboard.list.users', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">{{ __('general.admin_create_user.back_button') }}</a>
    </div>
</div>


@endsection

