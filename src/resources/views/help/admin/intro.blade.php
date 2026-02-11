@extends('layouts.admin')

@section('title', __('help.admin_intro_page.title'))

@section('admincontent')
<div class="container-fluid">
    <div class="row">
        {{-- MAIN CONTENT --}}
        <div class="col-12">

            {{-- 1. BIENVENIDA Y FILOSOFÍA --}}
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-home mr-2"></i> {{ __('help.admin_intro_page.welcome.title') }}</h3>
                </div>
                <div class="card-body">
                    <p class="lead mb-4">
                        {!! __('help.admin_intro_page.welcome.text') !!}
                    </p>

                    <div class="row">
                        <div class="col-md-8">
                            <p>
                                {{ __('help.admin_intro_page.welcome.role_desc') }}
                            </p>
                            <h5 class="mt-4 text-primary">{{ __('help.admin_intro_page.welcome.pillars_title') }}</h5>
                            <ul class="mt-2">
                                <li>{!! __('help.admin_intro_page.welcome.pillars.centralization') !!}</li>
                                <li>{!! __('help.admin_intro_page.welcome.pillars.traceability') !!}</li>
                                <li>{!! __('help.admin_intro_page.welcome.pillars.efficiency') !!}</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="alert alert-info h-100 d-flex flex-column justify-content-center">
                                <h5><i class="fas fa-bullseye mr-2"></i> {{ __('help.admin_intro_page.welcome.goal_title') }}</h5>
                                <p class="mb-0">{{ __('help.admin_intro_page.welcome.goal_text') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 2. DASHBOARD OVERVIEW --}}
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-tachometer-alt mr-2"></i> {{ __('help.admin_intro_page.dashboard.title') }}</h3>
                </div>
                <div class="card-body">
                    <p class="mb-4">
                        {!! __('help.admin_intro_page.dashboard.intro') !!}
                    </p>

                    {{-- SCREENSHOT --}}
                    <div class="text-center mb-5 p-3 bg-light border rounded">
                        <img src="/img/admin-control-panel.png"
                            alt="Dashboard General"
                            class="img-fluid shadow-sm rounded">
                        <p class="text-muted small mt-2">
                            <em>{{ __('help.admin_intro_page.dashboard.img_caption') }}</em>
                        </p>
                    </div>

                    <h5 class="text-primary mb-3"><i class="fas fa-chart-pie mr-2"></i> {{ __('help.admin_intro_page.dashboard.cards_title') }}</h5>
                    <p class="text-muted mb-3">
                        {!! __('help.admin_intro_page.dashboard.cards_note') !!}
                    </p>

                    <div class="alert alert-info mb-4">
                        <i class="fas fa-info-circle mr-2"></i>
                        {!! __('help.admin_intro_page.dashboard.superadmin_note') !!}
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="small-box bg-info text-white shadow-sm">
                                <div class="inner">
                                    <h3 class="font-weight-bold">0</h3>
                                    <p class="mb-0">{{ __('help.admin_intro_page.dashboard.users_card.title') }}</p>
                                </div>
                                <div class="icon" style="opacity: 0.3;">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <p class="text-muted small mt-2">
                                <i class="fas fa-info-circle mr-1"></i>
                                {{ __('help.admin_intro_page.dashboard.users_card.desc') }}
                            </p>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="small-box bg-secondary text-white shadow-sm">
                                <div class="inner">
                                    <h3 class="font-weight-bold">0</h3>
                                    <p class="mb-0">{{ __('help.admin_intro_page.dashboard.admins_card.title') }}</p>
                                </div>
                                <div class="icon" style="opacity: 0.3;">
                                    <i class="fas fa-user-shield"></i>
                                </div>
                            </div>
                            <p class="text-muted small mt-2">
                                <i class="fas fa-info-circle mr-1"></i>
                                {{ __('help.admin_intro_page.dashboard.admins_card.desc') }}
                            </p>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="small-box bg-success text-white shadow-sm">
                                <div class="inner">
                                    <h3 class="font-weight-bold">0</h3>
                                    <p class="mb-0">{{ __('help.admin_intro_page.dashboard.assigned_tickets_card.title') }}</p>
                                </div>
                                <div class="icon" style="opacity: 0.3;">
                                    <i class="fas fa-clipboard-list"></i>
                                </div>
                            </div>
                            <p class="text-muted small mt-2">
                                <i class="fas fa-info-circle mr-1"></i>
                                {{ __('help.admin_intro_page.dashboard.assigned_tickets_card.desc') }}
                            </p>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="small-box bg-warning text-white shadow-sm">
                                <div class="inner">
                                    <h3 class="font-weight-bold">0</h3>
                                    <p class="mb-0">{{ __('help.admin_intro_page.dashboard.total_tickets_card.title') }}</p>
                                </div>
                                <div class="icon" style="opacity: 0.3;">
                                    <i class="fas fa-ticket-alt"></i>
                                </div>
                            </div>
                            <p class="text-muted small mt-2">
                                <i class="fas fa-info-circle mr-1"></i>
                                {{ __('help.admin_intro_page.dashboard.total_tickets_card.desc') }}
                            </p>
                        </div>
                    </div>

                    <h5 class="text-primary mb-3 mt-4"><i class="fas fa-history mr-2"></i> {{ __('help.admin_intro_page.dashboard.events_title') }}</h5>
                    <p class="text-muted mb-3">
                        {!! __('help.admin_intro_page.dashboard.events_text') !!}
                    </p>
                    <div>
                        <i class="fas fa-link mr-2"></i>
                        {!! __('help.admin_intro_page.dashboard.events_link') !!}

                        <div class="text-center mb-5 p-3 bg-light border rounded">
                            <img src="/img/event-history-table-summary.png" class="img-fluid mt-3 border shadow-sm" alt="Tarjeta de eventos recientes">
                            <p class="text-muted small mt-2">{{ __('help.admin_intro_page.dashboard.events_caption') }}</p>
                        </div>
                    </div>

                    <h5 class="text-primary mb-3 mt-4"><i class="fas fa-bell mr-2"></i> {{ __('help.admin_intro_page.dashboard.notifications_title') }}</h5>
                    <p class="text-muted mb-3">
                        {!! __('help.admin_intro_page.dashboard.notifications_text') !!}
                    </p>
                    <div>
                        <i class="fas fa-eye mr-2"></i>
                        {!! __('help.admin_intro_page.dashboard.notifications_link') !!}

                        <div class="text-center mb-5 p-3 bg-light border rounded">
                            <img src="/img/notifications-list-summary.png" class="img-fluid mt-3 border shadow-sm" alt="Tarjeta de notificaciones recientes">
                            <p class="text-muted small mt-2">{{ __('help.admin_intro_page.dashboard.notifications_caption') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 3. NAVEGACIÓN LATERAL --}}
            <div class="card card-outline card-dark">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-compass mr-2"></i> {{ __('help.admin_intro_page.navigation.title') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 border-right">
                            <h5 class="mb-3">{{ __('help.admin_intro_page.navigation.sidebar_title') }}</h5>
                            <p>{{ __('help.admin_intro_page.navigation.sidebar_desc') }}</p>

                            <dl class="row mt-4">
                                <dt class="col-sm-4 text-primary"><i class="fas fa-tachometer-alt mr-2"></i> {{ __('help.admin_intro_page.navigation.dashboard.term') }}</dt>
                                <dd class="col-sm-8">{{ __('help.admin_intro_page.navigation.dashboard.desc') }}</dd>

                                <dt class="col-sm-4 text-warning"><i class="fas fa-ticket-alt mr-2"></i> {{ __('help.admin_intro_page.navigation.tickets.term') }}</dt>
                                <dd class="col-sm-8">
                                    {{ __('help.admin_intro_page.navigation.tickets.desc') }}
                                    <ul class="pl-3 mb-0">
                                        <li>{!! __('help.admin_intro_page.navigation.tickets.list.manage') !!}</li>
                                        <li>{!! __('help.admin_intro_page.navigation.tickets.list.assigned') !!}</li>
                                    </ul>
                                </dd>

                                <dt class="col-sm-4 text-success"><i class="fas fa-users-cog mr-2"></i> {{ __('help.admin_intro_page.navigation.users.term') }}</dt>
                                <dd class="col-sm-8">{!! __('help.admin_intro_page.navigation.users.desc') !!}</dd>

                                <dt class="col-sm-4 text-secondary"><i class="fas fa-cogs mr-2"></i> {{ __('help.admin_intro_page.navigation.config.term') }}</dt>
                                <dd class="col-sm-8">{{ __('help.admin_intro_page.navigation.config.desc') }}</dd>
                            </dl>
                        </div>

                        <div class="col-md-6 pl-md-4">
                            <h5 class="text-dark mb-3">{{ __('help.admin_intro_page.navigation.icons_title') }}</h5>
                            <p class="small text-muted mb-3">{{ __('help.admin_intro_page.navigation.icons_desc') }}</p>

                            <table class="table table-hover table-sm border-bottom">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center" style="width: 60px;">{{ __('help.admin_intro_page.navigation.table.icon') }}</th>
                                        <th>{{ __('help.admin_intro_page.navigation.table.action') }}</th>
                                        <th>{{ __('help.admin_intro_page.navigation.table.desc') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle"><span class="badge badge-info p-2"><i class="fas fa-eye"></i></span></td>
                                        <td class="align-middle"><strong>{{ __('help.admin_intro_page.navigation.table.view.action') }}</strong></td>
                                        <td class="align-middle text-muted small">{{ __('help.admin_intro_page.navigation.table.view.desc') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle"><span class="badge badge-warning p-2"><i class="fas fa-edit"></i></span></td>
                                        <td class="align-middle"><strong>{{ __('help.admin_intro_page.navigation.table.edit.action') }}</strong></td>
                                        <td class="align-middle text-muted small">{{ __('help.admin_intro_page.navigation.table.edit.desc') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle"><span class="badge badge-success p-2"><i class="fas fa-check"></i></span></td>
                                        <td class="align-middle"><strong>{{ __('help.admin_intro_page.navigation.table.resolve.action') }}</strong></td>
                                        <td class="align-middle text-muted small">{{ __('help.admin_intro_page.navigation.table.resolve.desc') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle"><span class="badge badge-danger p-2"><i class="fas fa-trash-alt"></i></span></td>
                                        <td class="align-middle"><strong>{{ __('help.admin_intro_page.navigation.table.delete.action') }}</strong></td>
                                        <td class="align-middle text-muted small">{{ __('help.admin_intro_page.navigation.table.delete.desc') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 4. CONSEJOS --}}
            <div class="alert alert-light border shadow-sm">
                <h5><i class="fas fa-lightbulb text-warning mr-2"></i> {{ __('help.admin_intro_page.tips.title') }}</h5>
                <ul class="mb-0 pl-3">
                    <li>{!! __('help.admin_intro_page.tips.list.search') !!}</li>
                    <li>{!! __('help.admin_intro_page.tips.list.close') !!}</li>
                    <li>{!! __('help.admin_intro_page.tips.list.notifications') !!}</li>
                </ul>
            </div>

        </div>
    </div>
</div>
@endsection