<!-- resources/views/layouts/partials/navbar.blade.php -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Botón para Menú Lateral -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    <!-- Iconos de la Derecha -->
    <ul class="navbar-nav ml-auto">
        <!-- Cambiar idioma -->
        @include('components.language-switcher')

        <!-- Perfil -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.show.profile', ['locale' => app()->getLocale()]) }}" class="d-block text-white">
                <i class="fas fa-user"></i>
            </a>
        </li>


        <!-- Notificaciones -->
        <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('admin.notifications', ['locale' => app()->getLocale()]) }}" class="d-block text-white">
                    @php
                        // Verificamos que el usuario esté autenticado antes de obtener las notificaciones
                        $unreadCount = Auth::check() ? Auth::user()->unreadNotifications->count() : 0;
                    @endphp
                <i class="far fa-bell"></i>
                    @if ($unreadCount > 0)
                        <span class="badge badge-warning navbar-badge">{{ $unreadCount }}</span>
                    @endif
            </a>
        </li>

        <!-- Cerrar Sesión -->
        <li class="nav-item">
            <form id="logout-form" action="{{ route('admin.logout', ['locale' => app()->getLocale()]) }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
</nav>
