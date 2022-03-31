<x-app-layout>
    <x-container>
        <div class="row py-4 d-flex align-items-center">
            <div class="col-md-6 p-4 order-1 order-md-0">
                <img src="{{ asset('img/login.svg') }}" class="img-fluid" alt="img-login">
            </div>

            <div class="col-md-6 p-4 order-0 order-md-1">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h1 class="card-title text-center fs-3 text-uppercase mt-2">Masuk</h1>

                        <!-- Session Status -->
                        <x-auth-session-status :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors :errors="$errors" />

                        <form action="{{ route('login') }}" method="post" class="px-4 py-2">
                            @csrf

                            <!-- Email Address -->
                            <label for="inputEmail" class="form-label">Email/Username</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-light">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <input type="email" class="form-control" id="inputEmail" name="email"
                                    value="{{ old('email') }}" required autofocus autocomplete="email">
                            </div>

                            <!-- Password -->
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="inputPassword" class="form-label">Password</label>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-decoration-none">
                                        Lupa password
                                    </a>
                                @endif
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text bg-light">
                                    <i class="fa-solid fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" id="inputPassword" name="password"
                                    required autocomplete="current-password">
                            </div>

                            <!-- Remember Me -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">
                                    Tetap Masuk
                                </label>
                            </div>

                            <div class="d-grid gap-2">
                                <button class="btn btn-primary mt-3 rounded" type="submit">Masuk</button>

                                <p class="text-center">Belum punya akun?
                                    <a href="{{ route('register') }}" class="text-decoration-none"> Buat akun</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
</x-app-layout>
