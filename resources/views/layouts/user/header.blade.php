<nav class="navbar sticky-top navbar-expand-md navbar-dark bg-primary">
    <div class="container">
        <span class="navbar-brand">
            @yield('title',config('app.name'))
        </span>
        {{-- <a class="btn btn-outline-warning" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <i class="fa fa-sign-out"></i>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form> --}}
    </div>
</nav>
