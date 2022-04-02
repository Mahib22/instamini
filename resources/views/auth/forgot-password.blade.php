<x-app-layout>
    <x-container>
        <div class="row mt-4 pt-4">
            <div class="col-md-6 mx-auto">
                <x-card>
                    <x-slot name="header">
                        <p class="mb-0 text-center h3 text-uppercase">Reset Password</p>
                    </x-slot>

                    <p class="px-2 text-muted">
                        Anda lupa kata sandi? Tidak masalah. Cukup beri tahu kami alamat email
                        Anda dan kami akan mengirim email kepada Anda tautan untuk membuat password baru.
                    </p>

                    <!-- Session Status -->
                    <x-auth-session-status :status="session('status')" />

                    <form action="{{ route('password.email') }}" method="post" class="p-2">
                        @csrf

                        <!-- Email Address -->
                        <x-label for="email">Email/Username</x-label>
                        <x-input type="email" id="email" name="email" :value="old('email')" autofocus
                            autocomplete="email">
                            <x-slot name="icon">
                                <i class="fa-solid fa-envelope"></i>
                            </x-slot>
                        </x-input>

                        <div class="d-grid gap-2 mb-3">
                            <x-button>Kirim Email Reset Password</x-button>
                        </div>

                        <a href="{{ route('login') }}" class="text-decoration-none">
                            <i class="fa-solid fa-chevron-left"></i> Kembali
                        </a>
                    </form>
                </x-card>
            </div>
        </div>
    </x-container>
</x-app-layout>
