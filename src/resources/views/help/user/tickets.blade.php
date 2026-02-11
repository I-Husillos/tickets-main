@extends('layouts.user')

@section('title', __('help.title'))

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('help.header') }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('user.help.index', ['locale' => app()->getLocale()]) }}">{{ __('help.breadcrumbs.help') }}</a></li>
                <li class="breadcrumb-item active">{{ __('help.breadcrumbs.tickets') }}</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">

    {{-- Introducción a Tickets --}}
    <div class="callout callout-info mb-4">
        <h5><i class="fas fa-info-circle"></i> {{ __('help.intro.title') }}</h5>
        <p>
            {{ __('help.intro.text') }}
        </p>
    </div>

    {{-- 1. CREAR TICKET --}}
    <div class="card card-primary card-outline collapsed-card">
        <div class="card-header">
            <h3 class="card-title">{{ __('help.create.title') }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
            </div>
        </div>
        <div class="card-body" style="display: none;">
            <p>{{ __('help.create.step1') }}</p>

            <div class="row">
                <div class="col-md-6">
                    <ol>
                        <li class="mb-2">
                            <strong>{{ __('help.create.list.1.title') }}</strong> {{ __('help.create.list.1.text') }} <span class="badge badge-secondary">{{ __('help.breadcrumbs.tickets') }}</span>.
                        </li>
                        <li class="mb-2">
                            <strong>{{ __('help.create.list.2.title') }}</strong> {{ __('help.create.list.2.text') }} <span class="badge badge-success"><i class="fas fa-save"></i> {{ __('frontoffice.tickets.create_button') ?? 'Crear Nuevo Ticket' }}</span> {{ __('help.create.list.2.suffix') }}
                        </li>
                        <li class="mb-2">
                            <strong>{{ __('help.create.list.3.title') }}</strong>
                            <ul>
                                <li class="mb-1">
                                    <strong>{{ __('frontoffice.tickets.title') ?? 'Título' }} <span class="text-danger">*</span>:</strong> {!! __('help.create.list.3.li1.text') !!}
                                </li>
                                <li class="mb-1">
                                    <strong>{{ __('frontoffice.tickets.description') ?? 'Descripción' }} <span class="text-danger">*</span>:</strong> {!! __('help.create.list.3.li2.text') !!}
                                    <div class="alert alert-light border mt-1 p-2 small">
                                        <i class="fas fa-exclamation-circle text-warning"></i> {!! __('help.create.list.3.li2.alert') !!}
                                    </div>
                                </li>
                                <li class="mb-1"><strong>{{ __('frontoffice.tickets.priority') ?? 'Prioridad' }} <span class="text-danger">*</span>:</strong> {!! __('help.create.list.3.li3.text') !!}</li>
                                <li class="mb-1"><strong>{{ __('frontoffice.tickets.type') ?? 'Tipo' }} <span class="text-danger">*</span>:</strong> {!! __('help.create.list.3.li4.text') !!}</li>
                            </ul>
                            <p class="small text-muted mt-2">
                                <i class="fas fa-paperclip"></i> {!! __('help.create.list.3.note') !!}
                            </p>
                        </li>
                        <li class="mb-2">
                            <strong>{{ __('help.create.list.4.title') }}</strong> {!! __('help.create.list.4.text') !!}
                        </li>
                    </ol>
                </div>
                <div class="col-md-6">
                    <div class="text-center border bg-light p-4 h-100 d-flex flex-column justify-content-center">
                        <img src="/img/create-ticket-form.png" class="img-fluid border shadow-sm" alt="Formulario de Ticket">
                        <p class="small text-muted mt-3">{{ __('help.create.img_caption') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 2. LISTADO Y BUSQUEDA --}}
    <div class="card card-info card-outline collapsed-card">
        <div class="card-header">
            <h3 class="card-title">{{ __('help.list.title') }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
            </div>
        </div>
        <div class="card-body" style="display: none;">
            <p>{{ __('help.list.intro') }}</p>

            <div class="row">
                <div class="col-12 mb-3">
                    <div class="text-center border bg-light p-3">
                        <img src="/img/user-table-ticket-list.png" class="img-fluid border shadow-sm" alt="Tabla de Tickets">
                        <p class="small text-muted">{{ __('help.list.img_caption') }}</p>
                    </div>
                </div>
            </div>

            <h5>{{ __('help.list.table_title') }}</h5>
            <p>{{ __('help.list.table_intro') }}</p>
            <ul>
                <li>{!! __('help.list.columns.id') !!}</li>
                <li>{!! __('help.list.columns.title') !!}</li>
                <li>{!! __('help.list.columns.status') !!}</li>
                <li>{!! __('help.list.columns.priority') !!}</li>
                <li>{!! __('help.list.columns.actions') !!}</li>
            </ul>

            <h5 class="mt-4">{{ __('help.list.search_title') }}</h5>
            <p>
                {{ __('help.list.search_text') }}
            </p>
        </div>
    </div>

    {{-- 3. ESTADOS DEL TICKET --}}
    <div class="card card-warning card-outline collapsed-card">
        <div class="card-header">
            <h3 class="card-title">{{ __('help.states.title') }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <p>{{ __('help.states.intro') }}</p>

            <div class="timeline">
                <div>
                    <i class="fas fa-envelope bg-blue"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header"><span class="badge badge-primary">{{ __('help.states.open') }}</span></h3>
                        <div class="timeline-body">
                            {{ __('help.states.open_desc') }}
                        </div>
                    </div>
                </div>

                <div>
                    <i class="fas fa-tools bg-yellow"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header"><span class="badge badge-warning">{{ __('help.states.progress') }}</span> (Implícito)</h3>
                        <div class="timeline-body">
                            {{ __('help.states.progress_desc') }}
                        </div>
                    </div>
                </div>

                <div>
                    <i class="fas fa-check bg-green"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header"><span class="badge badge-success">{{ __('help.states.resolved') }}</span></h3>
                        <div class="timeline-body">
                            {{ __('help.states.resolved_desc') }}
                            <br>
                            {!! __('help.states.resolved_action') !!}
                            <ul>
                                <li>{!! __('help.states.resolved_list.1') !!}</li>
                                <li>{!! __('help.states.resolved_list.2') !!}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div>
                    <i class="fas fa-lock bg-secondary"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header"><span class="badge badge-secondary">{{ __('help.states.closed') }}</span></h3>
                        <div class="timeline-body">
                            {{ __('help.states.closed_desc') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 4. INTERACTUAR --}}
    <div class="card card-success card-outline collapsed-card">
        <div class="card-header">
            <h3 class="card-title">{{ __('help.detail.title') }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
            </div>
        </div>
        <div class="card-body" style="display: none;">
            <p>{{ __('help.detail.intro') }}</p>

            <div class="row mb-4">
                <div class="col-md-12 text-center">
                    <img src="/img/ticket-details-view.png" class="img-fluid border shadow-sm mb-3" alt="Vista General del Detalle">
                    <p class="text-muted small">{!! __('help.detail.img_caption') !!}</p>
                </div>
            </div>

            <hr>

            <div class="row">
                <!-- ZONA IZQUIERDA -->
                <div class="col-md-6 border-right">
                    <h5 class="text-primary"><i class="fas fa-file-alt"></i> {{ __('help.detail.zone_a.title') }}</h5>
                    <p>{{ __('help.detail.zone_a.text') }}</p>
                    <ul class="small">
                        <li>{!! __('help.detail.zone_a.list.1') !!}</li>
                        <li>{!! __('help.detail.zone_a.list.2') !!}</li>
                        <li>{!! __('help.detail.zone_a.list.3') !!}</li>
                    </ul>

                    <div class="alert alert-info border mt-3">
                        <h6 class="font-weight-bold"><i class="fas fa-check-circle"></i> {{ __('help.detail.zone_a.validation.title') }}</h6>
                        <p class="small mb-2">
                            {!! __('help.detail.zone_a.validation.text') !!}
                        </p>
                        <ul class="pl-3 small">
                            <li>{!! __('help.detail.zone_a.validation.validate') !!}</li>
                            <li>{!! __('help.detail.zone_a.validation.reject') !!}</li>
                        </ul>
                        <div class="text-center mt-2">
                            <img src="/img/user-validating-options.png" class="img-fluid border shadow-sm" style="max-height: 150px;" alt="Botones de Validación">
                        </div>
                    </div>
                </div>

                <!-- ZONA DERECHA -->
                <div class="col-md-6 pl-md-4">
                    <h5 class="text-primary"><i class="fas fa-comment-medical"></i> {{ __('help.detail.zone_b.title') }}</h5>
                    <p>
                        {{ __('help.detail.zone_b.text') }}
                    </p>
                    <div class="card bg-light border-0">
                        <div class="card-body p-2">
                            <strong>{{ __('help.detail.zone_b.usage') }}</strong>
                            <ul class="small pl-3 mb-0">
                                <li>{{ __('help.detail.zone_b.list.1') }}</li>
                                <li>{{ __('help.detail.zone_b.list.2') }}</li>
                                <li>{{ __('help.detail.zone_b.list.3') }}</li>
                            </ul>
                        </div>
                    </div>
                    <p class="small mt-2">{!! __('help.detail.zone_b.footer') !!}</p>
                    <div class="text-center">
                        <img src="/img/add-comment-option.png" class="img-fluid border shadow-sm" alt="Formulario de Comentario">
                    </div>
                </div>
            </div>

            <hr>

            <!-- ZONA INFERIOR -->
            <div class="row mt-4">
                <div class="col-12">
                    <h5 class="text-primary"><i class="fas fa-history"></i> {{ __('help.detail.zone_c.title') }}</h5>
                    <p>
                        {{ __('help.detail.zone_c.text') }}
                    </p>
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <ul class="small">
                                <li>{!! __('help.detail.zone_c.list.1') !!}</li>
                                <li>{!! __('help.detail.zone_c.list.2') !!}
                                    <ul>
                                        <li>{!! __('help.detail.zone_c.list.sublist.1') !!}</li>
                                        <li>{!! __('help.detail.zone_c.list.sublist.2') !!}</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-5">
                            <img src="/img/user-comments-list.png" class="img-fluid border shadow-sm" alt="Ejemplo de Historial">
                            <p class="text-center small text-muted mt-1">{{ __('help.detail.zone_c.img_caption') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 5. EDICIÓN Y BORRADO --}}
    <div class="card card-danger card-outline collapsed-card">
        <div class="card-header">
            <h3 class="card-title">{{ __('help.advanced.title') }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
            </div>
        </div>
        <div class="card-body" style="display: none;">
            <p>{{ __('help.advanced.intro') }}</p>

            <div class="row">
                <!-- COLUMNA EDICION -->
                <div class="col-md-6 border-right">
                    <h5 class="text-warning"><i class="fas fa-edit"></i> {{ __('help.advanced.edit.title') }}</h5>
                    <p class="small">{!! __('help.advanced.edit.subtitle') !!}</p>

                    <ol>
                        <li class="mb-2">
                            {!! __('help.advanced.edit.step1') !!}
                        </li>
                        <li class="mb-2">
                            {{ __('help.advanced.edit.step2') }}
                            <ul>
                                <li>{!! __('help.advanced.edit.step2_list') !!}</li>
                            </ul>
                        </li>
                        <li class="mb-2">
                            {!! __('help.advanced.edit.step3') !!}
                        </li>
                    </ol>

                    <div class="alert alert-success bg-light border-success">
                        <i class="fas fa-check-circle text-success"></i> <strong>{{ __('help.advanced.edit.success_title') }}</strong>
                        <br>
                        {!! __('help.advanced.edit.success_text') !!}
                    </div>

                    <div class="text-center mt-3">
                        <img src="/img/user-succesfull-update-ticket-message.png" class="img-fluid border shadow-sm" alt="Mensaje de éxito al editar">
                        <p class="text-muted small">{{ __('help.advanced.edit.img_caption') }}</p>
                    </div>
                </div>

                <!-- COLUMNA ELIMINACION -->
                <div class="col-md-6 pl-md-4">
                    <h5 class="text-danger"><i class="fas fa-trash-alt"></i> {{ __('help.advanced.delete.title') }}</h5>
                    <div class="alert alert-danger small">
                        {!! __('help.advanced.delete.warning') !!}
                    </div>

                    <ol>
                        <li class="mb-2">
                            {!! __('help.advanced.delete.step1') !!}
                        </li>
                        <li class="mb-2">
                            {!! __('help.advanced.delete.step2') !!}
                        </li>
                        <li class="mb-2">
                            {{ __('help.advanced.delete.step3') }}
                            <ul>
                                <li>{!! __('help.advanced.delete.step3_list.1') !!}</li>
                                <li>{!! __('help.advanced.delete.step3_list.2') !!}</li>
                            </ul>
                        </li>
                    </ol>

                    <div class="text-center mt-3">
                        <img src="/img/user-succesfull-delete-ticket-alert.png" class="img-fluid border shadow-sm" alt="Confirmación de navegador">
                        <p class="text-muted small">{{ __('help.advanced.delete.img_caption') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection