@extends('layouts.user') {{-- Asegúrate de que esta layout use AdminLTE --}}

@section('title', __('Perfil de Usuario'))

@section('content')
@php
$breadcrumbs = [
    ['label' => __('general.home'), 'url' => route('user.dashboard', ['locale' => app()->getLocale()])],
    ['label' => __('Perfil de Usuario')]
];
@endphp
<div class="container-fluid">
    <!-- Tarjeta de perfil -->
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">{{ __('Información del Perfil') }}</h3>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-4">{{ __('Nombre') }}</dt>
                <dd class="col-sm-8">{{ $user->name }}</dd>

                <dt class="col-sm-4">{{ __('Correo electrónico') }}</dt>
                <dd class="col-sm-8">{{ $user->email }}</dd>
                <dt class="col-sm-4">{{ __('Tickets totales creados') }}</dt>
                <dd class="col-sm-8">{{ $user->tickets->count() }}</dd>
            </dl>
        </div>
        <div class="card-footer">
            <a href="{{ route('user.dashboard', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> {{ __('Volver') }}
            </a>
        </div>
    </div>
</div>
@endsection
