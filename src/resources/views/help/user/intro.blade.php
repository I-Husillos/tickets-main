@extends('layouts.user')

@section('title', __('help.introduction_page.title'))

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('help.introduction_page.header') }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">{{ __('help.introduction_page.breadcrumbs') }}</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">

    {{-- 1. Bienvenida y Propósito --}}
    <div class="card card-outline card-primary mb-4">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-users mr-2"></i>
                {{ __('help.introduction_page.welcome.title') }}
            </h3>
        </div>
        <div class="card-body">
            <p class="lead">
                {{ __('help.introduction_page.welcome.text1') }}
            </p>
            <p>
                {{ __('help.introduction_page.welcome.text2') }}
            </p>
            
            <h5 class="mt-4 text-primary"><i class="fas fa-check-circle mr-1"></i> {{ __('help.introduction_page.welcome.can_do.title') }}</h5>
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fas fa-plus text-success mr-2"></i> {!! __('help.introduction_page.welcome.can_do.list.create') !!}</li>
                        <li class="list-group-item"><i class="fas fa-search text-info mr-2"></i> {!! __('help.introduction_page.welcome.can_do.list.history') !!}</li>
                        <li class="list-group-item"><i class="fas fa-comments text-primary mr-2"></i> {!! __('help.introduction_page.welcome.can_do.list.comment') !!}</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fas fa-bell text-warning mr-2"></i> {!! __('help.introduction_page.welcome.can_do.list.notifications') !!}</li>
                        <li class="list-group-item"><i class="fas fa-check-double text-success mr-2"></i> {!! __('help.introduction_page.welcome.can_do.list.validate') !!}</li>
                        <li class="list-group-item"><i class="fas fa-edit text-secondary mr-2"></i> {!! __('help.introduction_page.welcome.can_do.list.edit') !!}</li>
                    </ul>
                </div>
            </div>

            <h5 class="mt-4 text-danger"><i class="fas fa-times-circle mr-1"></i> {{ __('help.introduction_page.welcome.cannot_do.title') }}</h5>
            <ul>
                <li>{{ __('help.introduction_page.welcome.cannot_do.list.view_others') }}</li>
                <li>{{ __('help.introduction_page.welcome.cannot_do.list.assign') }}</li>
                <li>{{ __('help.introduction_page.welcome.cannot_do.list.modify_closed') }}</li>
            </ul>
        </div>
    </div>

    {{-- 2. Interfaz Principal (Dashboard) --}}
    <div class="card card-outline card-info mb-4">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-tachometer-alt mr-2"></i>
                {{ __('help.introduction_page.dashboard.title') }}
            </h3>
        </div>
        <div class="card-body">
            <p>
                {!! __('help.introduction_page.dashboard.text') !!}
            </p>
            
            <div class="text-center my-4 border bg-light p-3">
                <img src="/img/user-control-panel.png" class="img-fluid border shadow-sm" alt="Captura del Dashboard">
                <p class="small text-muted">{{ __('help.introduction_page.dashboard.img_caption') }}</p>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <div class="info-box bg-light mb-3">
                        <span class="info-box-icon bg-success"><i class="fas fa-ticket-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('help.introduction_page.dashboard.green_box.title') }}</span>
                            <span class="progress-description text-muted small">
                                {!! __('help.introduction_page.dashboard.green_box.desc') !!}
                            </span>
                        </div>
                    </div>
                     <div class="info-box bg-light mb-3">
                        <span class="info-box-icon bg-primary"><i class="fas fa-check"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('help.introduction_page.dashboard.blue_box.title') }}</span>
                            <span class="progress-description text-muted small">
                                {!! __('help.introduction_page.dashboard.blue_box.desc') !!}
                            </span>
                        </div>
                    </div>
                     <div class="info-box bg-light mb-3">
                        <span class="info-box-icon bg-warning"><i class="fas fa-clock"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('help.introduction_page.dashboard.yellow_box.title') }}</span>
                            <span class="progress-description text-muted small">
                                {!! __('help.introduction_page.dashboard.yellow_box.desc') !!}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <h4>{{ __('help.introduction_page.dashboard.components.title') }}</h4>
                    <dl class="row">
                        <dt class="col-sm-4">{{ __('help.introduction_page.dashboard.components.summary_dt') }}</dt>
                        <dd class="col-sm-8">{{ __('help.introduction_page.dashboard.components.summary_dd') }}</dd>

                        <dt class="col-sm-4">{{ __('help.introduction_page.dashboard.components.latest_dt') }}</dt>
                        <dd class="col-sm-8">{!! __('help.introduction_page.dashboard.components.latest_dd') !!}</dd>
                        
                        <dt class="col-sm-4">{{ __('help.introduction_page.dashboard.components.create_dt') }}</dt>
                        <dd class="col-sm-8">{{ __('help.introduction_page.dashboard.components.create_dd') }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    {{-- 3. Mi Perfil --}}
    <div class="card card-outline card-secondary mb-4">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-id-card mr-2"></i>
                {{ __('help.introduction_page.profile.title') }}
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <p>
                        {!! __('help.introduction_page.profile.text1') !!}
                    </p>
                    <p>
                        {{ __('help.introduction_page.profile.text2') }}
                    </p>
                    <ul>
                        <li>{{ __('help.introduction_page.profile.list.name') }}</li>
                        <li>{{ __('help.introduction_page.profile.list.email') }}</li>
                        <li>{{ __('help.introduction_page.profile.list.date') }}</li>
                    </ul>
                    <div class="alert alert-info">
                        <i class="icon fas fa-info"></i>
                        {!! __('help.introduction_page.profile.note') !!}
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <img src="/img/options-menu-bar.png" class="img-fluid border shadow-sm" alt="Captura del Perfil">
                    <p class="small text-muted">{{ __('help.introduction_page.profile.img1_caption') }}</p>
                    <img src="/img/user-profile-side-menu-option.png" class="img-fluid border shadow-sm mt-3" alt="Captura del Perfil">
                    <p class="small text-muted">{{ __('help.introduction_page.profile.img2_caption') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
