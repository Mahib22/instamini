<x-app-layout>
    <x-container>
        <div class="row py-4 d-flex align-items-center">
            <div class="col-md-6 p-4 order-1 order-md-0">
                <img src="{{ asset('img/register.svg') }}" class="img-fluid" alt="img-register">
            </div>

            <div class="col-md-6 p-4 order-0 order-md-1">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h1 class="card-title text-center fs-3 text-uppercase mt-2">Daftar</h1>

                        <!-- Validation Errors -->
                        <x-auth-validation-errors :errors="$errors" />

                        <form action="{{ route('register') }}" method="post" class="px-4 py-2">
                            @csrf

                            <!-- Email Address -->
                            <label for="inputEmail" class="form-label">Email</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-light">
                                    <i class="fa-solid fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control" id="inputEmail" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">
                            </div>

                            <!-- Name -->
                            <label for="inputName" class="form-label">Nama</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-light">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <input type="text" class="form-control" id="inputName" name="name"
                                    value="{{ old('name') }}" required autocomplete="name">
                            </div>

                            <!-- Password -->
                            <label for="inputPassword" class="form-label">Password</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-light">
                                    <i class="fa-solid fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" id="inputPassword" name="password"
                                    required autocomplete="new-password">
                            </div>

                            <!-- Confirm Password -->
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-light">
                                    <i class="fa-solid fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button class="btn btn-primary rounded" type="submit">Daftar</button>

                                <p class="text-center">Sudah punya akun?
                                    <a href="{{ route('login') }}" class="text-decoration-none"> Masuk</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
</x-app-layout>
