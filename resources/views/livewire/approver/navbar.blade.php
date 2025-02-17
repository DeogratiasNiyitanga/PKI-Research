<nav class="navbar navbar-expand-lg" style="background-color: #1e3a8a;padding:0px;">
    <div class="container-fluid">
        <a class="navbar-brand text-white fw-bold" href="{{ route('applicant.home') }}">
            <img src="{{ asset('assets/img/logo/cedLogo.png') }}" alt="" style="width: 2.5em;">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id=" navbarNav">
            <ul class="nav me-auto bg-light">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'text-danger' : '' }}"
                        href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('manage.expiration') ? 'text-danger' : '' }}"
                        href="{{ route('manage.expiration') }}">Certificate Expiration</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('applications') ? 'text-danger' : '' }}"
                        href="{{ route('applications') }}">Applications</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="btn btn-outline-warning rounded-0 px-3">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</nav>