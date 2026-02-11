@extends('layouts.admin')

@section('title', 'Documentación - ' . __('help-admin-notifications.header.title'))

@section('admincontent')

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            
            {{-- Header --}}
            <div class="mb-4">
                <h1><i class="fas fa-bell"></i> {{ __('help-admin-notifications.header.title') }}</h1>
                <p class="lead text-muted">{{ __('help-admin-notifications.header.subtitle') }}</p>
            </div>

            {{-- What are notifications? --}}
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-info-circle mr-2"></i> {{ __('help-admin-notifications.section_intro.title') }}</h3>
                </div>
                <div class="card-body">
                    <p>{{ __('help-admin-notifications.section_intro.content') }}</p>
                </div>
            </div>

            {{-- How to Access --}}
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-door-open mr-2"></i> {{ __('help-admin-notifications.section_access.title') }}</h3>
                </div>
                <div class="card-body">
                    <p>{!! __('help-admin-notifications.section_access.intro') !!}</p>

                    <div class="row">
                        <div class="col-md-6">
                            <h5>{{ __('help-admin-notifications.section_access.option_1.title') }}</h5>
                            <p>{{ __('help-admin-notifications.section_access.option_1.desc') }}</p>
                            <div class="callout callout-warning">
                                <strong>{{ __('help-admin-notifications.section_access.option_1.alert_title') }}</strong>
                                <ul>
                                    @foreach(__('help-admin-notifications.section_access.option_1.steps') as $step)
                                        <li>{!! $step !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <p>{{ __('help-admin-notifications.section_access.option_1.note') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>{{ __('help-admin-notifications.section_access.option_2.title') }}</h5>
                            <p>{{ __('help-admin-notifications.section_access.option_2.desc') }}</p>

                            <div class="text-center mt-4">
                                <div class="border p-3 bg-light text-muted rounded">
                                    <img src="/img/admin-notifications-table.png" alt="Notifications Dropdown" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- The Screen --}}
            <div class="card card-outline card-purple">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-table mr-2"></i> {{ __('help-admin-notifications.section_screen.title') }}</h3>
                </div>
                <div class="card-body">
                    <p>{{ __('help-admin-notifications.section_screen.intro') }}</p>

                    <h5 class="mt-4">{{ __('help-admin-notifications.section_screen.table_title') }}</h5>
                    <p>{{ __('help-admin-notifications.section_screen.table_desc') }}</p>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th>{{ __('help-admin-notifications.section_screen.table_headers.col') }}</th>
                                    <th>{{ __('help-admin-notifications.section_screen.table_headers.desc') }}</th>
                                    <th>{{ __('help-admin-notifications.section_screen.table_headers.example') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(__('help-admin-notifications.section_screen.table_rows') as $row)
                                    <tr>
                                        <td><strong>{{ $row['col'] }}</strong></td>
                                        <td>{{ $row['desc'] }}</td>
                                        <td>{!! $row['example'] !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Logic & Scenarios --}}
            <div class="card card-outline card-dark">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-brain mr-2"></i> {{ __('help-admin-notifications.section_logic.title') }}</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-4">{{ __('help-admin-notifications.section_logic.subtitle') }}</p>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="callout callout-info">
                                <h5>{{ __('help-admin-notifications.section_logic.cards.new_ticket.title') }}</h5>
                                <p>{!! __('help-admin-notifications.section_logic.cards.new_ticket.who') !!}</p>
                                <small class="text-muted">{{ __('help-admin-notifications.section_logic.cards.new_ticket.why') }}</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="callout callout-success">
                                <h5>{{ __('help-admin-notifications.section_logic.cards.assigned_reply.title') }}</h5>
                                <p>{!! __('help-admin-notifications.section_logic.cards.assigned_reply.who') !!}</p>
                                <small class="text-muted">{{ __('help-admin-notifications.section_logic.cards.assigned_reply.why') }}</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="callout callout-danger">
                                <h5>{{ __('help-admin-notifications.section_logic.cards.unassigned_reply.title') }}</h5>
                                <p>{!! __('help-admin-notifications.section_logic.cards.unassigned_reply.who') !!}</p>
                                <small class="text-muted">{{ __('help-admin-notifications.section_logic.cards.unassigned_reply.why') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Types --}}
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-tags mr-2"></i> {{ __('help-admin-notifications.section_types.title') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach(__('help-admin-notifications.section_types.cards') as $key => $card)
                        @php
                            $headerClass = match($key) {
                                'comment' => 'text-primary',
                                'new_ticket' => 'text-success',
                                'reopened' => 'text-secondary',
                                default => 'text-primary'
                            };
                        @endphp
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="card h-100 border shadow-none bg-light">
                                <div class="card-header font-weight-bold {{ $headerClass }}">
                                    {{ $card['title'] }}
                                </div>
                                <div class="card-body">
                                    <p>{{ $card['desc'] }}</p>
                                    <p class="small text-muted">{{ $card['priority'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Tools --}}
            <div class="card card-outline card-secondary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-tools mr-2"></i> {{ __('help-admin-notifications.section_tools.title') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5><i class="fas fa-search mr-1"></i> {{ __('help-admin-notifications.section_tools.search.title') }}</h5>
                            <p>{{ __('help-admin-notifications.section_tools.search.desc') }}</p>
                            <ul>
                                @foreach(__('help-admin-notifications.section_tools.search.items') as $item)
                                    <li>{!! $item !!}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5><i class="fas fa-filter mr-1"></i> {{ __('help-admin-notifications.section_tools.organization.title') }}</h5>
                            <p>{{ __('help-admin-notifications.section_tools.organization.desc') }}</p>
                            <small class="text-muted">{{ __('help-admin-notifications.section_tools.organization.tip') }}</small>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Actions & Modal --}}
            <div class="card card-outline card-orange">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-mouse-pointer mr-2"></i> {{ __('help-admin-notifications.section_actions.title') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p>{{ __('help-admin-notifications.section_actions.intro') }}</p>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="info-box shadow-none border">
                                <span class="info-box-icon bg-info"><i class="fas fa-eye"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><strong>{{ __('help-admin-notifications.section_actions.buttons.view.title') }}</strong></span>
                                    <span class="info-box-number small font-weight-normal">{{ __('help-admin-notifications.section_actions.buttons.view.desc') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box shadow-none border">
                                <span class="info-box-icon bg-success"><i class="fas fa-check"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><strong>{{ __('help-admin-notifications.section_actions.buttons.mark_read.title') }}</strong></span>
                                    <span class="info-box-number small font-weight-normal">{{ __('help-admin-notifications.section_actions.buttons.mark_read.desc') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Workflow Example --}}
            <div class="card card-outline card-maroon">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-project-diagram mr-2"></i> {{ __('help-admin-notifications.section_workflow.title') }}</h3>
                </div>
                <div class="card-body">
                    <div class="timeline ml-3">
                        @foreach(__('help-admin-notifications.section_workflow.steps') as $key => $step)
                        @php
                            $icon = match($key) {
                                1 => 'fas fa-bell bg-warning',
                                2 => 'fas fa-eye bg-primary',
                                3 => 'fas fa-external-link-alt bg-secondary',
                                4 => 'fas fa-check bg-success',
                                default => 'fas fa-clock bg-gray'
                            };
                        @endphp
                        <div>
                            <i class="{{ $icon }}"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header"><strong>{{ $step['title'] }}</strong></h3>
                                <div class="timeline-body">
                                    {{ $step['desc'] }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div>
                            <i class="fas fa-clock bg-gray"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

