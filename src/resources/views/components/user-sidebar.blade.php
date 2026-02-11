<!-- resources/views/user/sidebar.blade.php -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

    </div>

    <!-- Search Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Menú de Navegación -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('user.tickets.index', ['locale' => app()->getLocale(), 'username' => Auth::user()->id]) }}" class="nav-link">
            <i class="nav-icon fas fa-ticket-alt"></i>
            <p>Mis Tickets</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('user.notifications', ['locale' => app()->getLocale()]) }}" class="nav-link">
            <i class="nav-icon fas fa-bell"></i>
            <p>Notificaciones</p>
          </a>
        </li>

        <li class="nav-item">
          <form method="POST" action="{{ route('user.logout', ['locale' => app()->getLocale()]) }}">
            @csrf
            <button type="submit" class="nav-link btn btn-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Cerrar sesión</p>
            </button>
          </form>
        </li>
      </ul>
    </nav>
  </div>
</aside>
