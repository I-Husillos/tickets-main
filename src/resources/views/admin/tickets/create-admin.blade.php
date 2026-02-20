@extends('layouts.admin')

@section('title', __('general.admin_own_tickets.create_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_own_tickets.page_title'), 'url' => route('admin.my.tickets', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_own_tickets.create_title')]
    ];
@endphp

<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title m-0">
                <i class="fas fa-plus"></i> {{ __('general.admin_own_tickets.create_title') }}
            </h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.my.tickets.store', ['locale' => app()->getLocale()]) }}" method="POST">
                @csrf

                {{-- Title --}}
                <div class="form-group">
                    <label for="title">{{ __('general.admin_own_tickets.title') }} <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title"
                           class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title') }}" required>
                    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                {{-- Description --}}
                <div class="form-group">
                    <label for="description">{{ __('general.admin_own_tickets.description') }} <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" rows="4"
                              class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                {{-- Priority --}}
                <div class="form-group">
                    <label for="priority">{{ __('general.admin_own_tickets.priority') }} <span class="text-danger">*</span></label>
                    <select name="priority" id="priority" class="form-control" required>
                        @foreach(['low','medium','high','critical'] as $p)
                            <option value="{{ $p }}" {{ old('priority') === $p ? 'selected' : '' }}>
                                {{ ucfirst($p) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Status --}}
                <div class="form-group">
                    <label for="status">{{ __('general.admin_own_tickets.status') }} <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-control" required>
                        @foreach(['new','in_progress','pending','resolved','closed'] as $s)
                            <option value="{{ $s }}" {{ old('status', 'new') === $s ? 'selected' : '' }}>
                                {{ ucfirst(str_replace('_',' ',$s)) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Type --}}
                <div class="form-group">
                    <label for="type">{{ __('general.admin_own_tickets.type') }}</label>
                    <select name="type" id="type" class="form-control">
                        <option value="">-- {{ __('general.admin_own_tickets.no_type') }} --</option>
                        @foreach($types as $type)
                            <option value="{{ $type->name }}" {{ old('type') === $type->name ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Project --}}
                <div class="form-group">
                    <label for="project_id">{{ __('general.admin_own_tickets.project') }}</label>
                    <select name="project_id" id="project_id" class="form-control">
                        <option value="">-- {{ __('general.admin_own_tickets.no_project') }} --</option>
                        @foreach($projects as $project)
                            <option value="{{ $project->id }}"
                                {{ old('project_id') == $project->id ? 'selected' : '' }}>
                                {{ $project->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Tags (Select2) --}}
                <div class="form-group">
                    <label for="tags-select">{{ __('general.admin_own_tickets.tags') }}</label>
                    <select name="tags[]" id="tags-select" class="form-control" multiple
                               data-tags-search="{{ route('admin.tags.search', ['locale' => app()->getLocale()]) }}"
                               data-placeholder="{{ __('general.admin_own_tickets.tags_placeholder') }}">
                        {{-- Pre-populated from old() --}}
                        @foreach(old('tags', []) as $tagVal)
                            <option value="{{ $tagVal }}" selected>{{ $tagVal }}</option>
                        @endforeach
                    </select>
                    <small class="text-muted">{{ __('general.admin_own_tickets.tags_help') }}</small>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> {{ __('general.admin_own_tickets.save') }}
                </button>
                <a href="{{ route('admin.my.tickets', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">
                    {{ __('general.admin_own_tickets.cancel') }}
                </a>
            </form>
        </div>
    </div>
</div>

@endsection
