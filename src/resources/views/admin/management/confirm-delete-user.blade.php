@extends('layouts.admin')

@section('title', __('general.admin_delete_user.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_users.page_title'), 'url' => route('admin.dashboard.list.users', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_delete_user.page_title')]
    ];
@endphp
<div class="container mt-5">
    <h2>{{ __('general.admin_delete_user.heading') }}</h2>

    <p>{{ __('general.admin_delete_user.confirmation', ['name' => $user->name]) }}</p>

    <form method="POST" action="{{ route('admin.users.destroy', ['user' => $user->id, 'locale' => app()->getLocale()]) }}">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger btn-delete-user" data-id="{{ $user->id }}">
            {{ __('general.admin_delete_user.confirm_button') }}
        </button>
        <a href="{{ route('admin.dashboard.list.users', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">{{ __('general.admin_delete_user.cancel_button') }}</a>
    </form>
</div>
@endsection

