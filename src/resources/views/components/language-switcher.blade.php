<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
        <i class="fas fa-globe"></i> {{ strtoupper($currentLocale) }}
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="#">
            {{ strtoupper($currentLocale) }}
        </a>
        <a class="dropdown-item" href="{{ $alternateUrl }}">
            {{ strtoupper($alternateLocale) }}
        </a>
    </div>
</li>
