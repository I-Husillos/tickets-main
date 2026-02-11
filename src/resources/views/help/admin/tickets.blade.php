@extends('layouts.admin')

@section('title', __('help-admin-tickets.meta_title'))

@section('admincontent')
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header bg-success text-white">
            <h2 class="mb-0"><i class="fas fa-ticket-alt"></i> {{ __('help-admin-tickets.header_title') }}</h2>
            <p class="mb-0 mt-2">{{ __('help-admin-tickets.header_subtitle') }}</p>
        </div>
        <div class="card-body">
            
            {{-- Índice de contenido --}}
            <section class="mb-5">
                <div class="alert alert-info">
                    <h5><i class="fas fa-list"></i> {{ __('help-admin-tickets.index_title') }}</h5>
                    <ul class="mb-0">
                        <li><a href="#listado">{{ __('help-admin-tickets.index_items.list') }}</a></li>
                        <li><a href="#tipos">{{ __('help-admin-tickets.index_items.states') }}</a></li>
                        <li><a href="#asignados">{{ __('help-admin-tickets.index_items.assigned') }}</a></li>
                        <li><a href="#detalles">{{ __('help-admin-tickets.index_items.details') }}</a></li>
                        <li><a href="#editar">{{ __('help-admin-tickets.index_items.edit') }}</a></li>
                        <li><a href="#comentarios">{{ __('help-admin-tickets.index_items.comments') }}</a></li>
                        <li><a href="#asignar">{{ __('help-admin-tickets.index_items.assign') }}</a></li>
                    </ul>
                </div>
            </section>

            {{-- SECCIÓN: ACCESO Y DIFERENCIAS --}}
            <section class="mb-5">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-door-open"></i> {{ __('help-admin-tickets.access.title') }}</h3>
                
                <p>{{ __('help-admin-tickets.access.intro') }}</p>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-info h-100">
                            <div class="card-header bg-info text-white">
                                <h5 class="mb-0"><i class="fas fa-user"></i> {{ __('help-admin-tickets.access.normal_admin') }}</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Opción en el menú:</strong> {{ __('help-admin-tickets.access.normal_option') }}</p>
                                <p><strong>Qué ves:</strong> {!! __('help-admin-tickets.access.normal_view') !!}</p>
                                <p><strong>Ruta de navegación:</strong></p>
                                <ul>
                                    <li>{!! __('help-admin-tickets.access.normal_path') !!}</li>
                                    <li>{!! __('help-admin-tickets.access.normal_appears') !!}</li>
                                </ul>
                                <p class="mb-0"><strong>{{ __('help-admin-tickets.access.normal_limit') }}</strong></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-danger h-100">
                            <div class="card-header bg-danger text-white">
                                <h5 class="mb-0"><i class="fas fa-user-shield"></i> {{ __('help-admin-tickets.access.super_admin') }}</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Opciones en el menú:</strong> {{ __('help-admin-tickets.access.super_options') }}</p>
                                <p><strong>Qué ves en "Gestionar Tickets":</strong> {!! __('help-admin-tickets.access.super_view_manage') !!}</p>
                                <p><strong>Qué ves en "Ver Mis Tickets":</strong> {{ __('help-admin-tickets.access.super_view_mine') }}</p>
                                <p class="mb-0"><strong>{{ __('help-admin-tickets.access.super_advantage') }}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- SECCIÓN: LISTADO DE TICKETS --}}
            <section class="mb-5" id="listado">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-list"></i> {{ __('help-admin-tickets.list.title') }}</h3>

                <h4 class="mt-4"><i class="fas fa-table"></i> {{ __('help-admin-tickets.list.columns_title') }}</h4>
                <p>{{ __('help-admin-tickets.list.columns_intro') }}</p>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('help-admin-tickets.list.table_head.col') }}</th>
                                <th>{{ __('help-admin-tickets.list.table_head.show') }}</th>
                                <th>{{ __('help-admin-tickets.list.table_head.purpose') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(__('help-admin-tickets.list.cols') as $col)
                            <tr>
                                <td><strong>{{ $col['name'] }}</strong></td>
                                <td>{{ $col['desc'] }}</td>
                                <td>{{ $col['purpose'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-center mb-5 p-3 bg-light border rounded">
                            <img src="/img/admin-tickets-table.png" class="img-fluid mt-3 border shadow-sm" alt="{{ __('help-admin-tickets.list.img_alt') }}">
                            <p class="text-muted small mt-2">{{ __('help-admin-tickets.list.img_alt') }}</p>
                    </div>
                </div>

                {{-- Herramientas de la tabla --}}
                <h4 class="mt-4"><i class="fas fa-tools"></i> {{ __('help-admin-tickets.list.tools_title') }}</h4>

                <div class="card mb-3 border-primary">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-search"></i> {{ __('help-admin-tickets.list.search_gen') }}
                    </div>
                    <div class="card-body">
                        <p><strong>{{ __('help-admin-tickets.list.search_loc') }}</strong></p>
                        <p><strong>{{ __('help-admin-tickets.list.search_how') }}</strong></p>
                        <ul>
                            @foreach(__('help-admin-tickets.list.search_steps') as $step)
                                <li>{{ $step }}</li>
                            @endforeach
                        </ul>
                        <p class="mb-0"><strong>{{ __('help-admin-tickets.list.search_ex') }}</strong></p>
                    </div>
                </div>

                <div class="card mb-3 border-success">
                    <div class="card-header bg-success text-white">
                        <i class="fas fa-filter"></i> {{ __('help-admin-tickets.list.filters_spec') }}
                    </div>
                    <div class="card-body">
                        <p>{{ __('help-admin-tickets.list.filters_intro') }}</p>

                        <h6 class="mt-3"><strong>{{ __('help-admin-tickets.list.filter_status') }}</strong></h6>
                        <div class="form-group">
                            <label>{{ __('help-admin-tickets.list.cols.status.name') }}:</label>
                            <select class="form-control" disabled>
                                <option>Todos</option>
                                <option>Nuevo</option>
                                <option>Pendiente</option>
                                <option>En Proceso</option>
                                <option>Resuelto</option>
                                <option>Cerrado</option>
                            </select>
                        </div>
                        <p><strong>{{ __('help-admin-tickets.list.filter_status_use') }}</strong></p>

                        <h6 class="mt-3"><strong>{{ __('help-admin-tickets.list.filter_priority') }}</strong></h6>
                        <div class="form-group">
                            <label>{{ __('help-admin-tickets.list.cols.priority.name') }}:</label>
                            <select class="form-control" disabled>
                                <option>Todas</option>
                                <option>Baja</option>
                                <option>Media</option>
                                <option>Alta</option>
                                <option>Crítica</option>
                            </select>
                        </div>
                        <p><strong>{{ __('help-admin-tickets.list.filter_priority_use') }}</strong></p>

                        <h6 class="mt-3"><strong>{{ __('help-admin-tickets.list.filter_type') }}</strong></h6>
                        <div class="form-group">
                            <label>{{ __('help-admin-tickets.list.cols.type.name') }}:</label>
                            <select class="form-control" disabled>
                                <option>Todos</option>
                                <option>Bug</option>
                                <option>Mejora</option>
                                <option>Solicitud</option>
                                <option>Consulta</option>
                            </select>
                        </div>
                        <p class="mb-0"><strong>{{ __('help-admin-tickets.list.filter_type_use') }}</strong></p>

                        <div class="alert alert-info mt-3">
                            <i class="fas fa-info-circle"></i> {!! __('help-admin-tickets.list.filter_combine') !!}
                        </div>
                    </div>
                </div>

                <div class="card border-warning">
                    <div class="card-header bg-warning text-dark">
                        <i class="fas fa-list-ol"></i> {{ __('help-admin-tickets.list.pagination_title') }}
                    </div>
                    <div class="card-body">
                        <p><strong>{{ __('help-admin-tickets.list.pagination_records') }}</strong></p>
                        <ul>
                            <li>{{ __('help-admin-tickets.list.search_loc') }}</li> {{-- Reusing generic location text or context --}}
                            <li>10, 25, 50 o 100 tickets</li>
                        </ul>

                        <p><strong>{{ __('help-admin-tickets.list.pagination_controls') }}</strong></p>
                        <ul>
                            <li>{{ __('help-admin-tickets.list.pagination_buttons') }}</li>
                        </ul>
                    </div>
                </div>
            </section>

            {{-- SECCIÓN: ESTADOS Y PRIORIDADES --}}
            <section class="mb-5" id="tipos">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-tags"></i> {{ __('help-admin-tickets.states.title') }}</h3>

                <h4 class="mt-4"><i class="fas fa-traffic-light"></i> {{ __('help-admin-tickets.states.status_title') }}</h4>
                <p>{{ __('help-admin-tickets.states.intro') }}</p>

                <div class="row">
                    @php
                        $badges = ['primary', 'warning', 'info', 'success', 'secondary'];
                        $states = ['new', 'pending', 'process', 'resolved', 'closed'];
                        $textColors = ['text-white', 'text-dark', 'text-white', 'text-white', 'text-white'];
                    @endphp

                    @foreach($states as $index => $key)
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card border-{{ $badges[$index] }} h-100">
                            <div class="card-header bg-{{ $badges[$index] }} {{ $textColors[$index] }}">
                                <strong>{{ __('help-admin-tickets.states.'.$key.'.name') }}</strong>
                            </div>
                            <div class="card-body">
                                <p><strong>Qué significa:</strong> {{ __('help-admin-tickets.states.'.$key.'.desc') }}</p>
                                <p><strong>Acción recomendada:</strong> {{ __('help-admin-tickets.states.'.$key.'.action') }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <h4 class="mt-5"><i class="fas fa-exclamation-circle"></i> {{ __('help-admin-tickets.states.priority_title') }}</h4>
                <p>{{ __('help-admin-tickets.states.priority_intro') }}</p>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Prioridad</th>
                                <th>Cuándo usarla</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(__('help-admin-tickets.states.priorities') as $key => $p)
                            <tr>
                                <td><span class="badge bg-{{ $key == 'low' ? 'secondary' : ($key == 'medium' ? 'info' : ($key == 'high' ? 'warning text-dark' : 'danger')) }}">{{ $p['name'] }}</span></td>
                                <td>{{ $p['use'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <h4 class="mt-5"><i class="fas fa-bookmark"></i> {{ __('help-admin-tickets.states.type_title') }}</h4>
                <p>{{ __('help-admin-tickets.states.type_intro') }}</p>

                <div class="row">
                    @php
                        $types = ['bug', 'feature', 'request', 'inquiry'];
                        $icons = ['bug', 'star', 'hand-paper', 'question-circle'];
                        $colors = ['danger', 'success', 'info', 'warning'];
                    @endphp
                    @foreach($types as $index => $key)
                    <div class="col-md-3 mb-3">
                        <div class="card text-center border-{{ $colors[$index] }} h-100">
                            <div class="card-body">
                                <i class="fas fa-{{ $icons[$index] }} fa-3x text-{{ $colors[$index] }} mb-2"></i>
                                <h6><strong>{{ __('help-admin-tickets.states.types.'.$key.'.name') }}</strong></h6>
                                <p class="small mb-0">{{ __('help-admin-tickets.states.types.'.$key.'.desc') }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> {{ __('help-admin-tickets.states.manage_note') }}
                </div>
            </section>

            {{-- SECCIÓN: VER DETALLES --}}
            <section class="mb-5" id="detalles">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-eye"></i> {{ __('help-admin-tickets.details.title') }}</h3>

                <h4 class="mt-4">{{ __('help-admin-tickets.details.how') }}</h4>
                <ol>
                    <li>{{ __('help-admin-tickets.details.step_1') }}</li>
                    <li>{!! __('help-admin-tickets.details.step_2') !!}</li>
                    <li>{{ __('help-admin-tickets.details.step_3') }}</li>
                </ol>

                <h4 class="mt-4">{{ __('help-admin-tickets.details.structure') }}</h4>
                <p>{!! __('help-admin-tickets.details.structure_intro') !!}</p>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-info h-100">
                            <div class="card-header bg-info text-white">
                                <strong><i class="fas fa-info-circle"></i> {{ __('help-admin-tickets.details.col_left') }}</strong>
                            </div>
                            <div class="card-body">
                                <div class="text-center mb-5 p-3 bg-light border rounded">
                                        <img src="/img/admin-ticket-details.png" class="img-fluid mt-3 border shadow-sm" alt="{{ __('help-admin-tickets.details.img_info_alt') }}">
                                        <p class="text-muted small mt-2">{{ __('help-admin-tickets.details.img_info_alt') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-primary h-100">
                            <div class="card-header bg-primary text-white">
                                <strong><i class="fas fa-edit"></i> {{ __('help-admin-tickets.details.col_right') }}</strong>
                            </div>
                            <div class="card-body">
                                <div class="text-center mb-5 p-3 bg-light border rounded">
                                    <img src="/img/admin-ticket-edit-form.png" class="img-fluid mt-3 border shadow-sm" alt="{{ __('help-admin-tickets.details.img_edit_alt') }}">
                                    <p class="text-muted small mt-2">{{ __('help-admin-tickets.details.img_edit_alt') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- SECCIÓN: EDITAR TICKET --}}
            <section class="mb-5" id="editar">
                <h3 class="text-success border-bottom pb-2"><i class="fas fa-edit"></i> {{ __('help-admin-tickets.edit.title') }}</h3>

                <h4 class="mt-4">{{ __('help-admin-tickets.edit.fields') }}</h4>
                <p>{{ __('help-admin-tickets.edit.field_intro') }}</p>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"><strong>1. {{ __('help-admin-tickets.edit.f_title') }}</strong></label>
                            <input type="text" class="form-control" value="No puedo acceder al sistema" disabled>
                            <small class="text-muted">{{ __('help-admin-tickets.edit.f_title_note') }}</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>2. {{ __('help-admin-tickets.edit.f_desc') }}</strong></label>
                            <textarea class="form-control" rows="3" disabled>Cuando intento iniciar sesión aparece un error...</textarea>
                            <small class="text-muted">{{ __('help-admin-tickets.edit.f_desc_note') }}</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>3. {{ __('help-admin-tickets.edit.f_status') }}</strong></label>
                            <select class="form-control" disabled>
                                <option>Nuevo</option>
                                <option>Pendiente</option>
                                <option selected>En Proceso</option>
                                <option>Resuelto</option>
                                <option>Cerrado</option>
                            </select>
                            <small class="text-muted">{{ __('help-admin-tickets.edit.f_status_note') }}</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>4. {{ __('help-admin-tickets.edit.f_priority') }}</strong></label>
                            <select class="form-control" disabled>
                                <option>Baja</option>
                                <option>Media</option>
                                <option selected>Alta</option>
                                <option>Crítica</option>
                            </select>
                            <small class="text-muted">{{ __('help-admin-tickets.edit.f_priority_note') }}</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>5. {{ __('help-admin-tickets.edit.f_type') }}</strong></label>
                            <select class="form-control" disabled>
                                <option selected>Bug</option>
                                <option>Mejora</option>
                                <option>Solicitud</option>
                                <option>Consulta</option>
                            </select>
                            <small class="text-muted">{{ __('help-admin-tickets.edit.f_type_note') }}</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>6. {{ __('help-admin-tickets.edit.f_assigned') }}</strong> <span class="badge bg-warning text-dark">{{ __('help-admin-tickets.edit.f_assigned_badge') }}</span></label>
                            <select class="form-control" disabled>
                                <option>Sin asignar</option>
                                <option>Admin Carlos</option>
                                <option selected>Admin María</option>
                                <option>Admin Pedro</option>
                            </select>
                            <small class="text-muted">{{ __('help-admin-tickets.edit.f_assigned_note') }}</small>
                        </div>
                    </div>
                </div>

                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i> {{ __('help-admin-tickets.edit.warning') }}
                </div>

                <h4 class="mt-4">{{ __('help-admin-tickets.edit.process') }}</h4>
                <ol>
                    <li>{{ __('help-admin-tickets.edit.step_1') }}</li>
                    <li>{{ __('help-admin-tickets.edit.step_2') }}</li>
                    <li>{!! __('help-admin-tickets.edit.step_3') !!}</li>
                    <li>{{ __('help-admin-tickets.edit.step_4') }}</li>
                </ol>

                <div class="card border-success">
                    <div class="card-header bg-success text-white">
                        <i class="fas fa-check-circle"></i> {{ __('help-admin-tickets.edit.save_title') }}
                    </div>
                    <div class="card-body">
                        <ul class="mb-0">
                            <li>{!! __('help-admin-tickets.edit.save_1') !!}</li>
                            <li>{!! __('help-admin-tickets.edit.save_2') !!}</li>
                            <li>{!! __('help-admin-tickets.edit.save_3') !!}</li>
                            <li>{{ __('help-admin-tickets.edit.save_4') }}</li>
                        </ul>
                    </div>
                </div>
            </section>

            {{-- SECCIÓN: COMENTARIOS --}}
            <section class="mb-5" id="comentarios">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-comments"></i> {{ __('help-admin-tickets.comments.title') }}</h3>

                <h4 class="mt-4">{{ __('help-admin-tickets.comments.access') }}</h4>
                <p>{{ __('help-admin-tickets.comments.step_1') }}</p>
                <ol>
                    <li>{{ __('help-admin-tickets.comments.step_2') }}</li>
                    <li>{!! __('help-admin-tickets.comments.step_3') !!}</li>
                    <li>{{ __('help-admin-tickets.comments.step_4') }}</li>
                </ol>

                <h4 class="mt-4"><i class="fas fa-table"></i> {{ __('help-admin-tickets.comments.table_title') }}</h4>
                <p>{{ __('help-admin-tickets.comments.table_title') }}:</p>

                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead class="table-dark">
                            <tr>
                                @foreach(__('help-admin-tickets.comments.table_cols') as $col)
                                    <th>{{ $col }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Luis (Usuario)</td>
                                <td>He intentado reiniciar pero sigue sin funcionar</td>
                                <td>12/06/2025 10:30</td>
                                <td><button class="btn btn-sm btn-danger" disabled><i class="fas fa-trash"></i></button></td>
                            </tr>
                            <tr>
                                <td>Admin María</td>
                                <td>Revisando los logs del servidor...</td>
                                <td>12/06/2025 11:45</td>
                                <td><button class="btn btn-sm btn-danger" disabled><i class="fas fa-trash"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> {{ __('help-admin-tickets.comments.auth_note') }}
                </div>

                <h4 class="mt-4"><i class="fas fa-plus-circle"></i> {{ __('help-admin-tickets.comments.add_title') }}</h4>
                
                <p>Debajo de la tabla de comentarios encontrarás un formulario:</p>

                <div class="card">
                    <div class="card-header bg-light">
                        <strong>{{ __('help-admin-tickets.comments.add_form_title') }}</strong>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-5 p-3 bg-light border rounded">
                            <img src="/img/admin-add-comment-form.png" class="img-fluid mt-3 border shadow-sm" alt="{{ __('help-admin-tickets.comments.img_alt') }}">
                            <p class="text-muted small mt-2">{{ __('help-admin-tickets.comments.img_alt') }}</p>
                        </div>
                    </div>
                </div>

                <p class="mt-3"><strong>{{ __('help-admin-tickets.comments.how_to_add') }}</strong></p>
                <ol>
                    <li>{{ __('help-admin-tickets.comments.add_step_1') }}</li>
                    <li>{{ __('help-admin-tickets.comments.add_step_2') }}</li>
                    <li>{!! __('help-admin-tickets.comments.add_step_3') !!}</li>
                </ol>

                <div class="card border-success">
                    <div class="card-header bg-success text-white">
                        <i class="fas fa-check-circle"></i> {{ __('help-admin-tickets.comments.added_title') }}
                    </div>
                    <div class="card-body">
                        <ul class="mb-0">
                            <li>{{ __('help-admin-tickets.comments.added_1') }}</li>
                            <li>{!! __('help-admin-tickets.comments.added_2') !!}</li>
                            <li>{{ __('help-admin-tickets.comments.added_3') }}</li>
                            <li>{{ __('help-admin-tickets.comments.added_4') }}</li>
                        </ul>
                    </div>
                </div>

                <h4 class="mt-4"><i class="fas fa-trash"></i> {{ __('help-admin-tickets.comments.delete_title') }}</h4>
                <p>{{ __('help-admin-tickets.comments.delete_desc') }}</p>
                
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i> {{ __('help-admin-tickets.comments.delete_warning') }}
                </div>

                <p><strong>Para eliminar:</strong></p>
                <ol>
                    @foreach(__('help-admin-tickets.comments.delete_steps') as $step)
                        <li>{{ $step }}</li>
                    @endforeach
                </ol>
            </section>

            {{-- SECCIÓN: ASIGNAR TICKETS --}}
            <section class="mb-5" id="asignar">
                <h3 class="text-danger border-bottom pb-2"><i class="fas fa-user-tag"></i> {{ __('help-admin-tickets.assign.title') }}</h3>

                <div class="alert alert-danger">
                    <i class="fas fa-lock"></i> {{ __('help-admin-tickets.assign.warning') }}
                </div>

                <h4 class="mt-4">{{ __('help-admin-tickets.assign.meaning') }}</h4>
                <p>{{ __('help-admin-tickets.assign.meaning_desc') }}</p>
                <ul>
                    @foreach(__('help-admin-tickets.assign.meaning_list') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>

                <h4 class="mt-4">{{ __('help-admin-tickets.assign.how') }}</h4>

                <div class="card mb-3">
                    <div class="card-header bg-info text-white">
                        <strong>{{ __('help-admin-tickets.assign.method_1') }}</strong>
                    </div>
                    <div class="card-body">
                        <ol>
                            <li>{{ __('help-admin-tickets.assign.steps.1') }}</li>
                            <li>{!! __('help-admin-tickets.assign.steps.2') !!}</li>
                            <li>{{ __('help-admin-tickets.assign.steps.3') }}</li>
                            <li>{{ __('help-admin-tickets.assign.steps.4') }}</li>
                            <li>{!! __('help-admin-tickets.assign.steps.5') !!}</li>
                        </ol>

                        <div class="alert alert-success mt-2 mb-0">
                            <i class="fas fa-check"></i> {{ __('help-admin-tickets.assign.success') }}
                        </div>
                    </div>
                </div>

                <h4 class="mt-4">{{ __('help-admin-tickets.assign.reassign') }}</h4>
                <p>{{ __('help-admin-tickets.assign.reassign_desc') }}</p>

                <div class="card border-info">
                    <div class="card-body">
                        <p><strong>{{ __('help-admin-tickets.assign.cases') }}</strong></p>
                        <ul>
                            @foreach(__('help-admin-tickets.assign.cases_list') as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                        <p class="mb-0"><strong>{{ __('help-admin-tickets.assign.process') }}</strong></p>
                    </div>
                </div>
            </section>

            {{-- SECCIÓN: TICKETS ASIGNADOS --}}
            <section class="mb-5" id="asignados">
                <h3 class="text-info border-bottom pb-2"><i class="fas fa-user-check"></i> {{ __('help-admin-tickets.assigned_view.title') }}</h3>

                <p>{!! __('help-admin-tickets.assigned_view.intro') !!}</p>

                <h4 class="mt-4">{{ __('help-admin-tickets.assigned_view.access') }}</h4>
                <p>Mediante el menú lateral izquierdo en la opción <strong>{{ __('general.admin_sidebar.gestionar_tickets') }}</strong>, en la opción 
                    de <strong>{{ __('general.admin_sidebar.tickets_asignados') }} </strong>
                </p>

                <h4 class="mt-4">{{ __('help-admin-tickets.assigned_view.shows') }}</h4>
                <p>{!! __('help-admin-tickets.assigned_view.shows_desc') !!}</p>

                <div class="card border-info">
                    <div class="card-header bg-info text-white">
                        <strong>{{ __('help-admin-tickets.assigned_view.advantages') }}</strong>
                    </div>
                    <div class="card-body">
                        <ul class="mb-0">
                            @foreach(__('help-admin-tickets.assigned_view.advantages_list') as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <h4 class="mt-4">{{ __('help-admin-tickets.assigned_view.cards') }}</h4>
                <p>En la parte superior de esta vista verás 3 tarjetas de colores:</p>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card border-info text-center">
                            <div class="card-body">
                                <h1 class="text-info mb-2">8</h1>
                                <p class="mb-0"><strong>{{ __('help-admin-tickets.assigned_view.cards_total') }}</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-success text-center">
                            <div class="card-body">
                                <h1 class="text-success mb-2">5</h1>
                                <p class="mb-0"><strong>{{ __('help-admin-tickets.assigned_view.cards_resolved') }}</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-warning text-center">
                            <div class="card-body">
                                <h1 class="text-warning mb-2">3</h1>
                                <p class="mb-0"><strong>{{ __('help-admin-tickets.assigned_view.cards_pending') }}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="mt-3">{{ __('help-admin-tickets.assigned_view.cards_desc') }}</p>
            </section>

            {{-- SECCIÓN: FLUJO DE TRABAJO --}}
            <section class="mb-5">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-project-diagram"></i> {{ __('help-admin-tickets.workflow.title') }}</h3>
                <p>{{ __('help-admin-tickets.workflow.intro') }}</p>

                <div class="timeline">
                    <div class="card mb-3 border-primary">
                        <div class="card-header bg-primary text-white">
                            <strong>{{ __('help-admin-tickets.workflow.phase_1') }}</strong>
                        </div>
                        <div class="card-body">
                            <p><strong>Estado:</strong> <span class="badge bg-primary">Nuevo</span></p>
                            <p><strong>Qué hacer:</strong></p>
                            <ol class="mb-0">
                                @foreach(__('help-admin-tickets.workflow.phase_1_steps') as $step)
                                    <li>{{ $step }}</li>
                                @endforeach
                            </ol>
                        </div>
                    </div>

                    <div class="card mb-3 border-warning">
                        <div class="card-header bg-warning text-dark">
                            <strong>{{ __('help-admin-tickets.workflow.phase_2') }}</strong>
                        </div>
                        <div class="card-body">
                            <p><strong>Estado:</strong> <span class="badge bg-warning text-dark">Pendiente</span> → <span class="badge bg-info">En Proceso</span></p>
                            <p><strong>Qué hacer:</strong></p>
                            <ol class="mb-0">
                                @foreach(__('help-admin-tickets.workflow.phase_2_steps') as $step)
                                    <li>{{ $step }}</li>
                                @endforeach
                            </ol>
                        </div>
                    </div>

                    <div class="card mb-3 border-success">
                        <div class="card-header bg-success text-white">
                            <strong>{{ __('help-admin-tickets.workflow.phase_3') }}</strong>
                        </div>
                        <div class="card-body">
                            <p><strong>Estado:</strong> <span class="badge bg-success">Resuelto</span></p>
                            <p><strong>Qué hacer:</strong></p>
                            <ol class="mb-0">
                                @foreach(__('help-admin-tickets.workflow.phase_3_steps') as $step)
                                    <li>{{ $step }}</li>
                                @endforeach
                            </ol>
                        </div>
                    </div>

                    <div class="card mb-3 border-secondary">
                        <div class="card-header bg-secondary text-white">
                            <strong>{{ __('help-admin-tickets.workflow.phase_4') }}</strong>
                        </div>
                        <div class="card-body">
                            <p><strong>Estado:</strong> <span class="badge bg-secondary">Cerrado</span></p>
                            <p><strong>Qué hacer:</strong></p>
                            <ol>
                                @foreach(__('help-admin-tickets.workflow.phase_4_steps') as $step)
                                    <li>{{ $step }}</li>
                                @endforeach
                            </ol>
                            <div class="alert alert-info mb-0">
                                <i class="fas fa-info-circle"></i> {{ __('help-admin-tickets.workflow.note') }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- SECCIÓN: BUENAS PRÁCTICAS --}}
            <section class="mb-5">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-thumbs-up"></i> {{ __('help-admin-tickets.best_practices.title') }}</h3>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-success h-100">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0"><i class="fas fa-check"></i> {{ __('help-admin-tickets.best_practices.do') }}</h5>
                            </div>
                            <div class="card-body">
                                <ul>
                                    @foreach(__('help-admin-tickets.best_practices.do_list') as $item)
                                        <li>{!! $item !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-danger h-100">
                            <div class="card-header bg-danger text-white">
                                <h5 class="mb-0"><i class="fas fa-times"></i> {{ __('help-admin-tickets.best_practices.dont') }}</h5>
                            </div>
                            <div class="card-body">
                                <ul>
                                    @foreach(__('help-admin-tickets.best_practices.dont_list') as $item)
                                        <li>{!! $item !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-success mt-3">
                    <h5><i class="fas fa-lightbulb"></i> {{ __('help-admin-tickets.best_practices.tip') }}</h5>
                    <p class="mb-0">{{ __('help-admin-tickets.best_practices.tip_desc') }}</p>
                </div>
            </section>


            {{-- SECCIÓN: TIPOS DE TICKETS (CONFIGURACIÓN) --}}
            <section class="mb-5" id="config-tipos">
                <h3 class="text-danger border-bottom pb-2"><i class="fas fa-cog"></i> {{ __('help-admin-tickets.config_types.title') }}</h3>

                <div class="alert alert-danger">
                    <i class="fas fa-lock"></i> {{ __('help-admin-tickets.config_types.warning') }}
                </div>

                <p>{{ __('help-admin-tickets.config_types.intro') }}</p>

                <h4 class="mt-4">{{ __('help-admin-tickets.config_types.access') }}</h4>
                <ol>
                    <li>{!! __('help-admin-tickets.config_types.access_steps.1') !!}</li>
                    <li>{!! __('help-admin-tickets.config_types.access_steps.2') !!}</li>
                </ol>

                <h4 class="mt-4">{{ __('help-admin-tickets.config_types.ops') }}</h4>

                <div class="card mb-3 border-success">
                    <div class="card-header bg-success text-white">
                        <i class="fas fa-plus-circle"></i> {{ __('help-admin-tickets.config_types.create') }}
                    </div>
                    <div class="card-body">
                        <ol>
                            <li>Haz clic en el botón verde <strong>"Crear Nuevo Tipo"</strong></li>
                            <li>Rellena el formulario:
                                <ul>
                                    <li><strong>Nombre:</strong> Ej: "Problema de Red", "Error de Facturación"</li>
                                    <li><strong>Descripción (opcional):</strong> Explicación de cuándo usar este tipo</li>
                                </ul>
                            </li>
                            <li>Haz clic en "Guardar"</li>
                            <li>El nuevo tipo aparecerá en los formularios de creación/edición de tickets</li>
                        </ol>
                    </div>
                </div>

                <div class="card mb-3 border-warning">
                    <div class="card-header bg-warning text-dark">
                        <i class="fas fa-edit"></i> {{ __('help-admin-tickets.config_types.edit_op') }}
                    </div>
                    <div class="card-body">
                        <ol class="mb-0">
                            <li>En la lista de tipos, haz clic en el botón amarillo "Editar"</li>
                            <li>Modifica el nombre o descripción</li>
                            <li>Guarda los cambios</li>
                            <li>Todos los tickets con ese tipo se actualizarán automáticamente</li>
                        </ol>
                    </div>
                </div>

                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        <i class="fas fa-trash"></i> {{ __('help-admin-tickets.config_types.delete_op') }}
                    </div>
                    <div class="card-body">
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-triangle"></i> <strong>{{ __('help-admin-tickets.config_types.delete_warning') }}</strong>
                        </div>
                        <ol class="mb-0">
                            <li>Verifica que no haya tickets con ese tipo (usa el filtro)</li>
                            <li>Si hay tickets, primero cámbialos a otro tipo</li>
                            <li>Luego haz clic en el botón rojo "Eliminar"</li>
                            <li>Confirma la eliminación</li>
                        </ol>
                    </div>
                </div>
            </section>

            

            {{-- SECCIÓN: EJEMPLO COMPLETO --}}
            <section class="mb-5">
                <h3 class="text-dark border-bottom pb-2 mb-3"><i class="fas fa-play-circle mr-2"></i> {{ __('help-admin-tickets.example.title') }}</h3>

                <div class="card card-outline card-navy">
                    <div class="card-header">
                        <h3 class="card-title"><strong>{{ __('help-admin-tickets.example.scenario') }}</strong> {{ __('help-admin-tickets.example.scenario_desc') }}</h3>
                    </div>
                    <div class="card-body">
                         <div class="timeline">
                            <!-- Time Label -->
                            <div class="time-label">
                                <span class="bg-navy">Día 1</span>
                            </div>

                            <!-- 9:00 AM -->
                            <div>
                                <i class="fas fa-user bg-primary"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> 9:00 AM</span>
                                    <h3 class="timeline-header"><a href="#">Usuario</a> {{ __('help-admin-tickets.example.time_start') }}</h3>
                                    <div class="timeline-body">
                                        <p><strong>Título:</strong> {{ __('help-admin-tickets.example.msg_1') }}</p>
                                        <p><strong>Descripción:</strong> {{ __('help-admin-tickets.example.msg_2') }}</p>
                                        <hr>
                                        <span class="badge bg-primary">Nuevo</span> <span class="badge bg-warning">Prioridad Media</span>
                                    </div>
                                </div>
                            </div>

                            <!-- 9:15 AM -->
                            <div>
                                <i class="fas fa-user-shield bg-info"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> 9:15 AM</span>
                                    <h3 class="timeline-header"><a href="#">Tú (Superadmin)</a> revisas el ticket</h3>
                                    <div class="timeline-body">
                                        {{ __('help-admin-tickets.example.actions') }}
                                        <ul>
                                            <li>{{ __('help-admin-tickets.example.msg_3') }}</li>
                                            <li>{{ __('help-admin-tickets.example.msg_4') }} <span class="text-danger font-weight-bold">Alta</span></li>
                                            <li>{{ __('help-admin-tickets.example.msg_5') }}</li>
                                            <li>{{ __('help-admin-tickets.example.msg_6') }} <strong>Admin Carlos</strong></li>
                                            <li>{{ __('help-admin-tickets.example.msg_7') }} <span class="badge bg-warning">Pendiente</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                             <!-- 9:30 AM -->
                             <div>
                                <i class="fas fa-user-cog bg-warning"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> 9:30 AM</span>
                                    <h3 class="timeline-header"><a href="#">Admin Carlos</a> {{ __('help-admin-tickets.example.time_assignee') }}</h3>
                                    <div class="timeline-body">
                                        <ol>
                                            <li>{{ __('help-admin-tickets.example.msg_8') }}</li>
                                            <li>{{ __('help-admin-tickets.example.msg_7') }} <span class="badge bg-info">En Proceso</span></li>
                                            <li>Comentario: <em>{{ __('help-admin-tickets.example.msg_9') }}</em></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                             <!-- 10:15 AM -->
                             <div>
                                <i class="fas fa-comment bg-secondary"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> 10:15 AM</span>
                                    <h3 class="timeline-header"><a href="#">Usuario</a> {{ __('help-admin-tickets.example.time_user_reply') }}</h3>
                                    <div class="timeline-body">
                                        <em>{{ __('help-admin-tickets.example.msg_10') }}</em>
                                    </div>
                                </div>
                            </div>

                             <!-- 10:45 AM -->
                             <div>
                                <i class="fas fa-check bg-success"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> 10:45 AM</span>
                                    <h3 class="timeline-header"><a href="#">Admin Carlos</a> {{ __('help-admin-tickets.example.time_solve') }}</h3>
                                    <div class="timeline-body">
                                        {{ __('help-admin-tickets.example.msg_11') }}
                                        <br>
                                        <strong>Acción:</strong> {{ __('help-admin-tickets.example.msg_12') }} <span class="badge bg-success">Resuelto</span>.
                                        <br>
                                        <strong>Comentario:</strong> <em>{{ __('help-admin-tickets.example.msg_13') }}</em>
                                    </div>
                                </div>
                            </div>

                             <!-- 11:30 AM -->
                             <div>
                                <i class="fas fa-flag-checkered bg-dark"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> 11:30 AM</span>
                                    <h3 class="timeline-header"><a href="#">{{ __('help-admin-tickets.example.time_close') }}</a></h3>
                                    <div class="timeline-body">
                                        {{ __('help-admin-tickets.example.msg_14') }}
                                        <br>
                                        {{ __('help-admin-tickets.example.msg_15') }}
                                        <div class="mt-2">
                                            <span class="badge bg-secondary">Cerrado</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
@endsection