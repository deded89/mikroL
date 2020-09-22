    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <link rel="shortcut icon" href="/favicon.ico" />

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <script src="https://use.fontawesome.com/8f313e5a59.js"></script>

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="{{ asset('') }}plugins/bootstrap/css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="{{ asset('') }}css/user_style.css" />
        @stack('datatable-css')
        @stack('css')


    </head>

    <body>
        <div id="app">
            @include('layouts.user.alerts')
            @include('layouts.user.header')

            <main class="py-4">
                @yield('content')
            </main>
            @stack('menu')
        </div>
        <script src="{{ asset('') }}plugins/jquery/jquery.min.js"></script>
        <script src="{{ asset('') }}plugins/popper/popper.js"></script>
        <script src="{{ asset('') }}plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{ asset('') }}plugins/pace/pace.min.js"></script>
        <script src="{{ asset('') }}js/user.js"></script>
        @stack('datatable-js')
        @stack('js')
    </body>

    </html>
