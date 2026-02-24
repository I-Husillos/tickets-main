@extends('layouts.admin')

@section('title', __('general.admin_ticket_details.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
    ];

    if (Auth::user()->superadmin) {
        $breadcrumbs[] = ['label' => __('general.admin_ticket_manage.page_title'), 'url' => route('admin.manage.tickets', ['locale' => app()->getLocale()])];
    } else {
        $breadcrumbs[] = ['label' => __('general.admin_assigned_tickets.page_title'), 'url' => route('admin.show.assigned.tickets', ['locale' => app()->getLocale()])];
    }

    $breadcrumbs[] = ['label' => __('general.admin_ticket_details.page_title')];
@endphp


<div class="container-fluid mt-4">

    <div class="row">
        <!-- DATOS DEL TICKET -->
        <div class="col-md-4">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        {{ __('general.admin_ticket_details.ticket_details', ['ticket_id' => $ticket->id]) }}
                    </h3>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>{{ __('general.admin_ticket_details.title_label') }}:</b> {{ $ticket->title }}
                        </li>
                        <li class="list-group-item">
                            <b>{{ __('general.admin_ticket_details.description_label') }}:</b><br> {{ $ticket->description }}
                        </li>
                        <li class="list-group-item">
                            <b>{{ __('general.admin_ticket_details.status_label') }}:</b> {{ ucfirst($ticket->status) }}
                        </li>
                        <li class="list-group-item">
                            <b>{{ __('general.admin_ticket_details.priority_label') }}:</b> {{ ucfirst($ticket->priority) }}
                        </li>
                        <li class="list-group-item">
                            <b>{{ __('general.admin_ticket_details.type_label') }}:</b> {{ ucfirst($ticket->type) }}
                        </li>
                        <li class="list-group-item">
                            <b>{{ __('general.admin_ticket_details.assigned_to_label') }}:</b>
                            {{ $ticket->admin ? $ticket->admin->name : __('general.admin_ticket_details.without_assignment') }}
                        </li>
                        <li class="list-group-item">
                            <b>{{ __('general.admin_ticket_details.created_at_label') }}:</b> {{ $ticket->created_at->format('d/m/Y') }}
                        </li>
                        <li class="list-group-item">
                            <b>{{ __('general.admin_ticket_details.updated_at_label') }}:</b> {{ $ticket->updated_at->format('d/m/Y') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- FORMULARIO Y COMENTARIOS -->
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#edit" data-toggle="tab">{{ __('general.admin_ticket_details.edit_ticket') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#comments" data-toggle="tab">{{ __('general.admin_ticket_details.comments') }}</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">

                        <!-- TAB: Editar ticket -->
                        <div class="active tab-pane" id="edit">
                            @can('update', $ticket)

                            <form id="edit-ticket-form" data-ticket-id="{{ $ticket->id }}">
                                @csrf {{-- solo si usas alguna validación JS basada en Blade --}}
                                
                                <div class="form-group">
                                    <label for="title">Título</label>
                                    <input type="text" id="title" value="{{ $ticket->title }}" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Descripción</label>
                                    <textarea id="description" class="form-control" rows="3" required>{{ $ticket->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="status">Estado</label>
                                    <select id="status" class="form-control">
                                        @foreach(['new', 'in_progress', 'pending', 'resolved', 'closed'] as $status)
                                            <option value="{{ $status }}" {{ $ticket->status === $status ? 'selected' : '' }}>
                                                {{ ucfirst($status) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Prioridad -->
                                <div class="form-group">
                                    <label for="priority">Prioridad</label>
                                    <select id="priority" class="form-control">
                                        @foreach(['low', 'medium', 'high', 'critical'] as $priority)
                                            <option value="{{ $priority }}" {{ $ticket->priority === $priority ? 'selected' : '' }}>
                                                {{ ucfirst($priority) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Tipo -->
                                <div class="form-group">
                                    <label for="type">Tipo</label>
                                    <select id="type" class="form-control">
                                        @foreach($ticketTypes as $type)
                                            <option value="{{ $type->name }}" {{ strtolower($ticket->type) === strtolower($type->name) ? 'selected' : '' }}>
                                                {{ ucfirst($type->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                @if(Auth::guard('admin')->user()->superadmin)
                                <div class="form-group">
                                    <label for="assigned_to">Asignado a</label>
                                    <select id="assigned_to" class="form-control">
                                        <option value="">{{ __('Sin asignar') }}</option>
                                        @foreach($admins as $admin)
                                            <option value="{{ $admin->id }}" {{ $ticket->admin_id === $admin->id ? 'selected' : '' }}>
                                                {{ $admin->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif

                                {{-- Proyecto --}}
                                <div class="form-group">
                                    <label for="project_id">Proyecto</label>
                                    <select id="project_id" class="form-control">
                                        <option value="">-- Sin proyecto --</option>
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}"
                                                {{ $ticket->project_id == $project->id ? 'selected' : '' }}>
                                                {{ $project->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Etiquetas (Select2) --}}
                                <div class="form-group">
                                    <label for="tags-edit-select">Etiquetas</label>
                                    <select name="tags[]" id="tags-edit-select" class="form-control" multiple
                                            data-tags-search="{{ route('admin.tags.search', ['locale' => app()->getLocale()]) }}"
                                            data-placeholder="{{ __('general.admin_own_tickets.tags_placeholder') }}">
                                        @foreach($ticket->tags as $tag)
                                            <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success mt-3">
                                    <i class="fas fa-save"></i> Guardar Cambios
                                </button>
                            </form>
                            @endcan
                        </div>

                        <!-- TAB: Comentarios -->
                        <div class="tab-pane" id="comments">
                            <h5>{{ __('general.admin_ticket_details.comments') }}</h5>

                            @if($ticket->comments->isEmpty())
                                <p class="text-muted">{{ __('general.admin_ticket_details.no_comments') }}</p>
                            @else
                            <div class="table-responsive">
                                <table 
                                    id="tabla-comentarios"
                                    class="table table-hover table-striped table-bordered dt-responsive"
                                    data-api-url="{{ url('/api/admin/tickets/' . $ticket->id . '/comments') }}"
                                    data-locale="{{ app()->getLocale() }}">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="align-middle">{{ __('general.admin_ticket_details.author') }}</th>
                                            <th class="align-middle text-left">{{ __('general.admin_ticket_details.message') }}</th>
                                            <th class="align-middle">{{ __('general.admin_ticket_details.date') }}</th>
                                            <th class="align-middle">{{ __('general.admin_ticket_details.actions') }}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            @endif

                            @can('comment', $ticket)
                            <form method="POST" action="{{ route('admin.comments.add', ['locale' => app()->getLocale(), 'ticket' => $ticket]) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="message">{{ __('general.admin_ticket_details.add_comment_heading') }}</label>
                                    <textarea name="message" class="form-control" rows="4" placeholder="{{ __('general.admin_ticket_details.comment_placeholder') }}"></textarea>
                                    
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">
                                    <i class="fas fa-comment"></i> {{ __('general.admin_ticket_details.add_comment') }}
                                </button>
                            </form>
                            @endcan
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
