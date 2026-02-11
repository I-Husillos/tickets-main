<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand -->
    <a href="{{ route('user.dashboard', ['locale' => app()->getLocale()]) }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">{{ __('general.admin_sidebar.app_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Opcional: Usuario autenticado -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">  
            <div class="info">
                <a href="{{ route('user.show.profile', ['locale' => app()->getLocale()]) }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Menú lateral -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('user.dashboard', ['locale' => app()->getLocale()]) }}"
                       class="nav-link {{ Route::is('user.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Tickets (agrupados en treeview) -->
                <li class="nav-item has-treeview {{ Route::is('user.tickets.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('user.tickets.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>
                            Tickets
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.tickets.index', ['locale' => app()->getLocale()]) }}"
                               class="nav-link {{ Route::is('user.tickets.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                {{ __('frontoffice.tickets.ticket_list') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.tickets.create', ['locale' => app()->getLocale()]) }}"
                               class="nav-link {{ Route::is('user.tickets.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                {{ __('frontoffice.tickets.create_button') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Notificaciones -->
                <li class="nav-item">
                    <a href="{{ route('user.notifications', ['locale' => app()->getLocale()]) }}"
                       class="nav-link {{ Route::is('user.notifications') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>Notificaciones</p>
                    </a>
                </li>

                <!-- Ayuda -->
                <li class="nav-item has-treeview {{ Route::is('user.help.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('user.help.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>
                            {{ __('faq.faq.help') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <!-- Introducción -->
                        <li class="nav-item">
                            <a href="{{ route('user.help.index', ['locale' => app()->getLocale()]) }}"
                            class="nav-link {{ Route::is('user.help.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('faq.faq.intoduction_title') }}</p>
                            </a>
                        </li>

                        <!-- Tickets -->
                        <li class="nav-item">
                            <a href="{{ route('user.help.tickets', ['locale' => app()->getLocale()]) }}"
                            class="nav-link {{ Route::is('user.help.tickets') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tickets</p>
                            </a>
                        </li>

                        <!-- Notificaciones -->
                        <li class="nav-item">
                            <a href="{{ route('user.help.notifications', ['locale' => app()->getLocale()]) }}"
                            class="nav-link {{ Route::is('user.help.notifications') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('faq.faq.notifications') }}</p>
                            </a>
                        </li>

                        <!-- Perfil -->
                        <li class="nav-item">
                            <a href="{{ route('user.help.profile', ['locale' => app()->getLocale()]) }}"
                            class="nav-link {{ Route::is('user.help.profile') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('faq.faq.user.profile') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item">
                    <a href="#" class="nav-link"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>{{ __('frontoffice.logout') }}</p>
                    </a>
                    <form id="logout-form"
                          action="{{ route('user.logout', ['locale' => app()->getLocale()]) }}"
                          method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
