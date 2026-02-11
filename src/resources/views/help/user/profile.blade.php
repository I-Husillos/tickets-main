@extends('layouts.user')

@section('title', __('help.profile_page.title'))

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('help.profile_page.header') }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('user.help.index', ['locale' => app()->getLocale()]) }}">{{ __('help.breadcrumbs.help') }}</a></li>
                <li class="breadcrumb-item active">{{ __('help.profile_page.breadcrumbs') }}</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-6">
            {{-- VER INFORMACIÓN --}}
            <div class="card card-outline card-secondary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-id-card mr-2"></i> {{ __('help.profile_page.info.title') }}</h3>
                </div>
                <div class="card-body">
                    <p>
                        {{ __('help.profile_page.info.text1') }}
                    </p>
                    <ol>
                        <li>{!! __('help.profile_page.info.step1') !!}</li>
                        <li>{!! __('help.profile_page.info.step2') !!}</li>
                    </ol>
                    <p class="mt-3">
                        {{ __('help.profile_page.info.text2') }}
                    </p>
                    <ul>
                        <li>{!! __('help.profile_page.info.list.name') !!}</li>
                        <li>{!! __('help.profile_page.info.list.email') !!}</li>
                        <li>{!! __('help.profile_page.info.list.tickets') !!}</li>
                    </ul>
                    
                    <div class="callout callout-info mt-4">
                        <h5><i class="fas fa-edit"></i> {{ __('help.profile_page.edit.title') }}</h5>
                        <p>
                            {{ __('help.profile_page.edit.text1') }}
                        </p>
                        <p>
                            {!! __('help.profile_page.edit.text2') !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            {{-- SEGURIDAD Y SESIÓN --}}
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-shield-alt mr-2"></i> {{ __('help.profile_page.security.title') }}</h3>
                </div>
                <div class="card-body">
                    <h5>{{ __('help.profile_page.security.logout_title') }}</h5>
                    <p>
                        {{ __('help.profile_page.security.logout_text') }}
                    </p>
                    <ul>
                        <li>{!! __('help.profile_page.security.logout_step1') !!}</li>
                        <li>{{ __('help.profile_page.security.logout_step2') }}</li>
                    </ul>

                    <h5 class="mt-4">{{ __('help.profile_page.security.password_title') }}</h5>
                     <p>
                        {{ __('help.profile_page.security.password_text') }}
                    </p>
                </div>
            </div>
            
            {{-- IDIOMA --}}
             <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-language mr-2"></i> {{ __('help.profile_page.language.title') }}</h3>
                </div>
                <div class="card-body">
                    <p>
                        {{ __('help.profile_page.language.text') }}
            </div>
        </div>
    </div>

</div>
@endsection
