@extends('layouts.admin')

{{-- Se define el título de la página usando la traducción de “Dashboard - Administrador” --}}
@section('title', __('general.admin_dashboard.dashboard_title'))

@section('admincontent')
<div class="container-fluid mt-3">
    <!-- Se muestra el título principal del dashboard -->
    <h1 class="text-center">{{ __('general.admin_dashboard.panel_admin') }}</h1>
    
    <!-- Se muestra el saludo, concatenando la traducción "Bienvenido" con el nombre del usuario -->
    <p class="text-center">{{ __('general.admin_dashboard.welcome') }}, {{ Auth::guard('admin')->user()->name }}</p>
    
    <div class="d-flex justify-content-end">
        <form method="POST" action="{{ route('admin.logout', ['locale' => app()->getLocale()]) }}">
            @csrf
            <!-- Botón de cierre de sesión con traducción -->
            <button type="submit" class="btn btn-danger">
                {{ __('general..log_outgout') }}
            </button>
        </form>
    </div>
    
    @if ($isSuperAdmin)
        <div class="mt-4">
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <!-- Enlaces del dashboard para administradores super, cada uno con su propia traducción -->
                <a href="{{ route('admin.manage.tickets', ['locale' => app()->getLocale()]) }}" class="btn btn-success">
                    {{ __('general.admin_dashboard.manage_tickets') }}
                </a>
                <a href="{{ route('admin.types.index', ['locale' => app()->getLocale()]) }}" class="btn btn-info">
                    {{ __('general.admin_dashboard.ticket_types') }}
                </a>
                <a href="{{ route('admin.manage.dashboard', ['locale' => app()->getLocale()]) }}" class="btn btn-warning">
                    {{ __('general.admin_dashboard.users_and_admins') }}
                </a>
            </div>
        </div>
    @endif
    
    <div class="ext-center">
        <!-- Botón para ir a “Tickets Asignados”, traducido -->
        <a href="{{ route('admin.show.assigned.tickets') }}" class="btn btn-primary btn-lg">
            {{ __('general.admin_dashboard.assigned_tickets') }}
        </a>
    </div>
</div>
@endsection
