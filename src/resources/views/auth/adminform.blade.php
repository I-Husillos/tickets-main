@extends('layouts.auth')

@section('title', __('general.frontoffice.auth.admin_login.title'))

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Cerrar') }}">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <h2 class="text-center text-primary">{{ __('general.frontoffice.auth.admin_login.heading') }}</h2>
    <form action="{{ route('admin.login', ['locale' => app()->getLocale()]) }}" method="POST" class="mt-4">
        @csrf
        
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('general.frontoffice.auth.admin_login.label_email') }}</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="example@domain.com">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>  
        
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('general.frontoffice.auth.admin_login.label_password') }}</label>
            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="********">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror   
        </div>

        <button type="submit" class="btn btn-primary w-100">{{ __('general.frontoffice.auth.admin_login.submit') }}</button>
    </form>

@endsection
