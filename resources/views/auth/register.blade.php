<x-app-layout>
    <x-container>
        <div class="row py-4 d-flex align-items-center">
            <div class="col-md-6 p-4 order-1 order-md-0">
                <img src="{{ asset('img/register.svg') }}" class="img-fluid" alt="img-register">
            </div>

            <div class="col-md-6 p-4 order-0 order-md-1">
                <x-card>
                    <x-slot name="header">
                        <p class="mb-0 text-center h3 text-uppercase">Daftar</p>
                    </x-slot>

                    <form action="{{ route('register') }}" method="post" class="px-4 mt-2">
                        @csrf

                        <!-- Email Address -->
                        <x-label for="email">Email/Username</x-label>
                        <x-input type="email" id="email" name="email" :value="old('email')" autofocus
                            autocomplete="email">
                            <x-slot name="icon">
                                <i class="fa-solid fa-envelope"></i>
                            </x-slot>
                        </x-input>

                        <!-- Name -->
                        <x-label for="name">Nama</x-label>
                        <x-input type="text" id="name" name="name" :value="old('name')" autofocus autocomplete="name">
                            <x-slot name="icon">
                                <i class="fa-solid fa-user"></i>
                            </x-slot>
                        </x-input>

                        <!-- Password -->
                        <x-label for="password">Password</x-label>
                        <x-input type="password" id="password" name="password" autocomplete="current-password">
                            <x-slot name="icon">
                                <i class="fa-solid fa-lock"></i>
                            </x-slot>
                        </x-input>

                        <!-- Confirm Password -->
                        <x-label for="password_confirmation">Konfirmasi Password</x-label>
                        <x-input type="password" id="password_confirmation" name="password_confirmation">
                            <x-slot name="icon">
                                <i class="fa-solid fa-lock"></i>
                            </x-slot>
                        </x-input>

                        <div class="d-grid gap-2">
                            <x-button>Daftar</x-button>

                            <p class="text-center">Sudah punya akun?
                                <a href="{{ route('login') }}" class="text-decoration-none"> Masuk</a>
                            </p>
                        </div>
                    </form>
                </x-card>
            </div>
        </div>
    </x-container>
</x-app-layout>
