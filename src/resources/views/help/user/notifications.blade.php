@extends('layouts.user')

@section('title', __('help.notifications_page.title'))

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            {{-- What are notifications? --}}
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-bell mr-2"></i> {{ __('help.notifications_page.intro.title') }}</h3>
                </div>
                <div class="card-body">
                    <p>{{ __('help.notifications_page.intro.text') }}</p>
                </div>
            </div>

            {{-- How to Access --}}
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('help.notifications_page.access.title') }}</h3>
                </div>
                <div class="card-body">
                    <p>{!! __('help.notifications_page.access.subtitle') !!}</p>

                    <div class="row">
                        <div class="col-md-6">
                            <h5>{{ __('help.notifications_page.access.option1.title') }}</h5>
                            <p>{!! __('help.notifications_page.access.option1.text') !!}</p>
                            <div class="callout callout-warning">
                                <strong>{{ __('help.notifications_page.access.option1.alert_title') }}</strong>
                                <ul>
                                    <li>{!! __('help.notifications_page.access.option1.list.1') !!}</li>
                                    <li>{{ __('help.notifications_page.access.option1.list.2') }}</li>
                                </ul>
                            </div>
                            <p>{!! __('help.notifications_page.access.option1.action') !!}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>{{ __('help.notifications_page.access.option2.title') }}</h5>
                            <p>{!! __('help.notifications_page.access.option2.text') !!}</p>

                            <div class="text-center mt-4">
                                <!-- Placeholder for access screenshot -->
                                <img src="/img/sidemenu-notification-section.png" 
                                     alt="{{ __('help.notifications_page.access.option2.screenshot_alt') }}" 
                                     class="img-fluid border shadow-sm rounded">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- The Screen --}}
            <div class="card card-outline card-purple">
                <div class="card-header">
                    <h3 class="card-title">{{ __('help.notifications_page.screen.title') }}</h3>
                </div>
                <div class="card-body">
                    <p>{{ __('help.notifications_page.screen.intro') }}</p>

                    <h5>{{ __('help.notifications_page.screen.location.title') }}</h5>
                    <p>{{ __('help.notifications_page.screen.location.text') }}</p>
                    <div class="bg-light p-2 rounded mb-3">
                        <code>{{ __('help.notifications_page.screen.location.path') }}</code>
                    </div>
                    <p class="text-muted small">{{ __('help.notifications_page.screen.location.note') }}</p>

                    <div class="text-center my-3">
                        <img src="/img/user-notifications-table.png" 
                             alt="{{ __('help.notifications_page.screen.screenshot_alt') }}" 
                             class="img-fluid border shadow-sm rounded">
                    </div>

                    <h5 class="mt-4">{{ __('help.notifications_page.screen.table.title') }}</h5>
                    <p>{!! __('help.notifications_page.screen.table.intro') !!}</p>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th>{{ __('help.notifications_page.screen.table.headers.col') }}</th>
                                    <th>{{ __('help.notifications_page.screen.table.headers.what') }}</th>
                                    <th>{{ __('help.notifications_page.screen.table.headers.example') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>{{ __('help.notifications_page.screen.table.columns.type') }}</strong></td>
                                    <td>{{ __('help.notifications_page.screen.table.columns.type_desc') }}</td>
                                    <td>{{ __('help.notifications_page.screen.table.columns.type_example') }}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('help.notifications_page.screen.table.columns.content') }}</strong></td>
                                    <td>{{ __('help.notifications_page.screen.table.columns.content_desc') }}</td>
                                    <td>{{ __('help.notifications_page.screen.table.columns.content_example') }}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('help.notifications_page.screen.table.columns.date') }}</strong></td>
                                    <td>{{ __('help.notifications_page.screen.table.columns.date_desc') }}</td>
                                    <td>{{ __('help.notifications_page.screen.table.columns.date_example') }}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('help.notifications_page.screen.table.columns.actions') }}</strong></td>
                                    <td>{{ __('help.notifications_page.screen.table.columns.actions_desc') }}</td>
                                    <td>{{ __('help.notifications_page.screen.table.columns.actions_example') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Types --}}
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">{{ __('help.notifications_page.types.title') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach(['comment', 'status', 'created', 'closed', 'reopened'] as $type)
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="card h-100 border shadow-none bg-light">
                                <div class="card-header font-weight-bold">
                                    {{ __('help.notifications_page.types.'.$type.'.title') }}
                                </div>
                                <div class="card-body">
                                    <p>{!! __('help.notifications_page.types.'.$type.'.when') !!}</p>
                                    <p>{!! __('help.notifications_page.types.'.$type.'.what') !!}</p>
                                    <p class="mb-0">{!! __('help.notifications_page.types.'.$type.'.why') !!}</p>
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
                    <h3 class="card-title">{{ __('help.notifications_page.tools.title') }}</h3>
                </div>
                <div class="card-body">
                    <p>{{ __('help.notifications_page.tools.intro') }}</p>

                    <div class="row">
                        <div class="col-md-6">
                            <h5><i class="fas fa-search mr-1"></i> {{ __('help.notifications_page.tools.search.title') }}</h5>
                            <p>{!! __('help.notifications_page.tools.search.text') !!}</p>
                            <ul>
                                <li>{{ __('help.notifications_page.tools.search.list.1') }}</li>
                                <li>{{ __('help.notifications_page.tools.search.list.2') }}</li>
                                <li>{{ __('help.notifications_page.tools.search.list.3') }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5><i class="fas fa-list-ol mr-1"></i> {{ __('help.notifications_page.tools.records.title') }}</h5>
                            <p>{!! __('help.notifications_page.tools.records.text') !!}</p>
                            <ul>
                                <li>{{ __('help.notifications_page.tools.records.list.10') }}</li>
                                <li>{{ __('help.notifications_page.tools.records.list.25') }}</li>
                                <li>{{ __('help.notifications_page.tools.records.list.50') }}</li>
                                <li>{{ __('help.notifications_page.tools.records.list.100') }}</li>
                            </ul>
                            <small class="text-muted">{{ __('help.notifications_page.tools.records.note') }}</small>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5><i class="fas fa-file-alt mr-1"></i> {{ __('help.notifications_page.tools.pagination.title') }}</h5>
                            <p>{{ __('help.notifications_page.tools.pagination.text') }}</p>
                            <div class="bg-light p-2 mb-2 text-center rounded">
                                <code>{{ __('help.notifications_page.tools.pagination.example') }}</code>
                            </div>
                            <ul>
                                <li>{!! __('help.notifications_page.tools.pagination.list.nav') !!}</li>
                                <li>{!! __('help.notifications_page.tools.pagination.list.jump') !!}</li>
                                <li>{!! __('help.notifications_page.tools.pagination.list.info') !!}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5><i class="fas fa-sort mr-1"></i> {{ __('help.notifications_page.tools.sort.title') }}</h5>
                            <p>{{ __('help.notifications_page.tools.sort.text') }}</p>
                            <ul>
                                <li>{!! __('help.notifications_page.tools.sort.list.asc') !!}</li>
                                <li>{!! __('help.notifications_page.tools.sort.list.desc') !!}</li>
                                <li>{!! __('help.notifications_page.tools.sort.list.visual') !!}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Actions & Modal --}}
            <div class="card card-outline card-orange">
                <div class="card-header">
                    <h3 class="card-title">{{ __('help.notifications_page.actions.title') }} & {{ __('help.notifications_page.modal.title') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <h4>{{ __('help.notifications_page.actions.title') }}</h4>
                            <p>{!! __('help.notifications_page.actions.intro') !!}</p>

                            <div class="mb-4">
                                <h5><i class="fas fa-eye text-info mr-1"></i> {{ __('help.notifications_page.actions.details.title') }}</h5>
                                <p>{!! __('help.notifications_page.actions.details.what') !!}</p>
                                <p>{!! __('help.notifications_page.actions.details.when') !!}</p>
                            </div>

                            <div class="mb-4">
                                <h5>{{ __('help.notifications_page.actions.mark.title') }}</h5>
                                <p>{!! __('help.notifications_page.actions.mark.desc') !!}</p>

                                <div class="callout callout-info">
                                    <h6>{{ __('help.notifications_page.actions.mark.unread_state.title') }}</h6>
                                    <ul>
                                        <li>{!! __('help.notifications_page.actions.mark.unread_state.list.visual') !!}</li>
                                        <li>{!! __('help.notifications_page.actions.mark.unread_state.list.hover') !!}</li>
                                        <li>{!! __('help.notifications_page.actions.mark.unread_state.list.action') !!}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h4>{{ __('help.notifications_page.modal.title') }}</h4>
                            <p>{!! __('help.notifications_page.modal.intro') !!}</p>

                            <h5>{{ __('help.notifications_page.modal.look.title') }}</h5>
                            <p>{!! __('help.notifications_page.modal.look.desc') !!}</p>

                            <ol>
                                <li><strong>{{ __('help.notifications_page.modal.look.part1.title') }}:</strong> {!! __('help.notifications_page.modal.look.part1.text') !!}</li>
                                <li><strong>{{ __('help.notifications_page.modal.look.part2.title') }}:</strong> {!! __('help.notifications_page.modal.look.part2.text') !!}</li>

                                {{-- AdminLTE Expanded Cards (Data-Widget) --}}
                                <div class="my-3">
                                    @foreach(['comment', 'status', 'created', 'closed', 'reopened'] as $type)
                                    <div class="card card-primary card-outline collapsed-card mb-2">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                {{ __('help.notifications_page.modal.look.accordion.'.$type) }}
                                            </h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body p-0" style="display: none;">
                                            <div class="bg-light p-3">
                                                <pre class="mb-0 text-sm" style="white-space: pre-wrap;">{{ __('help.notifications_page.modal.look.accordion.'.$type.'_content') }}</pre>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <li><strong>{{ __('help.notifications_page.modal.look.part3.title') }}:</strong> {!! __('help.notifications_page.modal.look.part3.text') !!}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Timeline Example --}}
            <div class="card card-outline card-maroon">
                <div class="card-header">
                    <h3 class="card-title">{{ __('help.notifications_page.example.title') }}</h3>
                </div>
                <div class="card-body">
                    <p>{{ __('help.notifications_page.example.intro') }}</p>

                    <div class="timeline ml-3">
                        @foreach(range(1, 5) as $i)
                        <div>
                            <i class="fas fa-circle bg-blue"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header"><strong>{{ __('help.notifications_page.example.step'.$i.'.title') }}</strong></h3>
                                <div class="timeline-body">
                                    {!! __('help.notifications_page.example.step'.$i.'.text') !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div>
                            <i class="fas fa-clock bg-gray"></i> {{-- End of timeline --}}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Extra info (Empty state & Language) --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="callout callout-info">
                        <h5>{{ __('help.notifications_page.empty.title') }}</h5>
                        <p>{!! __('help.notifications_page.empty.text') !!}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="callout callout-warning">
                        <h5>{{ __('help.notifications_page.language.title') }}</h5>
                        <p>{!! __('help.notifications_page.language.text') !!}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection