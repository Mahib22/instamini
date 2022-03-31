<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white border-bottom d-none d-lg-block">
    <x-container>
        <a class="navbar-brand fw-bold fs-4" href="{{ route('dashboard') }}">{{ config('app.name') }}</a>

        <div class="navbar-collapse">
            {{-- Form Search --}}
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <form class="d-flex">
                    <div class="input-group">
                        <input type="text" class="form-control border-end-0 bg-light" placeholder="Search"
                            aria-label="Search" aria-describedby="basic-addon2">
                        <button type="submit" class="input-group-text bg-light border-start-0" id="basic-addon2">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
            </ul>

            {{-- Icon Menu --}}
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">
                        <i class="fa-solid fa-house fs-5 ms-2"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa-solid fa-square-plus fs-5 ms-2"></i>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-bell fs-5 ms-2"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                        <li class="dropdown-header">Notification</li>
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="menuDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-user fs-5 ms-2"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="menuDropdown">
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fa-solid fa-circle-user me-2"></i> Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fa-solid fa-gear me-2"></i> Settings
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">Log Out
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </x-container>
</nav>

{{-- Responsive Navbar --}}

{{-- Top Nav --}}
<nav class="navbar sticky-top navbar-light bg-white border-bottom d-lg-none">
    <x-container>
        <a class="navbar-brand fw-bold fs-4 mx-auto" href="{{ route('dashboard') }}">{{ config('app.name') }}</a>
    </x-container>
</nav>

{{-- Bottom Nav --}}
<nav class="navbar fixed-bottom navbar-light bg-white border-top d-lg-none d-flex justify-content-between">
    <x-container>
        <a class="nav-link active" aria-current="page" href="#">
            <i class="fa-solid fa-house fs-4 link-secondary"></i>
        </a>
        <a class="nav-link" href="#">
            <i class="fa-solid fa-magnifying-glass fs-4 link-secondary"></i>
        </a>
        <a class="nav-link" href="#">
            <i class="fa-solid fa-square-plus fs-4 link-secondary"></i>
        </a>
        <a class="nav-link" href="#">
            <i class="fa-solid fa-bell fs-4 link-secondary"></i>
        </a>
        <a class="nav-link" href="#">
            <i class="fa-solid fa-user fs-4 link-secondary"></i>
        </a>
    </x-container>
</nav>
