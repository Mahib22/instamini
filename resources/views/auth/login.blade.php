<x-app-layout>
    <x-container>
        <div class="row py-4 d-flex align-items-center">
            <div class="col-md-6 p-4 order-1 order-md-0">
                <img src="{{ asset('img/login.svg') }}" class="img-fluid" alt="img-login">
            </div>

            <div class="col-md-6 p-4 order-0 order-md-1">
                <x-card>
                    <x-slot name="header">
                        <p class="mb-0 text-center h3 text-uppercase">Masuk</p>
                    </x-slot>

                    <!-- Session Status -->
                    <x-auth-session-status :status="session('status')" />

                    <form action="{{ route('login') }}" method="post" class="px-4 mt-2">
                        @csrf

                        <!-- Email Address -->
                        <x-label for="email">Email/Username</x-label>
                        <x-input type="email" id="email" name="email" :value="old('email')" autofocus
                            autocomplete="email">
                            <x-slot name="icon">
                                <i class="fa-solid fa-envelope"></i>
                            </x-slot>
                        </x-input>

                        <!-- Password -->
                        <div class="d-flex justify-content-between align-items-center">
                            <x-label for="password">Password</x-label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-decoration-none">
                                    Lupa password
                                </a>
                            @endif
                        </div>
                        <x-input type="password" id="password" name="password" autocomplete="current-password">
                            <x-slot name="icon">
                                <i class="fa-solid fa-lock"></i>
                            </x-slot>
                        </x-input>

                        <!-- Remember Me -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">
                                Tetap Masuk
                            </label>
                        </div>

                        <div class="d-grid gap-2">
                            <x-button>Masuk</x-button>

                            <p class="text-center">Belum punya akun?
                                <a href="{{ route('register') }}" class="text-decoration-none"> Buat akun</a>
                            </p>
                        </div>
                    </form>
                </x-card>
            </div>
        </div>
    </x-container>
</x-app-layout>
