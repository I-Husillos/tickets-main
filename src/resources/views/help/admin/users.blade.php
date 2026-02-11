@extends('layouts.admin')

@section('title', __('help-admin-users.meta_title'))

@section('admincontent')
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0"><i class="fas fa-users"></i> {{ __('help-admin-users.header_title') }}</h2>
            <p class="mb-0 mt-2">{{ __('help-admin-users.header_subtitle') }}</p>
        </div>
        <div class="card-body">
            
            {{-- Índice de contenido --}}
            <section class="mb-5">
                <div class="alert alert-info">
                    <h5><i class="fas fa-list"></i> {{ __('help-admin-users.index_title') }}</h5>
                    <ul class="mb-0">
                        <li><a href="#usuarios">{{ __('help-admin-users.index_items.users') }}</a></li>
                        <li><a href="#administradores">{{ __('help-admin-users.index_items.admins') }}</a></li>
                        <li><a href="#permisos">{{ __('help-admin-users.index_items.permissions') }}</a></li>
                        <li><a href="#buenas-practicas">{{ __('help-admin-users.index_items.practices') }}</a></li>
                    </ul>
                </div>
            </section>

            {{-- SECCIÓN: GESTIÓN DE USUARIOS --}}
            <section class="mb-5" id="usuarios">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-user"></i> {{ __('help-admin-users.users.title') }}</h3>
                <p class="lead">{{ __('help-admin-users.users.intro') }}</p>

                {{-- Acceso a la gestión de usuarios --}}
                <h4 class="mt-4"><i class="fas fa-door-open"></i> {{ __('help-admin-users.users.access_title') }}</h4>
                <p>{{ __('help-admin-users.users.access_intro') }}</p>
                <ol>
                    @foreach(__('help-admin-users.users.access_steps') as $step)
                        <li>{!! $step !!}</li>
                    @endforeach
                </ol>

                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i> <strong>{{ __('help-admin-users.users.warning_super') }}</strong>
                </div>

                {{-- La pantalla de lista de usuarios --}}
                <h4 class="mt-4"><i class="fas fa-table"></i> {{ __('help-admin-users.users.list_title') }}</h4>
                <p>{{ __('help-admin-users.users.list_intro') }}</p>

                <div class="card mb-3">
                    <div class="card-header bg-light">
                        <strong>{{ __('help-admin-users.users.table_cols_title') }}</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        @foreach(__('help-admin-users.users.table_head') as $th)
                                            <th>{{ $th }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(__('help-admin-users.users.table_rows') as $row)
                                    <tr>
                                        <td><strong>{{ $row['col'] }}</strong></td>
                                        <td>{{ $row['show'] }}</td>
                                        <td>{{ $row['use'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Herramientas de la tabla --}}
                <h4 class="mt-4"><i class="fas fa-tools"></i> {{ __('help-admin-users.users.tools_title') }}</h4>
                
                <div class="card border-info">
                    <div class="card-header bg-info text-white">
                        <i class="fas fa-search"></i> {{ __('help-admin-users.users.search_title') }}
                    </div>
                    <div class="card-body">
                        <p>{{ __('help-admin-users.users.search_intro') }}</p>
                        <p><strong>{{ __('help-admin-users.users.search_how') }}</strong></p>
                        <ul>
                            @foreach(__('help-admin-users.users.search_list') as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                        <p class="mb-0"><strong>{{ __('help-admin-users.users.search_ex') }}</strong></p>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="card border-warning">
                        <div class="card-header bg-warning text-dark">
                            <i class="fas fa-list-ol"></i> {{ __('help-admin-users.users.pagination_title') }}
                        </div>
                        <div class="card-body">
                            <p><strong>{{ __('help-admin-users.users.pagination_records') }}</strong></p>
                            <ul>
                                @foreach(__('help-admin-users.users.pagination_records_list') as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                            <p><strong>{{ __('help-admin-users.users.pagination_controls') }}</strong></p>
                            <ul class="mb-0">
                                @foreach(__('help-admin-users.users.pagination_controls_list') as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- CREAR NUEVO USUARIO --}}
                <h4 class="mt-5 text-success"><i class="fas fa-user-plus"></i> {{ __('help-admin-users.create.title') }}</h4>
                
                <h5 class="mt-3">{{ __('help-admin-users.create.step1') }}</h5>
                <p>{{ __('help-admin-users.create.step1_text') }}</p>
                <div class="text-center my-3">
                    <div class="text-center mb-5 p-3 bg-light border rounded">
                            <img src="/img/create-user-button.png" class="img-fluid mt-3 border shadow-sm" alt="{{ __('help-admin-users.create.img_alt') }}">
                            <p class="text-muted small mt-2">{{ __('help-admin-users.create.img_alt') }}</p>
                    </div>
                </div>
                

                <h5 class="mt-4">{{ __('help-admin-users.create.step2') }}</h5>
                <p>{{ __('help-admin-users.create.step2_intro') }}</p>

                <div class="card mb-3">
                    <div class="card-body">
                        @foreach(__('help-admin-users.create.fields') as $key => $field)
                        <div class="mb-3">
                            <label class="form-label"><strong>{{ $field['label'] }}</strong> <span class="text-danger">*</span></label>
                            <input type="{{ $key == 'pass' || $key == 'confirm' ? 'password' : ($key == 'email' ? 'email' : 'text') }}" class="form-control" placeholder="{{ $field['ph'] }}" disabled>
                            <small class="text-muted">{{ $field['note'] }}</small>
                        </div>
                        @endforeach

                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> {{ __('help-admin-users.create.required_note') }}
                        </div>
                    </div>
                </div>

                <h5 class="mt-4">{{ __('help-admin-users.create.step3') }}</h5>
                <p>{{ __('help-admin-users.create.step3_intro') }}</p>
                <ol>
                    @foreach(__('help-admin-users.create.step3_list') as $item)
                        <li>{!! $item !!}</li>
                    @endforeach
                </ol>

                <div class="card border-success mb-3">
                    <div class="card-header bg-success text-white">
                        <i class="fas fa-check-circle"></i> {{ __('help-admin-users.create.success_title') }}
                    </div>
                    <div class="card-body">
                        <p>Verás un mensaje de éxito en la parte superior:</p>
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle"></i> {{ __('help-admin-users.create.success_msg') }}
                        </div>
                        <p class="mb-0">{{ __('help-admin-users.create.success_desc') }}</p>
                    </div>
                </div>

                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        <i class="fas fa-exclamation-triangle"></i> {{ __('help-admin-users.create.error_title') }}
                    </div>
                    <div class="card-body">
                        <p>{{ __('help-admin-users.create.error_intro') }}</p>
                        <ul>
                            @foreach(__('help-admin-users.create.error_list') as $item)
                                <li>{!! $item !!}</li>
                            @endforeach
                        </ul>
                        <p class="mb-0">{{ __('help-admin-users.create.error_fix') }}</p>
                    </div>
                </div>

                {{-- EDITAR USUARIO --}}
                <h4 class="mt-5 text-warning"><i class="fas fa-user-edit"></i> {{ __('help-admin-users.edit.title') }}</h4>
                
                <h5 class="mt-3">{{ __('help-admin-users.edit.when_title') }}</h5>
                <p>{{ __('help-admin-users.edit.title') }}</p>
                <ul>
                    @foreach(__('help-admin-users.edit.when_list') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>

                <h5 class="mt-4">{{ __('help-admin-users.edit.step1') }}</h5>
                <ol>
                    @foreach(__('help-admin-users.edit.step1_list') as $item)
                        <li>{!! $item !!}</li>
                    @endforeach
                </ol>

                <div class="text-center my-3">
                    <div class="text-center mb-5 p-3 bg-light border rounded">
                            <img src="/img/admin-users-action-buttons.png" class="img-fluid mt-3 border shadow-sm" alt="{{ __('help-admin-users.edit.img_alt') }}">
                            <p class="text-muted small mt-2">{{ __('help-admin-users.edit.img_alt') }}</p>
                    </div>
                </div>

                <h5 class="mt-4">{{ __('help-admin-users.edit.step2') }}</h5>
                <p>{{ __('help-admin-users.edit.step2_intro') }}</p>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                @foreach(__('help-admin-users.edit.table_head') as $th)
                                    <th>{{ $th }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(__('help-admin-users.edit.fields') as $key => $desc)
                            <tr>
                                <td><strong>{{ __('help-admin-users.create.fields.'.$key.'.label') }}</strong></td>
                                <td>
                                    @if(in_array($key, ['pass', 'confirm']))
                                        <span class="badge bg-warning text-dark">Opcional</span>
                                    @else
                                        <span class="badge bg-success">Sí</span>
                                    @endif
                                </td>
                                <td>{{ $desc }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i> <strong>{{ __('help-admin-users.edit.pass_warning') }}</strong>
                </div>

                <h5 class="mt-4">{{ __('help-admin-users.edit.step3') }}</h5>
                <ol>
                    @foreach(__('help-admin-users.edit.step3_list') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ol>

                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ __('help-admin-users.edit.success_msg') }}
                </div>

                {{-- ELIMINAR USUARIO --}}
                <h4 class="mt-5 text-danger"><i class="fas fa-user-times"></i> {{ __('help-admin-users.delete.title') }}</h4>

                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle"></i> <strong>{{ __('help-admin-users.delete.warning') }}</strong>
                </div>

                <h5 class="mt-3">{{ __('help-admin-users.delete.when_title') }}</h5>
                <p>{{ __('help-admin-users.delete.when_title') }}:</p>
                <ul>
                    @foreach(__('help-admin-users.delete.when_list') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>

                <div class="alert alert-warning">
                    <i class="fas fa-info-circle"></i> <strong>{{ __('help-admin-users.delete.note') }}</strong>
                </div>

                <h5 class="mt-4">{{ __('help-admin-users.delete.step1') }}</h5>
                <ol>
                    <li>{!! __('help-admin-users.delete.step1_text') !!}</li>
                </ol>

                <div class="text-center my-3">
                    <div class="text-center mb-5 p-3 bg-light border rounded">
                        <img src="/img/admin-users-action-buttons.png" class="img-fluid mt-3 border shadow-sm" alt="{{ __('help-admin-users.edit.img_alt') }}">
                        <p class="text-muted small mt-2">{{ __('help-admin-users.edit.img_alt') }}</p>
                    </div>
                </div>

                <h5 class="mt-4">{{ __('help-admin-users.delete.step2') }}</h5>
                <p>{{ __('help-admin-users.delete.step2_text') }}</p>

                <div class="card border-danger">
                    <div class="text-center mb-5 p-3 bg-light border rounded">
                            <img src="/img/confirm-deleteluser-modal.png" class="img-fluid mt-3 border shadow-sm" alt="{{ __('help-admin-users.delete.img_alt') }}">
                            <p class="text-muted small mt-2">{{ __('help-admin-users.delete.img_alt') }}</p>
                    </div>
                </div>

                <h5 class="mt-4">{{ __('help-admin-users.delete.step3') }}</h5>
                <ul>
                    @foreach(__('help-admin-users.delete.step3_list') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>

                <p>Si confirmas la eliminación, verás un mensaje:</p>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ __('help-admin-users.delete.success_msg') }}
                </div>
            </section>

            {{-- SECCIÓN: GESTIÓN DE ADMINISTRADORES --}}
            <section class="mb-5" id="administradores">
                <h3 class="text-danger border-bottom pb-2"><i class="fas fa-user-shield"></i> {{ __('help-admin-users.admins.title') }}</h3>
                
                <div class="alert alert-danger">
                    <i class="fas fa-lock"></i> <strong>{{ __('help-admin-users.admins.restricted') }}</strong>
                </div>

                <p class="lead">{{ __('help-admin-users.admins.intro') }}</p>

                {{-- Acceso --}}
                <h4 class="mt-4"><i class="fas fa-door-open"></i> {{ __('help-admin-users.admins.access') }}</h4>
                <ol>
                    @foreach(__('help-admin-users.admins.access_steps') as $step)
                        <li>{!! $step !!}</li>
                    @endforeach
                </ol>

                <div class="card-body">
                    <div class="text-center mb-5 p-3 bg-light border rounded">
                    <img src="/img/admins-table.png" class="img-fluid mt-3 border shadow-sm" alt="{{ __('help-admin-users.admins.img_alt') }}">
                    <p class="text-muted small mt-2">{{ __('help-admin-users.admins.img_alt') }}</p>
                </div>

                {{-- Diferencias con usuarios normales --}}
                <h4 class="mt-4"><i class="fas fa-not-equal"></i> {{ __('help-admin-users.admins.diff_title') }}</h4>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                @foreach(__('help-admin-users.admins.diff_head') as $th)
                                    <th>{{ $th }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(__('help-admin-users.admins.diff_rows') as $key => $row)
                            <tr>
                                <td><strong>{{ $row['name'] }}</strong></td>
                                <td>
                                    @if(in_array($key, ['create']))
                                        <span class="badge bg-success">{{ $row['user'] }}</span>
                                    @elseif(in_array($key, ['manage']))
                                        <span class="badge bg-danger">{{ $row['user'] }}</span>
                                    @else
                                        {{ $row['user'] }}
                                    @endif
                                </td>
                                <td>
                                    @if(in_array($key, ['create']))
                                        <span class="badge bg-danger">{{ $row['admin'] }}</span>
                                    @elseif(in_array($key, ['manage']))
                                        <span class="badge bg-success">{{ $row['admin'] }}</span>
                                    @else
                                        {{ $row['admin'] }}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Campo especial: Es superadministrador --}}
                <h4 class="mt-4"><i class="fas fa-crown"></i> {{ __('help-admin-users.admins.super_title') }}</h4>
                
                <p>{{ __('help-admin-users.admins.super_text') }}</p>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="text-center mb-5 p-3 bg-light border rounded">
                            <img src="/img/superAdmin-option.png" class="img-fluid mt-3 border shadow-sm" alt="{{ __('help-admin-users.admins.super_img_alt') }}">
                            <p class="text-muted small mt-2">{{ __('help-admin-users.admins.super_img_alt') }}</p>
                    </div>
                        
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-info h-100">
                            <div class="card-header bg-info text-white">
                                <strong>{{ __('help-admin-users.admins.no_super_title') }}</strong>
                            </div>
                            <div class="card-body">
                                <p><strong>{{ __('help-admin-users.admins.no_super_text') }}</strong></p>
                                <ul class="mb-0">
                                    @foreach(__('help-admin-users.admins.no_super_list') as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-danger h-100">
                            <div class="card-header bg-danger text-white">
                                <strong>{{ __('help-admin-users.admins.yes_super_title') }}</strong>
                            </div>
                            <div class="card-body">
                                <p><strong>{{ __('help-admin-users.admins.yes_super_text') }}</strong></p>
                                <ul class="mb-0">
                                    @foreach(__('help-admin-users.admins.yes_super_list') as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-warning mt-3">
                    <i class="fas fa-exclamation-triangle"></i> <strong>{{ __('help-admin-users.admins.super_warning') }}</strong>
                </div>

                {{-- Proceso completo --}}
                <h4 class="mt-4"><i class="fas fa-list-ol"></i> {{ __('help-admin-users.admins.process_title') }}</h4>
                
                <p>{{ __('help-admin-users.admins.process_intro') }}</p>

                <div id="adminProcessAccordion">
                    <!-- 1. CREAR -->
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                <a class="d-block w-100 text-success" data-toggle="collapse" href="#collapseCreate">
                                    <i class="fas fa-plus-circle mr-2"></i> {{ __('help-admin-users.admins.op_create') }}
                                </a>
                            </h4>
                        </div>
                        <div id="collapseCreate" class="collapse show visible" data-parent="#adminProcessAccordion">
                            <div class="card-body">
                                <ol>
                                    @foreach(__('help-admin-users.admins.op_create_steps') as $step)
                                        <li>{!! $step !!}</li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- 2. EDITAR -->
                    <div class="card card-warning card-outline">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                <a class="d-block w-100 text-warning" data-toggle="collapse" href="#collapseEdit">
                                    <i class="fas fa-edit mr-2"></i> {{ __('help-admin-users.admins.op_edit') }}
                                </a>
                            </h4>
                        </div>
                        <div id="collapseEdit" class="collapse visible" data-parent="#adminProcessAccordion">
                            <div class="card-body">
                                <ol>
                                    @foreach(__('help-admin-users.admins.op_edit_steps') as $key => $step)
                                        @if($key !== 'note')
                                            <li>{!! $step !!}</li>
                                        @endif
                                    @endforeach
                                </ol>
                                @if(array_key_exists('note', __('help-admin-users.admins.op_edit_steps')))
                                <div class="alert alert-info mt-2">
                                    <i class="fas fa-info-circle"></i> <strong>{{ __('help-admin-users.admins.op_edit_steps.note') }}</strong>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- 3. ELIMINAR -->
                    <div class="card card-danger card-outline">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                <a class="d-block w-100 text-danger" data-toggle="collapse" href="#collapseDelete">
                                    <i class="fas fa-trash mr-2"></i> {{ __('help-admin-users.admins.op_delete') }}
                                </a>
                            </h4>
                        </div>
                        <div id="collapseDelete" class="collapse visible" data-parent="#adminProcessAccordion">
                            <div class="card-body">
                                <ol>
                                    @foreach(__('help-admin-users.admins.op_delete_steps') as $key => $step)
                                        @if($key !== 'warn')
                                            <li>{!! $step !!}</li>
                                        @endif
                                    @endforeach
                                </ol>

                                @if(array_key_exists('warn', __('help-admin-users.admins.op_delete_steps')))
                                <div class="alert alert-danger mt-2">
                                    <i class="fas fa-exclamation-triangle"></i> <strong>{{ __('help-admin-users.admins.op_delete_steps.warn') }}</strong>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- SECCIÓN: PERMISOS --}}
            <section class="mb-5" id="permisos">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-shield-alt"></i> {{ __('help-admin-users.permissions.title') }}</h3>
                <p>{{ __('help-admin-users.permissions.intro') }}</p>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                @foreach(__('help-admin-users.permissions.head') as $th)
                                    @if($loop->first)
                                        <th>{{ $th }}</th>
                                    @else
                                        <th class="text-center">{{ $th }}</th>
                                    @endif
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(__('help-admin-users.permissions.rows') as $key => $action)
                            <tr>
                                <td><strong>{{ $action }}</strong></td>
                                @if($key == 'create_own')
                                    <td class="text-center"><span class="badge bg-success">✓</span></td>
                                    <td class="text-center"><span class="badge bg-danger">✗</span></td>
                                    <td class="text-center"><span class="badge bg-danger">✗</span></td>
                                @elseif($key == 'view_all')
                                    <td class="text-center"><span class="badge bg-danger">✗</span></td>
                                    <td class="text-center"><span class="badge bg-warning text-dark">{{ __('help-admin-users.permissions.badges.assigned_only') }}</span></td>
                                    <td class="text-center"><span class="badge bg-success">✓ {{ __('help-admin-users.permissions.badges.all') }}</span></td>
                                @elseif($key == 'comment')
                                    <td class="text-center"><span class="badge bg-warning text-dark">{{ __('help-admin-users.permissions.badges.own_only') }}</span></td>
                                    <td class="text-center"><span class="badge bg-success">✓</span></td>
                                    <td class="text-center"><span class="badge bg-success">✓</span></td>
                                @elseif($key == 'notify')
                                    <td class="text-center"><span class="badge bg-success">✓</span></td>
                                    <td class="text-center"><span class="badge bg-success">✓</span></td>
                                    <td class="text-center"><span class="badge bg-success">✓</span></td>
                                @elseif(in_array($key, ['manage_users', 'manage_admins', 'manage_types']))
                                    <td class="text-center"><span class="badge bg-danger">✗</span></td>
                                    <td class="text-center"><span class="badge bg-danger">✗</span></td>
                                    <td class="text-center"><span class="badge bg-success">✓</span></td>
                                @else
                                    <td class="text-center"><span class="badge bg-danger">✗</span></td>
                                    <td class="text-center"><span class="badge bg-success">✓</span></td>
                                    <td class="text-center"><span class="badge bg-success">✓</span></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

            {{-- SECCIÓN: BUENAS PRÁCTICAS --}}
            <section class="mb-5" id="buenas-practicas">
                <h3 class="text-primary border-bottom pb-2"><i class="fas fa-thumbs-up"></i> {{ __('help-admin-users.practices.title') }}</h3>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-success h-100">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0"><i class="fas fa-check"></i> {{ __('help-admin-users.practices.do_title') }}</h5>
                            </div>
                            <div class="card-body">
                                <ul>
                                    @foreach(__('help-admin-users.practices.do_list') as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-danger h-100">
                            <div class="card-header bg-danger text-white">
                                <h5 class="mb-0"><i class="fas fa-times"></i> {{ __('help-admin-users.practices.dont_title') }}</h5>
                            </div>
                            <div class="card-body">
                                <ul>
                                    @foreach(__('help-admin-users.practices.dont_list') as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-info mt-3">
                    <h5><i class="fas fa-lightbulb"></i> {{ __('help-admin-users.practices.tip_title') }}</h5>
                    <p class="mb-0">{{ __('help-admin-users.practices.tip_desc') }}</p>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection