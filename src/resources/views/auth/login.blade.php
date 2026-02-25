@extends('layouts.auth')

@section('title', __('general.frontoffice.auth.login.title'))

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Cerrar') }}">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <h2 class="text-center text-primary">{{ __('general.frontoffice.auth.login.heading') }}</h2>


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

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block btn-block">
                    <i class="fas fa-sign-in-alt"></i> {{ __('general.frontoffice.auth.login.submit') }}
                </button>
            </div>
        </div>
    </form>

@endsection
