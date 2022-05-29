<x-navbar class="sticky-top border-bottom d-none d-lg-block">
    <x-container>
        <x-application-logo />

        <div class="navbar-collapse">
            {{-- Form Search --}}
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <form class="d-flex" action="{{ route('search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control border-end-0 bg-light" placeholder="Search"
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
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <i class="fa-solid fa-house fs-5 ms-2"></i>
                    </x-nav-link>
                </li>

                <li class="nav-item">
                    <x-nav-link :href="route('post.create')" :active="request()->routeIs('post.create')">
                        <i class="fa-solid fa-square-plus fs-5 ms-2"></i>
                    </x-nav-link>
                </li>

                <li class="nav-item">
                    <x-nav-link :href="route('notification')" :active="request()->routeIs('notification')" class="position-relative">
                        <i class="fa-solid fa-bell fs-5 ms-2"></i>
                        <span class="position-absolute translate-middle badge rounded-circle bg-info"
                            id="notif-count"></span>
                    </x-nav-link>

                    <script>
                        fetch('/notification/count/')
                            .then(res => res.json())
                            .then(data => {
                                if (data.total > 0) {
                                    document.getElementById('notif-count').innerText = parseInt(data.total);
                                }
                            }).catch(error => console.log(error));
                    </script>
                </li>

                <li class="nav-item dropdown">
                    <x-nav-link :href="__('#')" id="menuDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-user fs-5 ms-2"></i>
                    </x-nav-link>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="menuDropdown">
                        <x-dropdown-link :href="route('profile', Auth::user()->username)" :active="request()->routeIs('profile')">
                            <i class="fa-solid fa-circle-user me-2"></i> Profile
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                            <i class="fa-solid fa-gear me-2"></i> Pengaturan
                        </x-dropdown-link>
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
</x-navbar>

{{-- Responsive Navbar --}}

{{-- Top Nav --}}
<x-navbar class="sticky-top border-bottom d-lg-none">
    <x-container>
        <x-application-logo class="mx-auto" />
    </x-container>
</x-navbar>

{{-- Bottom Nav --}}
<x-navbar class="fixed-bottom border-top d-lg-none d-flex justify-content-between">
    <x-container>
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            <i class="fa-solid fa-house fs-4"></i>
        </x-nav-link>
        <x-nav-link :href="__('#')">
            <i class="fa-solid fa-magnifying-glass fs-4"></i>
        </x-nav-link>
        <x-nav-link :href="route('post.create')" :active="request()->routeIs('post.create')">
            <i class="fa-solid fa-square-plus fs-4"></i>
        </x-nav-link>
        <x-nav-link :href="route('notification')" :active="request()->routeIs('notification')">
            <i class="fa-solid fa-bell fs-4"></i>
        </x-nav-link>
        <x-nav-link :href="route('profile', Auth::user()->username)" :active="request()->routeIs('profile')">
            <i class="fa-solid fa-user fs-4"></i>
        </x-nav-link>
    </x-container>
</x-navbar>
