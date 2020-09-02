<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="author" content="" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Page Title -->
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Main CSS -->
    <link type="text/css" rel="stylesheet" href="{{ asset('') }}css/style.css" />
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('') }}images/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="page-container">
        @include('layouts.admin.sidebar')
        <div class="page-content">
            @include('layouts.admin.header')
            <div class="page-inner">
                @include('layouts.admin.breadcrumb')
                @include('layouts.admin.alerts')
                @yield('content')
            </div>
            @include('layouts.admin.footer')
        </div>
    </div>
    <a href="" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>

    <!-- Footer Script -->
    <!--================================-->
    <script src="{{ asset('') }}plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('') }}plugins/jquery-ui/jquery-ui.js"></script>
    <script src="{{ asset('') }}plugins/moment/moment.min.js"></script>
    <script src="{{ asset('') }}plugins/popper/popper.js"></script>
    <script src="{{ asset('') }}plugins/feather/feather.min.js"></script>
    <script src="{{ asset('') }}plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('') }}plugins/typeahead/typeahead.js"></script>
    <script src="{{ asset('') }}plugins/typeahead/typeahead-active.js"></script>
    <script src="{{ asset('') }}plugins/pace/pace.min.js"></script>
    <script src="{{ asset('') }}plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('') }}plugins/highlight/highlight.min.js"></script>
    <!-- Required Script -->
    <script src="{{ asset('') }}js/app.js"></script>
    <script src="{{ asset('') }}js/avesta.js"></script>
    <script src="{{ asset('') }}js/avesta-customizer.js"></script>
</body>

</html>
