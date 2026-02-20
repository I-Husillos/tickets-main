<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand -->
    
    <a href="{{ route('admin.dashboard', ['locale' => app()->getLocale()]) }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">{{ __('general.admin_sidebar.app_title') }}</span>
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

                {{-- DASHBOARD + TICKETS --}}
                <li class="nav-item has-treeview {{ request()->routeIs('admin.manage.dashboard') || request()->is('*tickets*') || request()->routeIs('admin.my.*') || request()->routeIs('admin.kanban*') ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.manage.dashboard', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('admin.manage.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            {{ __('general.admin_sidebar.title_admin_panel') }}
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
                        <li class="nav-item">
                            <a href="{{ route('admin.my.tickets', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('admin.my.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('general.admin_sidebar.my_tickets') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.kanban', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('admin.kanban*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('general.admin_sidebar.kanban') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- NOTIFICACIONES --}}
                <li class="nav-item">
                    <a href="{{ route('admin.notifications', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('admin.notifications') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>{{ __('general.admin_notifications.page_title') }}</p>
                    </a>
                </li>

                {{-- HISTORIAL DE EVENTOS --}}
                <li class="nav-item">
                    <a href="{{ route('admin.history.events', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('admin.history.events') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-history"></i>
                        <p>{{ __('general.admin_history_events.page_title') }}</p>
                    </a>
                </li>

                {{-- CONFIGURACIÓN (Solo Superadmin) --}}
                @if(Auth::guard('admin')->user()->superadmin)
                <li class="nav-item has-treeview {{ request()->routeIs('admin.dashboard.list.*') || request()->routeIs('admin.types.*') || request()->routeIs('admin.projects.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.dashboard.list.*') || request()->routeIs('admin.types.*') || request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            {{ __('general.admin_sidebar.configuration') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ps-3">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard.list.users', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('admin.dashboard.list.users') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('general.admin_dashboard.superadmin_manage_users') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard.list.admins', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('admin.dashboard.list.admins') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('general.admin_dashboard.superadmin_manage_admins') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.types.index', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('admin.types.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('general.admin_sidebar.manage_ticket_types') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.projects.index', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('general.admin_sidebar.manage_projects') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                {{-- AYUDA --}}
                <li class="nav-item has-treeview {{ request()->routeIs('admin.help.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.help.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>
                            {{ __('faq.faq.help') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ps-3">
                        <li class="nav-item">
                            <a href="{{ route('admin.help.index', ['locale' => app()->getLocale()]) }}"
                            class="nav-link {{ request()->routeIs('admin.help.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('faq.faq.intoduction_title') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.help.tickets', ['locale' => app()->getLocale()]) }}"
                            class="nav-link {{ request()->routeIs('admin.help.tickets') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('faq.faq.admin.tickets') }}</p>
                            </a>
                        </li>
                        @if(Auth::guard('admin')->user()->superadmin)
                        <li class="nav-item">
                            <a href="{{ route('admin.help.users', ['locale' => app()->getLocale()]) }}"
                            class="nav-link {{ request()->routeIs('admin.help.users') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('faq.faq.admin.users_and_staff') }}</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('admin.help.notifications', ['locale' => app()->getLocale()]) }}"
                            class="nav-link {{ request()->routeIs('admin.help.notifications') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('faq.faq.notifications') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.help.events', ['locale' => app()->getLocale()]) }}"
                            class="nav-link {{ request()->routeIs('admin.help.events') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('faq.faq.admin.event_history') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>



