@extends('layouts.auth')

@section('title', __('general.frontoffice.auth.register.title'))

@section('content')
    <p class="login-box-msg">{{ __('general.frontoffice.auth.register.heading') }}</p>

    <form method="POST" action="{{ route('register', ['locale' => app()->getLocale()]) }}">
        @csrf
        
        <div class="input-group mb-3">
            <input 
                type="text" 
                id="name" 
                name="name" 
                class="form-control @error('name') is-invalid @enderror" 
                placeholder="Nombre y Apellidos" 
                value="{{ old('name') }}">
            <div class="input-group-append">
            </div>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input 
                type="email" 
                id="email" 
                name="email" 
                class="form-control @error('email') is-invalid @enderror" 
                placeholder="example@domain.com"
                value="{{ old('email') }}">
            <div class="input-group-append">
            </div>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input 
                type="password" 
                id="password" 
                name="password" 
                class="form-control @error('password') is-invalid @enderror" 
                placeholder="********">
            <div class="input-group-append">
            </div>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input 
                type="password" 
                id="password_confirmation" 
                name="password_confirmation" 
                class="form-control" 
                placeholder="********">
            <div class="input-group-append">
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-user-plus"></i> {{ __('general.frontoffice.auth.register.submit') }}
                </button>
            </div>
        </div>
    </form>

    <p class="mt-3 mb-1 text-center">
        <a href="{{ route('login', ['locale' => app()->getLocale()]) }}">
            <i class="fas fa-arrow-left"></i> {{ __('general.frontoffice.auth.register.back_to_home') }}
        </a>
    </p>
@endsection
