@extends('layouts.auth')

@section('title', __('general.frontoffice.auth.login.title'))

@section('content')
    <p class="login-box-msg">{{ __('general.frontoffice.auth.login.heading') }}</p>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Cerrar') }}">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <form method="POST" action="{{ route('login', ['locale' => app()->getLocale()]) }}">
        @csrf

        <div class="input-group mb-3">
            <input 
                type="email" 
                id="email" 
                name="email" 
                class="form-control @error('email') is-invalid @enderror" 
                placeholder="example@domain.com"
                value="{{ old('email') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
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
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-sign-in-alt"></i> {{ __('general.frontoffice.auth.login.submit') }}
                </button>
            </div>
        </div>
    </form>

    <p class="mt-3 mb-1 text-center">
        {{ __('general.frontoffice.auth.login.no_account') }} 
        <a href="{{ route('register', ['locale' => app()->getLocale()]) }}">
            {{ __('general.frontoffice.auth.login.register_here') }}
        </a>
    </p>
@endsection
