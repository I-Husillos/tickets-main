@extends('layouts.user')

@section('title', __('frontoffice.tickets.edit'))

@section('content')
@php
$breadcrumbs = [
    ['label' => __('general.home'), 'url' => route('user.dashboard', ['locale' => app()->getLocale()])],
    ['label' => __('frontoffice.tickets.list_title'), 'url' => route('user.tickets.index', ['locale' => app()->getLocale()])],
    ['label' => __('frontoffice.tickets.edit')]
];
@endphp


<div class="container">
    <h2>{{ __('frontoffice.tickets.edit') }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ __('frontoffice.tickets.error_message') }}
        </div>
    @endif

    <form method="POST" action="{{ route('user.tickets.update', [
        'locale' => app()->getLocale(), 
        'username' => Auth::user()->id, 
        'ticket' => $ticket->id
    ]) }}">
        @csrf
        @method('PATCH')
        
        <!-- Título -->
        <div class="form-group mt-3">
            <label for="title">{{ __('frontoffice.tickets.title') }}</label>
            <input 
                type="text" 
                id="title" 
                name="title" 
                class="form-control @error('title') is-invalid @enderror" 
                value="{{ old('title', $ticket->title) }}"
            >
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Descripción -->
        <div class="form-group mt-3">
            <label for="description">{{ __('frontoffice.tickets.description') }}</label>
            <textarea 
                id="description" 
                name="description" 
                class="form-control @error('description') is-invalid @enderror" 
                rows="5">{{ old('description', $ticket->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Tipo -->
        <div class="form-group mt-3">
            <label for="type">{{ __('frontoffice.tickets.type') }}</label>
            <select 
                id="type" 
                name="type" 
                class="form-control @error('type') is-invalid @enderror">
                <option value="bug" {{ old('type', $ticket->type) === 'bug' ? 'selected' : '' }}>{{ __('frontoffice.tickets.types_options.bug') }}</option>
                <option value="improvement" {{ old('type', $ticket->type) === 'improvement' ? 'selected' : '' }}>{{ __('frontoffice.tickets.types_options.improvement') }}</option>
                <option value="request" {{ old('type', $ticket->type) === 'request' ? 'selected' : '' }}>{{ __('frontoffice.tickets.types_options.request') }}</option>
            </select>
            @error('type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Prioridad -->
        <div class="form-group mt-3">
            <label for="priority">{{ __('frontoffice.tickets.priority') }}</label>
            <select 
                id="priority" 
                name="priority" 
                class="form-control @error('priority') is-invalid @enderror">
                <option value="low" {{ old('priority', $ticket->priority) === 'low' ? 'selected' : '' }}>{{ __('frontoffice.tickets.priority_options.low') }}</option>
                <option value="medium" {{ old('priority', $ticket->priority) === 'medium' ? 'selected' : '' }}>{{ __('frontoffice.tickets.priority_options.medium') }}</option>
                <option value="high" {{ old('priority', $ticket->priority) === 'high' ? 'selected' : '' }}>{{ __('frontoffice.tickets.priority_options.high') }}</option>
                <option value="critical" {{ old('priority', $ticket->priority) === 'critical' ? 'selected' : '' }}>{{ __('frontoffice.tickets.priority_options.critical') }}</option>
            </select>
            @error('priority')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Botones de acción -->
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> {{ __('frontoffice.tickets.update_button') }}
            </button>
            <a href="{{ route('user.tickets.index', ['locale' => app()->getLocale(), 'username' => Auth::user()->id]) }}" 
               class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> {{ __('frontoffice.tickets.cancel') }}
            </a>
        </div>
    </form>
</div>
@endsection
