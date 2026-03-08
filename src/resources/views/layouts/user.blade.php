    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <meta name="notification-url-template" content="{{ route(request()->is('admin*') ? 'admin.notifications.show' : 'user.notifications.show', ['locale' => app()->getLocale(), 'notification' => ':id']) }}">
  
            <link rel="shortcut icon" href="/img/ico/favicon.ico" type="image/x-icon" />
            <link rel="apple-touch-icon" href="/img/ico/apple-touch-icon.png" />
            <link rel="apple-touch-icon" sizes="57x57" href="/img/ico/apple-touch-icon-57x57.png" />
            <link rel="apple-touch-icon" sizes="72x72" href="/img/ico/apple-touch-icon-72x72.png" />
            <link rel="apple-touch-icon" sizes="76x76" href="/img/ico/apple-touch-icon-76x76.png" />
            <link rel="apple-touch-icon" sizes="114x114" href="/img/ico/apple-touch-icon-114x114.png" />
            <link rel="apple-touch-icon" sizes="120x120" href="/img/ico/apple-touch-icon-120x120.png" />
            <link rel="apple-touch-icon" sizes="144x144" href="/img/ico/apple-touch-icon-144x144.png" />
            <link rel="apple-touch-icon" sizes="152x152" href="/img/ico/apple-touch-icon-152x152.png" />
            <link rel="apple-touch-icon" sizes="180x180" href="/img/ico/apple-touch-icon-180x180.png" />

            @if(session('api_token'))
                <script>
                    localStorage.setItem('api_token', @json(session('api_token')));
                </script>
            @endif

            
            <title>@yield('title', __('general.frontoffice.layout.page_title')) - {{ config('app.name', 'Laravel') }}</title>

            @vite(['resources/js/app.js', 'resources/css/app.css'])
            <link rel="stylesheet" href="{{ asset('css/layout.css') }}">

            <!-- Canonical -->
            <link rel="canonical" href="{{ url()->current() }}">

            @include('partials.translations.notifications')

        </head>

        <body class="hold-transition sidebar-mini layout-fixed" style="height: auto;">              
            <div class="wrapper">
                
                <!-- Navbar -->
                @include('components.navbar')

                <!-- Sidebar -->
                @include('components.sidebar')
                
                <div class="content-wrapper">
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0">@yield('title', __('general.frontoffice.layout.page_title'))</h1>
                                </div>
                                <div class="col-sm-6">
                                    <!-- Breadcrumbs -->
                                    @isset($breadcrumbs)
                                        @include('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Main content -->
                    <section class="content">
                        @yield('content')
                    </section>
                    <!-- Inyectar modales mediante push desde la vista en cuestión -->
                    @stack('modals')

                </div>
                
                <!-- Footer -->
                <footer class="main-footer">
                    <div class="float-right d-none d-sm-block">
                        <b>Versión</b> 3.2
                    </div>
                    <strong>&copy; {{ date('Y') }} - Mi Aplicación.</strong> Todos los derechos reservados.
                </footer>
            </div>

        @stack('scripts')
        @include('layouts.reloadScript')
        </body>
    </html>

