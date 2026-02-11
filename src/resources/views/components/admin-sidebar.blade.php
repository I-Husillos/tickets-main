<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand -->
    
    <a href="{{ route('admin.dashboard', ['locale' => app()->getLocale()]) }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">Gestor de Tickets</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Opcional: Usuario autenticado -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">  
            <div class="info">
                <a href="{{ route('admin.show.profile', ['locale' => app()->getLocale()]) }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Menú lateral -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                {{-- DASHBOARD --}}
                <li class="nav-item">
                    <a href="{{ route('admin.manage.dashboard', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('admin.manage.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>{{ __('general.admin_sidebar.title_admin_panel') }}</p>
                    </a>
                </li>

                {{-- USUARIOS Y ADMINISTRADORES (Solo Superadmin) --}}
                @if(Auth::guard('admin')->user()->superadmin)
                    <li class="nav-header">{{ __('general.admin_dashboard.superadmin_manage_all_users') }}</li>

                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard.list.users', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('admin.dashboard.list.users') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>{{ __('general.admin_dashboard.superadmin_manage_users') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard.list.admins', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('admin.dashboard.list.admins') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-shield"></i>
                            <p>{{ __('general.admin_dashboard.superadmin_manage_admins') }}</p>
                        </a>
                    </li>
                    {{-- Tipos de Tickets --}}
                    <li class="nav-header">{{ __('general.admin_sidebar.types') }}</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.types.index', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('admin.manage.ticket.types') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-ticket-alt"></i>
                            <p>{{ __('general.admin_sidebar.manage_ticket_types') }}</p>
                        </a>
                    </li>
                @endif

                
                {{-- GESTIÓN DE TICKETS --}}
                <li class="nav-header">{{ __('general.admin_sidebar.tickets') }}</li>
                <li class="nav-item has-treeview {{ request()->is('*tickets*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('*tickets*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>
                            {{ __('general.admin_sidebar.gestionar_tickets') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ps-3">
                        @if(Auth::guard('admin')->user()->superadmin)
                        <li class="nav-item">
                            <a href="{{ route('admin.manage.tickets', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('admin.manage.tickets') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('general.frontoffice.tech_panel.all_tickets') }}</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('admin.show.assigned.tickets', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('admin.show.assigned.tickets') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('general.admin_sidebar.tickets_asignados') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
    
                {{-- Historial de Eventos --}}
                <li class="nav-header">{{ __('general.admin_sidebar.historial_eventos') }}</li>
                <li class="nav-item">
                    <a href="{{ route('admin.history.events', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('admin.history.events') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-history"></i>
                        <p>{{ __('general.admin_history_events.page_title') }}</p>
                    </a>
                </li>

                {{-- NOTIFICACIONES --}}
                <li class="nav-header">{{ __('general.admin_sidebar.notificaciones') }}</li>
                <li class="nav-item">
                    <a href="{{ route('admin.notifications', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('admin.notifications') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>{{ __('general.admin_notifications.page_title') }}</p>
                    </a>
                </li>


                {{-- AYUDA --}}
                <li class="nav-header">{{ __('general.admin_sidebar.help') }}</li>

                <li class="nav-item has-treeview {{ request()->routeIs('admin.help.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.help.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>
                            {{ __('faq.faq.help') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview ps-3">

                        {{-- Introducción --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.help.index', ['locale' => app()->getLocale()]) }}"
                            class="nav-link {{ request()->routeIs('admin.help.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('faq.faq.intoduction_title') }}</p>
                            </a>
                        </li>

                        {{-- Tickets --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.help.tickets', ['locale' => app()->getLocale()]) }}"
                            class="nav-link {{ request()->routeIs('admin.help.tickets') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gestión de Tickets</p>
                            </a>
                        </li>

                        {{-- Usuarios --}}
                        @if(Auth::guard('admin')->user()->superadmin)
                        <li class="nav-item">
                            <a href="{{ route('admin.help.users', ['locale' => app()->getLocale()]) }}"
                            class="nav-link {{ request()->routeIs('admin.help.users') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Usuarios y Staff</p>
                            </a>
                        </li>
                        @endif

                        {{-- Notificaciones --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.help.notifications', ['locale' => app()->getLocale()]) }}"
                            class="nav-link {{ request()->routeIs('admin.help.notifications') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Notificaciones</p>
                            </a>
                        </li>

                        {{-- Eventos --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.help.events', ['locale' => app()->getLocale()]) }}"
                            class="nav-link {{ request()->routeIs('admin.help.events') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Historial</p>
                            </a>
                        </li>
                    </ul>
                </li>


                {{-- CERRAR SESIÓN --}}
                <li class="nav-item">
                    <form method="POST" action="{{ route('admin.logout', ['locale' => app()->getLocale()]) }}">
                        @csrf
                        <button class="nav-link btn btn-link text-left text-white">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>{{ __('frontoffice.logout') }}</p>
                        </button>
                    </form>
                </li>

            </ul>
        </nav>
    </div>
</aside>



