<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div id="app" class="d-flex flex-column flex-wrap fixed-top fixed-bottom">
        <nav id="app-navbar" class="navbar navbar-dark bg-dark border-bottom shadow-sm w-100">
            <a href="{{ url('/') }}" class="navbar-brand">{{ config('app.name', 'Laravel') }}</a>

            <!-- Right Side Of Navbar -->
            <ul class="nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="{{ route('logout') }}" class="dropdown-item"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-expand-md">
                <button type="button" class="navbar-toggler button_hamburger_htra" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
                    <span></span>
                </button>
            </div>
        </nav>

        <div class="flex-grow-1 position-relative">
            <div id="app-body" class="flex-row-reverse flex-md-row">
                <div class="d-flex navbar-expand-md flex-shrink-0">
                    <div id="navbarNav" class="bg-white shadow-sm navbar-collapse width collapse flex-fill">
                        <nav id="app-side-navbar">
                            <div class="input-group has-clear p-3">
                                <input type="text" id="app-side-nav-search" class="form-control" placeholder="Search menu">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-secondary btn-clear btn-clear-hidden">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <hr class="dropdown-divider m-0" />
                            <div id="app-side-nav-group" class="flex-grow-1 overflow-auto on-hover">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="{{ url('/home') }}" class="nav-link">{{ __('Dashboard') }}</a>
                                    </li>
                                </ul>
                                @php
                                    $htmlMenuNav = '';
                                    $currentRouteName = Route::currentRouteName();

                                    foreach ([
                                        'town-halls' => [
                                            'routes' => [
                                                'panel.town-halls.index' => [],
                                                'panel.town-halls.create' => []
                                            ]
                                        ]
                                    ] as $module => $moduleOptions) {
                                        if (isset($moduleOptions['routes'])) {
                                            $htmlMenuSubnav = '';
                                            foreach ($moduleOptions['routes'] as $route => $options) {
                                                $htmlMenuSubnav .= '<li class="nav-item">
                                                    <a href="' . route($route) . '" class="nav-link ' . ($currentRouteName == $route ? 'active' : '') . '">' . __('menu.' . ($options['text'] ?? $route)) . '</a>
                                                </li>';
                                            }

                                            if (!empty($htmlMenuSubnav)) {
                                                $isModuleOpen = in_array($currentRouteName, array_keys($moduleOptions['routes']));

                                                $htmlMenuNav .= '<li class="nav-item">
                                                    <a href="#collapse-' . $module . '" class="nav-link ' . ($isModuleOpen ? '' : 'collapsed') . '"
                                                        data-toggle="collapse"  aria-expanded="' . ($isModuleOpen ? 'true' : 'false') . '"
                                                        aria-controls="collapseUsers">' . __('menu.panel.' . $module . '.text') . '</a>';

                                                $htmlMenuNav .= '<div id="collapse-' . $module . '" class="collapse ' . ($isModuleOpen ? 'show' : '') . '">';

                                                $htmlMenuNav .= '<ul class="nav flex-column">' . $htmlMenuSubnav . '</ul></div></li>';
                                            }
                                        } else {
                                            $htmlMenuNav .= '<li class="nav-item">
                                                <a href="' . route($moduleOptions['route']) . '" class="nav-link ' . ($currentRouteName == $moduleOptions['route'] ? 'active' : '') . '">
                                                    ' . __('menu.panel.' . $module . '.text') . '
                                                </a>
                                            </li>';
                                        }
                                    }
                                @endphp
                                <ul class="nav flex-column">{!! $htmlMenuNav !!}</ul>
                            </div>
                        </nav>
                    </div>
                </div>

                <main class="flex-md-shrink-1 flex-shrink-0 w-100 overflow-auto py-3">
                    @yield('content')
                </main>

                @include('scripts.datatables')

                @yield('scripts')
            </div>
        </div>
    </div>
</body>
</html>
