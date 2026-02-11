@extends('layouts.admin') {{-- Asegúrate de que esta layout use AdminLTE --}}

@section('title', __('Perfil de Administrador'))

@section('admincontent')
<div class="container-fluid">
    <!-- Tarjeta de perfil -->
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">{{ __('Información del Perfil') }}</h3>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-4">{{ __('Nombre') }}</dt>
                <dd class="col-sm-8">{{ $admin->name }}</dd>

                <dt class="col-sm-4">{{ __('Correo electrónico') }}</dt>
                <dd class="col-sm-8">{{ $admin->email }}</dd>
                <dt class="col-sm-4">Derechos:</dt>
                @if(Auth::guard('admin')->user()->superadmin)
                    <dd class="col-sm-8">Superadministrador</dd>
                @else
                    <dd class="col-sm-8">Administrador</dd>
                @endif
            </dl>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.dashboard', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> {{ __('Volver') }}
            </a>
        </div>
    </div>
</div>
@endsection
