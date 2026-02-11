@extends('layouts.admin')

@section('title', __('general.admin_delete_admin.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_admins.page_title'), 'url' => route('admin.dashboard.list.admins', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_delete_admin.page_title')]
    ]
@endphp


<div class="container mt-5">
    <h2>{{ __('general.admin_delete_admin.heading') }}</h2>

    <p>{{ __('general.admin_delete_admin.confirmation', ['name' => $admin->name]) }}</p>

    <form method="POST" action="{{ route('admin.admins.destroy', ['admin' => $admin->id, 'locale' => app()->getLocale()]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">{{ __('general.admin_delete_admin.confirm_button') }}</button>
        <a href="{{ route('admin.dashboard.list.admins', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">{{ __('general.admin_delete_admin.cancel_button') }}</a>
    </form>
</div>
@endsection
