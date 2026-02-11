@extends('layouts.user')

@section('title', __('frontoffice.tickets.create_new_ticket'))

@section('content')
@php
$breadcrumbs = [
    ['label' => __('general.home'), 'url' => route('user.dashboard', ['locale' => app()->getLocale()])],
    ['label' => __('frontoffice.tickets.list_title'), 'url' => route('user.tickets.index', ['locale' => app()->getLocale()])],
    ['label' => __('frontoffice.tickets.create_new_ticket')]
];
@endphp


    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>{{ __('frontoffice.tickets.create_new_ticket') }}</h3>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>   
                    </div>
                @endif

                <form id="ticketForm">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="title">{{ __('frontoffice.tickets.title') }}</label>
                        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="description">{{ __('frontoffice.tickets.description') }}</label>
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="type">{{ __('frontoffice.tickets.type') }}</label>
                        <select id="type" name="type" class="form-control">
                            @foreach ($types as $type)
                                <option value="{{ $type->name }}" {{ old('type') === $type->name ? 'selected' : '' }}>
                                    {{ ucfirst($type->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="priority">{{ __('frontoffice.tickets.priority') }}</label>
                        <select id="priority" name="priority" class="form-control">
                            <option value="low" {{ old('priority') === 'low' ? 'selected' : '' }}>{{ __('frontoffice.tickets.priority_options.low') }}</option>
                            <option value="medium" {{ old('priority') === 'medium' ? 'selected' : '' }}>{{ __('frontoffice.tickets.priority_options.medium') }}</option>
                            <option value="high" {{ old('priority') === 'high' ? 'selected' : '' }}>{{ __('frontoffice.tickets.priority_options.high') }}</option>
                            <option value="critical" {{ old('priority') === 'critical' ? 'selected' : '' }}>{{ __('frontoffice.tickets.priority_options.critical') }}</option>
                        </select>
                    </div>

                    <input type="hidden" name="status" value="new">

                    <button type="submit" class="btn btn-success mt-4">
                        <i class="fas fa-save"></i> {{ __('frontoffice.tickets.create_button') }}
                    </button>
                    <a href="{{ route('user.tickets.index', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary mt-4">
                        <i class="fas fa-arrow-left"></i> {{ __('frontoffice.tickets.cancel') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
