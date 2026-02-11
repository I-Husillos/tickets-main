@extends('layouts.admin')

@section('title', __('help-admin-events.title_page'))

@section('admincontent')
<div class="container-fluid p-4 mb-5">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h2 class="mb-0"><i class="fas fa-history"></i> {{ __('help-admin-events.header.title') }}</h2>
            <p class="mb-0 mt-2">{{ __('help-admin-events.header.subtitle') }}</p>
        </div>
        <div class="card-body">
            
            {{-- Índice de contenido --}}
            <section class="mb-5">
                <div class="alert alert-info">
                    <h5><i class="fas fa-list"></i> {{ __('help-admin-events.index.title') }}</h5>
                    <ul class="mb-0">
                        <li><a href="#que-es">{{ __('help-admin-events.index.items.what_is') }}</a></li>
                        <li><a href="#acceso">{{ __('help-admin-events.index.items.access') }}</a></li>
                        <li><a href="#interfaz">{{ __('help-admin-events.index.items.interface') }}</a></li>
                        <li><a href="#tipos">{{ __('help-admin-events.index.items.types') }}</a></li>
                        <li><a href="#filtrar">{{ __('help-admin-events.index.items.filter') }}</a></li>
                        <li><a href="#analizar">{{ __('help-admin-events.index.items.analyze') }}</a></li>
                        <li><a href="#casos-uso">{{ __('help-admin-events.index.items.cases') }}</a></li>
                    </ul>
                </div>
            </section>

            {{-- SECCIÓN: ¿QUÉ ES? --}}
            <section class="mb-5" id="que-es">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-question-circle"></i> {{ __('help-admin-events.section_what_is.title') }}</h3>
                
                <p>{!! __('help-admin-events.section_what_is.description') !!}</p>

                <div class="card border-info mb-3">
                    <div class="card-header bg-info text-white">
                        <strong>{{ __('help-admin-events.section_what_is.function_title') }}</strong>
                    </div>
                    <div class="card-body">
                        <p>{!! __('help-admin-events.section_what_is.function_desc') !!}</p>
                        <ul>
                            <li>{!! __('help-admin-events.section_what_is.function_items.who') !!}</li>
                            <li>{!! __('help-admin-events.section_what_is.function_items.what') !!}</li>
                            <li>{!! __('help-admin-events.section_what_is.function_items.when') !!}</li>
                            <li>{!! __('help-admin-events.section_what_is.function_items.about') !!}</li>
                        </ul>
                    </div>
                </div>

                <h4 class="mt-4"><i class="fas fa-shield-alt"></i> {{ __('help-admin-events.section_what_is.purpose_title') }}</h4>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card border-success h-100">
                            <div class="card-header bg-success text-white">
                                <i class="fas fa-check-circle"></i> {{ __('help-admin-events.section_what_is.cards.security.title') }}
                            </div>
                            <div class="card-body">
                                <ul class="mb-0">
                                    @foreach(__('help-admin-events.section_what_is.cards.security.items') as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="card border-primary h-100">
                            <div class="card-header bg-primary text-white">
                                <i class="fas fa-clipboard-check"></i> {{ __('help-admin-events.section_what_is.cards.audit.title') }}
                            </div>
                            <div class="card-body">
                                <ul class="mb-0">
                                    @foreach(__('help-admin-events.section_what_is.cards.audit.items') as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="card border-warning h-100">
                            <div class="card-header bg-warning text-dark">
                                <i class="fas fa-bug"></i> {{ __('help-admin-events.section_what_is.cards.troubleshooting.title') }}
                            </div>
                            <div class="card-body">
                                <ul class="mb-0">
                                    @foreach(__('help-admin-events.section_what_is.cards.troubleshooting.items') as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="card border-info h-100">
                            <div class="card-header bg-info text-white">
                                <i class="fas fa-chart-line"></i> {{ __('help-admin-events.section_what_is.cards.analysis.title') }}
                            </div>
                            <div class="card-body">
                                <ul class="mb-0">
                                    @foreach(__('help-admin-events.section_what_is.cards.analysis.items') as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- SECCIÓN: ACCESO --}}
            <section class="mb-5" id="acceso">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-sign-in-alt"></i> {{ __('help-admin-events.section_access.title') }}</h3>

                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i> {!! __('help-admin-events.section_access.restricted_msg') !!}
                </div>

                <h4 class="mt-4"><i class="fas fa-route"></i> {{ __('help-admin-events.section_access.how_to_title') }}</h4>
                
                <div class="card border-info">
                    <div class="card-body">
                        @foreach(__('help-admin-events.section_access.steps') as $step)
                            <p @if($loop->last) class="mb-0" @endif>{!! $step !!}</p>
                        @endforeach
                    </div>
                </div>

                <div class="alert alert-info mt-3">
                    <i class="fas fa-info-circle"></i> {!! __('help-admin-events.section_access.route_info') !!}<br>
                    <strong>URL:</strong> <code>/admin/eventHistory</code>
                </div>
            </section>

            {{-- SECCIÓN: INTERFAZ --}}
            <section class="mb-5" id="interfaz">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-desktop"></i> {{ __('help-admin-events.section_interface.title') }}</h3>

                <p>{{ __('help-admin-events.section_interface.intro') }}</p>

                <h4 class="mt-4"><i class="fas fa-table"></i> {{ __('help-admin-events.section_interface.table_title') }}</h4>

                <p>{{ __('help-admin-events.section_interface.table_desc') }}</p>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('help-admin-events.section_interface.table.headers.column') }}</th>
                                <th>{{ __('help-admin-events.section_interface.table.headers.shows') }}</th>
                                <th>{{ __('help-admin-events.section_interface.table.headers.extra') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(['type', 'description', 'user', 'date'] as $rowKey)
                                <tr>
                                    <td>{!! __('help-admin-events.section_interface.table.rows.' . $rowKey . '.name') !!}</td>
                                    <td>{{ __('help-admin-events.section_interface.table.rows.' . $rowKey . '.desc') }}</td>
                                    <td>{!! __('help-admin-events.section_interface.table.rows.' . $rowKey . '.extra') !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="alert alert-info mt-3">
                    <i class="fas fa-info-circle"></i> {!! __('help-admin-events.section_interface.note') !!}
                </div>

                <h5 class="mt-4"><i class="fas fa-sort"></i> {{ __('help-admin-events.section_interface.features_title') }}</h5>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card border-primary">
                            <div class="card-header bg-primary text-white">
                                <strong>{{ __('help-admin-events.section_interface.features.search.title') }}</strong>
                            </div>
                            <div class="card-body">
                                @foreach(__('help-admin-events.section_interface.features.search.content') as $line)
                                    <p @if($loop->last) class="mb-0" @endif>{!! $line !!}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="card border-success">
                            <div class="card-header bg-success text-white">
                                <strong>{{ __('help-admin-events.section_interface.features.sort.title') }}</strong>
                            </div>
                            <div class="card-body">
                                @foreach(__('help-admin-events.section_interface.features.sort.content') as $line)
                                    <p @if($loop->last) class="mb-0" @endif>{!! $line !!}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="card border-info">
                            <div class="card-header bg-info text-white">
                                <strong>{{ __('help-admin-events.section_interface.features.pagination.title') }}</strong>
                            </div>
                            <div class="card-body">
                                @foreach(__('help-admin-events.section_interface.features.pagination.content') as $line)
                                    <p @if($loop->last) class="mb-0" @endif>{!! $line !!}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="card border-warning">
                            <div class="card-header bg-warning text-dark">
                                <strong>{{ __('help-admin-events.section_interface.features.order.title') }}</strong>
                            </div>
                            <div class="card-body">
                                @foreach(__('help-admin-events.section_interface.features.order.content') as $line)
                                    <p @if($loop->last) class="mb-0" @endif>{!! $line !!}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- SECCIÓN: TIPOS DE EVENTOS --}}
            <section class="mb-5" id="tipos">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-tags"></i> {{ __('help-admin-events.section_types.title') }}</h3>

                <p>{{ __('help-admin-events.section_types.intro') }}</p>

                <h4 class="mt-4"><i class="fas fa-ticket-alt"></i> {{ __('help-admin-events.section_types.tickets_title') }}</h4>
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('help-admin-events.section_types.table_headers.event') }}</th>
                                <th>{{ __('help-admin-events.section_types.table_headers.when') }}</th>
                                <th>{{ __('help-admin-events.section_types.table_headers.example') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(__('help-admin-events.section_types.tickets_rows') as $row)
                                <tr>
                                    <td><code>{{ $row['code'] }}</code></td>
                                    <td>{{ $row['when'] }}</td>
                                    <td>{{ $row['example'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <h4 class="mt-5"><i class="fas fa-users"></i> {{ __('help-admin-events.section_types.users_title') }}</h4>
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('help-admin-events.section_types.table_headers.event') }}</th>
                                <th>{{ __('help-admin-events.section_types.table_headers.when') }}</th>
                                <th>{{ __('help-admin-events.section_types.table_headers.example') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(__('help-admin-events.section_types.users_rows') as $row)
                                <tr>
                                    <td><code>{{ $row['code'] }}</code></td>
                                    <td>{{ $row['when'] }}</td>
                                    <td>{{ $row['example'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <h4 class="mt-5"><i class="fas fa-user-shield"></i> {{ __('help-admin-events.section_types.admins_title') }}</h4>
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('help-admin-events.section_types.table_headers.event') }}</th>
                                <th>{{ __('help-admin-events.section_types.table_headers.when') }}</th>
                                <th>{{ __('help-admin-events.section_types.table_headers.example') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(__('help-admin-events.section_types.admins_rows') as $row)
                                <tr>
                                    <td><code>{{ $row['code'] }}</code></td>
                                    <td>{{ $row['when'] }}</td>
                                    <td>{{ $row['example'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <h4 class="mt-5"><i class="fas fa-bookmark"></i> {{ __('help-admin-events.section_types.types_title') }}</h4>
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('help-admin-events.section_types.table_headers.event') }}</th>
                                <th>{{ __('help-admin-events.section_types.table_headers.when') }}</th>
                                <th>{{ __('help-admin-events.section_types.table_headers.example') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(__('help-admin-events.section_types.types_rows') as $row)
                                <tr>
                                    <td><code>{{ $row['code'] }}</code></td>
                                    <td>{{ $row['when'] }}</td>
                                    <td>{{ $row['example'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="alert alert-info mt-3">
                    <i class="fas fa-info-circle"></i> {!! __('help-admin-events.section_types.note') !!}
                </div>
            </section>

            {{-- SECCIÓN: FILTRAR --}}
            <section class="mb-5" id="filtrar">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-search"></i> {{ __('help-admin-events.section_filter.title') }}</h3>

                <p>{{ __('help-admin-events.section_filter.intro') }}</p>

                <h4 class="mt-4"><i class="fas fa-step-forward"></i> {{ __('help-admin-events.section_filter.strategies_title') }}</h4>

                <div class="alert alert-primary">
                    <i class="fas fa-lightbulb"></i> {!! __('help-admin-events.section_filter.pro_tip') !!}
                </div>

                <h5 class="mt-3"><strong>{{ __('help-admin-events.section_filter.filter_type.title') }}</strong></h5>
                
                <div class="card border-primary mb-3">
                    <div class="card-body">
                        <p>{!! __('help-admin-events.section_filter.filter_type.goal') !!}</p>
                        
                        <p>{!! __('help-admin-events.section_filter.filter_type.method') !!}</p>
                        <ol>
                            @foreach(__('help-admin-events.section_filter.filter_type.steps') as $step)
                                <li>{!! $step !!}</li>
                            @endforeach
                        </ol>

                        <p>{!! __('help-admin-events.section_filter.filter_type.useful_terms') !!}</p>
                        <ul class="mb-0">
                            @foreach(__('help-admin-events.section_filter.filter_type.terms_list') as $term)
                                <li>{!! $term !!}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <h5 class="mt-4"><strong>{{ __('help-admin-events.section_filter.filter_user.title') }}</strong></h5>
                
                <div class="card border-success mb-3">
                    <div class="card-body">
                        <p>{!! __('help-admin-events.section_filter.filter_user.goal') !!}</p>
                        
                        <p>{!! __('help-admin-events.section_filter.filter_user.method') !!}</p>
                        <ol>
                            @foreach(__('help-admin-events.section_filter.filter_user.steps') as $step)
                                <li>{!! $step !!}</li>
                            @endforeach
                        </ol>

                        <p>{!! __('help-admin-events.section_filter.filter_user.examples') !!}</p>
                        <ul class="mb-0">
                            @foreach(__('help-admin-events.section_filter.filter_user.examples_list') as $example)
                                <li>{!! $example !!}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <h5 class="mt-4"><strong>{{ __('help-admin-events.section_filter.filter_date.title') }}</strong></h5>
                
                <div class="card border-warning mb-3">
                    <div class="card-body">
                        <p>{!! __('help-admin-events.section_filter.filter_date.goal') !!}</p>
                        
                        <p>{!! __('help-admin-events.section_filter.filter_date.for_dates') !!}</p>
                        <ul>
                            @foreach(__('help-admin-events.section_filter.filter_date.dates_list') as $item)
                                <li>{!! $item !!}</li>
                            @endforeach
                        </ul>

                        <p>{!! __('help-admin-events.section_filter.filter_date.for_content') !!}</p>
                        <ul>
                            @foreach(__('help-admin-events.section_filter.filter_date.content_list') as $item)
                                <li>{!! $item !!}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>

            {{-- SECCIÓN: ANALIZAR --}}
            <section class="mb-5" id="analizar">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-chart-bar"></i> {{ __('help-admin-events.section_analyze.title') }}</h3>

                <p>{{ __('help-admin-events.section_analyze.intro') }}</p>

                <h4 class="mt-4"><i class="fas fa-tasks"></i> {{ __('help-admin-events.section_analyze.patterns_title') }}</h4>

                <div class="row">
                    {{-- Productivity Card --}}
                    <div class="col-md-6 mb-3">
                        <div class="card border-primary h-100">
                            <div class="card-header bg-primary text-white">
                                <strong>{{ __('help-admin-events.section_analyze.cards.productivity.title') }}</strong>
                            </div>
                            <div class="card-body">
                                <p>{!! __('help-admin-events.section_analyze.cards.productivity.what') !!}</p>
                                <ul>
                                    @foreach(__('help-admin-events.section_analyze.cards.productivity.items') as $item)
                                        <li>{!! $item !!}</li>
                                    @endforeach
                                </ul>
                                <p class="mb-0">{!! __('help-admin-events.section_analyze.cards.productivity.how') !!}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Anomalies Card --}}
                    <div class="col-md-6 mb-3">
                        <div class="card border-success h-100">
                            <div class="card-header bg-success text-white">
                                <strong>{{ __('help-admin-events.section_analyze.cards.anomalies.title') }}</strong>
                            </div>
                            <div class="card-body">
                                <p>{!! __('help-admin-events.section_analyze.cards.anomalies.what') !!}</p>
                                <ul>
                                    @foreach(__('help-admin-events.section_analyze.cards.anomalies.items') as $item)
                                        <li>{!! $item !!}</li>
                                    @endforeach
                                </ul>
                                <p class="mb-0">{!! __('help-admin-events.section_analyze.cards.anomalies.how') !!}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Tracking Card --}}
                    <div class="col-md-6 mb-3">
                        <div class="card border-warning h-100">
                            <div class="card-header bg-warning text-dark">
                                <strong>{{ __('help-admin-events.section_analyze.cards.tracking.title') }}</strong>
                            </div>
                            <div class="card-body">
                                <p>{!! __('help-admin-events.section_analyze.cards.tracking.what') !!}</p>
                                <ul>
                                    @foreach(__('help-admin-events.section_analyze.cards.tracking.items') as $item)
                                        <li>{!! $item !!}</li>
                                    @endforeach
                                </ul>
                                <p class="mb-0">{!! __('help-admin-events.section_analyze.cards.tracking.how') !!}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Audit Card --}}
                    <div class="col-md-6 mb-3">
                        <div class="card border-info h-100">
                            <div class="card-header bg-info text-white">
                                <strong>{{ __('help-admin-events.section_analyze.cards.audit.title') }}</strong>
                            </div>
                            <div class="card-body">
                                <p>{!! __('help-admin-events.section_analyze.cards.audit.what') !!}</p>
                                <ul>
                                    @foreach(__('help-admin-events.section_analyze.cards.audit.items') as $item)
                                        <li>{!! $item !!}</li>
                                    @endforeach
                                </ul>
                                <p class="mb-0">{!! __('help-admin-events.section_analyze.cards.audit.how') !!}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="mt-5"><i class="fas fa-clock"></i> {{ __('help-admin-events.section_analyze.dates_title') }}</h4>

                <div class="card border-info">
                    <div class="card-body">
                        <p>{!! __('help-admin-events.section_analyze.date_format') !!}</p>
                        
                        <p>{!! __('help-admin-events.section_analyze.important_elements') !!}</p>
                        <ul>
                            @foreach(__('help-admin-events.section_analyze.elements_list') as $item)
                                <li>{!! $item !!}</li>
                            @endforeach
                        </ul>

                        <div class="alert alert-warning mb-0">
                            <i class="fas fa-exclamation-triangle"></i> {!! __('help-admin-events.section_analyze.timezone_note') !!}
                        </div>
                    </div>
                </div>
            </section>

            {{-- SECCIÓN: CASOS DE USO --}}
            <section class="mb-5" id="casos-uso">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-lightbulb"></i> {{ __('help-admin-events.section_cases.title') }}</h3>

                <p>{{ __('help-admin-events.section_cases.intro') }}</p>

                <div class="row">

                    {{-- Caso 1 --}}
                    <div class="col-12 mb-3">
                        <div class="card border-info shadow-sm">
                            <div class="card-header bg-info text-white">
                                <h5 class="mb-0"><i class="fas fa-search"></i> {{ __('help-admin-events.section_cases.cases_list.1.title') }}</h5>
                            </div>
                            <div class="card-body">
                                <p>{!! __('help-admin-events.section_cases.cases_list.1.situation') !!}</p>
                                
                                <p>{!! __('help-admin-events.section_cases.cases_list.1.solution') !!}</p>
                                <ol>
                                    @foreach(__('help-admin-events.section_cases.cases_list.1.steps') as $step)
                                        <li>{!! $step !!}</li>
                                    @endforeach
                                </ol>

                                <p class="mb-0">{!! __('help-admin-events.section_cases.cases_list.1.result') !!}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Caso 2 --}}
                    <div class="col-12 mb-3">
                        <div class="card border-primary shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0"><i class="fas fa-chart-line"></i> {{ __('help-admin-events.section_cases.cases_list.2.title') }}</h5>
                            </div>
                            <div class="card-body">
                                <p>{!! __('help-admin-events.section_cases.cases_list.2.situation') !!}</p>
                                
                                <p>{!! __('help-admin-events.section_cases.cases_list.2.solution') !!}</p>
                                <ol>
                                    @foreach(__('help-admin-events.section_cases.cases_list.2.steps') as $step)
                                        <li>{!! $step !!}</li>
                                    @endforeach
                                </ol>

                                <p class="mb-0">{!! __('help-admin-events.section_cases.cases_list.2.result') !!}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Caso 3 --}}
                    <div class="col-12 mb-3">
                        <div class="card border-warning shadow-sm">
                            <div class="card-header bg-warning text-dark">
                                <h5 class="mb-0"><i class="fas fa-user-secret"></i> {{ __('help-admin-events.section_cases.cases_list.3.title') }}</h5>
                            </div>
                            <div class="card-body">
                                <p>{!! __('help-admin-events.section_cases.cases_list.3.situation') !!}</p>
                                
                                <p>{!! __('help-admin-events.section_cases.cases_list.3.solution') !!}</p>
                                <ol>
                                    @foreach(__('help-admin-events.section_cases.cases_list.3.steps') as $step)
                                        <li>{!! $step !!}</li>
                                    @endforeach
                                </ol>

                                <p class="mb-0">{!! __('help-admin-events.section_cases.cases_list.3.result') !!}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Caso 4 --}}
                    <div class="col-12 mb-3">
                        <div class="card border-danger shadow-sm">
                            <div class="card-header bg-danger text-white">
                                <h5 class="mb-0"><i class="fas fa-trash-alt"></i> {{ __('help-admin-events.section_cases.cases_list.4.title') }}</h5>
                            </div>
                            <div class="card-body">
                                <p>{!! __('help-admin-events.section_cases.cases_list.4.situation') !!}</p>
                                
                                <p>{!! __('help-admin-events.section_cases.cases_list.4.solution') !!}</p>
                                <ol>
                                    @foreach(__('help-admin-events.section_cases.cases_list.4.steps') as $step)
                                        <li>{!! $step !!}</li>
                                    @endforeach
                                </ol>

                                <p class="mb-0">{!! __('help-admin-events.section_cases.cases_list.4.result') !!}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Caso 5 --}}
                    <div class="col-12 mb-3">
                        <div class="card border-secondary shadow-sm">
                            <div class="card-header bg-secondary text-white">
                                <h5 class="mb-0"><i class="fas fa-file-contract"></i> {{ __('help-admin-events.section_cases.cases_list.5.title') }}</h5>
                            </div>
                            <div class="card-body">
                                <p>{!! __('help-admin-events.section_cases.cases_list.5.situation') !!}</p>
                                
                                <p>{!! __('help-admin-events.section_cases.cases_list.5.solution') !!}</p>
                                <ol>
                                    @foreach(__('help-admin-events.section_cases.cases_list.5.steps') as $step)
                                        <li>{!! $step !!}</li>
                                    @endforeach
                                </ol>

                                <p class="mb-0">{!! __('help-admin-events.section_cases.cases_list.5.result') !!}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            {{-- SECCIÓN: BUENAS PRÁCTICAS --}}
            <section class="mb-5">
                <h3 class="text-primary border-bottom pb-2">{{ __('help-admin-events.section_practices.title') }}</h3>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card border-success h-100">
                            <div class="card-header bg-success text-white">
                                <i class="fas fa-check-circle"></i> {{ __('help-admin-events.section_practices.recommendations_title') }}
                            </div>
                            <div class="card-body">
                                <ul class="mb-0">
                                    @foreach(__('help-admin-events.section_practices.recommendations_list') as $item)
                                        <li>{!! $item !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="card border-danger h-100">
                            <div class="card-header bg-danger text-white">
                                <i class="fas fa-exclamation-triangle"></i> {{ __('help-admin-events.section_practices.errors_title') }}
                            </div>
                            <div class="card-body">
                                <ul class="mb-0">
                                    @foreach(__('help-admin-events.section_practices.errors_list') as $item)
                                        <li>{!! $item !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
