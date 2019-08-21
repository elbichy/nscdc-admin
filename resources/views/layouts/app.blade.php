<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{ config('app.name', 'NSCDC Personnel Redeployment Database') }}@isset($title) - {{ $title }}@endisset
    </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/wnoty.js')}}"></script>
    {!! MaterializeCSS::include_js() !!}
    {!! MaterializeCSS::include_css() !!}
    <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>

    <style>
        :root {
            --primary-bg-dark: #164f6b; 
            --primary-bg-mid: #0e75a7; 
            --primary-bg-light: #039be5;  
            
            --primary-trans-bg-dark: #164f6b;
            --primary-trans-bg-light: #039be5;
            
            --secondary-bg-dark: #d63726; 
            --secondary-bg-light: #f74d40; 
            
            --switch-dark: #164f6b; 
            --switch-light: #039be5; 

            --button-dark: #164f6b; 
            --button-light: #039be5;
            --button-secondary: #d63726;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('css/wnoty.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div id="app" class="app" style="justify-content:flex-start;">
        {{-- NAV MENU --}}
        <nav>
            <div class="nav-wrapper">

                <div class="logo_area left hide-on-med-down white-text">
                    <img src="{{ asset('storage/nscdclogo50.png') }}" alt="">
                    <h6>NSCDC Personnel Redeployment Database</h6>
                </div>

                <ul class="menu_items right hide-on-med-and-down">
                    <p>{{ auth()->user()->name }}</p>
                    <a href="/dashboard" class="{{ request()->segment(1) =='dashboard' ? 'active' : '' }}">Home</a>
                    <a href="#" class='dropdown-trigger {{ request()->segment(1) =='redeployment' ? 'active' : '' }}' data-target='dropdown1'>Redeployment</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="material-icons right">power_settings_new</i>
                    </a>
                </ul>
                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='dropdown-content'>
                    <li><a href="/redeployment/create"><i class="material-icons">add_box</i>Add New</a></li>
                    <li><a href="/redeployment/all"><i class="material-icons">list</i>Records</a></li>
                </ul>

                {{-- Menu hamburger mobile  --}}
                <a href="#" data-target="slide-out" class="sidenav-trigger hide-on-med-and-up right">
                    <i class="material-icons">menu</i>
                </a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
        @if (session()->has('error'))
                <script>
                $(document).ready(function () {
                        $.wnoty({
                        type: 'error',
                        message: '{{session('error')}}',
                        autohideDelay: 5000
                        });
                    });
                </script>
            @endif
            @if (session()->has('info'))
                <script>
                $(document).ready(function () {
                        $.wnoty({
                        type: 'info',
                        message: '{{session('info')}}',
                        autohideDelay: 10000
                        });
                    });
                </script>
            @endif
            @if (session()->has('success'))
                <script>
                $(document).ready(function () {
                        $.wnoty({
                        type: 'success',
                        message: '{{session('success')}}',
                        autohideDelay: 5000
                        });
                    });
                </script>
            @endif
        {{-- CONTENT AREA    --}}
        @yield('content')
    </div>

    {{-- Yield internal js here --}}
    @stack('scripts')

    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')
</body>
</html>
