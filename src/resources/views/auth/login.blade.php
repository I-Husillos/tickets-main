@extends('layouts.auth')

@section('title', __('general.frontoffice.auth.login.title'))

@section('body-class', 'landing-page')

@section('content')
    <!-- Hero Section with Login Form -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Column: Information -->
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="mb-4">
                        <img src="/img/tickets-logo.png" alt="Tickets TI Termosalud" width="150" class="mb-3">
                        <h1 class="display-5 font-weight-bold mb-3">
                            {{ __('general.frontoffice.auth.login.hero_title') }}
                        </h1>
                        <h2 class="h3 mb-4"><img src="/img/termosalud-logo.png" alt="Termosalud" width="200"></h2>
                        <p class="lead">
                            {{ __('general.frontoffice.auth.login.hero_description') }}
                        </p>
                    </div>
                </div>
                
                <!-- Right Column: Login Form -->
                <div class="col-lg-4">
                    <div class="login-box">
                        <div class="card card-outline card-primary shadow">

                            <div class="card-body">
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <h3 class="text-center mb-4">
                                {{ __('general.frontoffice.auth.login.heading') }}
                            </h3>

                            <form method="POST" action="{{ route('login', ['locale' => app()->getLocale()]) }}">
                                @csrf

                                <div class="form-group">
                                    <label for="email">{{ __('general.frontoffice.auth.login.label_email') }}</label>
                                    <input 
                                        type="email" 
                                        id="email" 
                                        name="email" 
                                        class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                        placeholder="usuario@termosalud.com"
                                        value="{{ old('email') }}"
                                        required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">{{ __('general.frontoffice.auth.login.label_password') }}</label>
                                    <input 
                                        type="password" 
                                        id="password" 
                                        name="password" 
                                        class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                        placeholder="••••••••"
                                        required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary btn-login btn-block btn-lg mt-4">
                                    <i class="fas fa-sign-in-alt mr-2"></i>
                                    {{ __('general.frontoffice.auth.login.submit') }}
                                </button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 bg-primary disabled color-palette">
        <div class="container">
            <h2 class="text-center font-weight-bold">
                {{ __('general.frontoffice.auth.login.features_title') }}
            </h2>

            <hr class="mt-3 mb-5 mx-auto d-block" style="width:50px; border-width:5px; border-color:white">
            
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-card text-center">
                        <div class="display-4 d-inline bg-white text-primary rounded-circle py-4 px-4">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                        <h4 class="font-weight-bold mb-3 mt-4">
                            {{ __('general.frontoffice.auth.login.feature_1_title') }}
                        </h4>
                        <p>
                            {{ __('general.frontoffice.auth.login.feature_1_desc') }}
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="feature-card text-center">
                        <div class="display-4 d-inline bg-white text-primary rounded-circle py-4 px-4">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4 class="font-weight-bold mb-3 mt-4">
                            {{ __('general.frontoffice.auth.login.feature_2_title') }}
                        </h4>
                        <p>
                            {{ __('general.frontoffice.auth.login.feature_2_desc') }}
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="feature-card text-center">
                        <div class="display-4 d-inline bg-white text-primary rounded-circle py-4 px-4">
                            <i class="fas fa-history"></i>
                        </div>
                        <h4 class="font-weight-bold mb-3 mt-4">
                            {{ __('general.frontoffice.auth.login.feature_3_title') }}
                        </h4>
                        <p>
                            {{ __('general.frontoffice.auth.login.feature_3_desc') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center font-weight-bold">
                {{ __('general.frontoffice.auth.login.process_title') }}
            </h2>

            <hr class="mt-3 mb-5 mx-auto d-block" style="width:50px; border-width:5px; border-color:#1f2d3d">
            
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="step-card text-center">
                        <div class="display-4 bg-primary py-1 px-3 rounded d-inline">1</div>
                        <h5 class="font-weight-bold m-3">
                            {{ __('general.frontoffice.auth.login.step_1_title') }}
                        </h5>
                        <p>{{ __('general.frontoffice.auth.login.step_1_desc') }}</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="step-card text-center">
                        <div class="display-4 bg-primary py-1 px-3 rounded d-inline">2</div>
                        <h5 class="font-weight-bold m-3">
                            {{ __('general.frontoffice.auth.login.step_2_title') }}
                        </h5>
                        <p>{{ __('general.frontoffice.auth.login.step_2_desc') }}</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="step-card text-center">
                        <div class="display-4 bg-primary py-1 px-3 rounded d-inline">3</div>
                        <h5 class="font-weight-bold m-3">
                            {{ __('general.frontoffice.auth.login.step_3_title') }}
                        </h5>
                        <p>{{ __('general.frontoffice.auth.login.step_3_desc') }}</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="step-card text-center">
                        <div class="display-4 bg-primary py-1 px-3 rounded d-inline">4</div>
                        <h5 class="font-weight-bold m-3">
                            {{ __('general.frontoffice.auth.login.step_4_title') }}
                        </h5>
                        <p>{{ __('general.frontoffice.auth.login.step_4_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Support Team Section -->
    <section class="bg-secondary p-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="/img/tech.png" alt="Support Team" class="img-fluid">
                </div>
                
                <div class="col-lg-6">
                    <h2 class="font-weight-bold mb-3">
                        {{ __('general.frontoffice.auth.login.support_subtitle') }}
                    </h2>
                    <p class="lead">
                        {{ __('general.frontoffice.auth.login.support_desc') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-4 bg-black">
        <div class="container">
            <p class="mb-0">
                &copy; {{ date('Y') }} {{ config('app.name') }} - Termosalud
            </p>
        </div>
    </footer>
@endsection
