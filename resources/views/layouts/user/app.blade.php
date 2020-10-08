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
        <link rel="stylesheet" href="{{ asset('') }}plugins/sweetalert2/sweetalert2.css">
        <link rel="stylesheet" href="{{ asset('') }}plugins/dataTable/datatables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css">


    </head>

    <body>
        <div id="app">
            @include('layouts.user.alerts')
            @include('layouts.user.header')

            <main class="py-4">
                @yield('content')
            </main>
        </div>
        <script src="{{ asset('') }}plugins/jquery/jquery.min.js"></script>
        <script src="{{ asset('') }}plugins/popper/popper.js"></script>
        <script src="{{ asset('') }}plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{ asset('') }}plugins/pace/pace.min.js"></script>
        <script src="{{ asset('') }}plugins/sweetalert2/sweetalert2.js"></script>
        <script src="{{ asset('') }}plugins/dataTable/datatables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>
        <script src="{{ asset('') }}js/user.js"></script>


        <script>
            // "global" vars, built using blade
            const myUrl = '{{ url("") }}';

        </script>
        <script src="{{ asset('') }}js/user/dashboard.js"></script>
        <script src="{{ asset('') }}js/user/account.js"></script>
        <script src="{{ asset('') }}js/user/cabang.js"></script>
        <script src="{{ asset('') }}js/user/layanan.js"></script>
        <script src="{{ asset('') }}js/user/pelanggan.js"></script>

    </body>

    </html>
