<x-app-layout>
    <x-container>
        <div class="row my-4">
            <div class="col-md-6 mx-auto">
                <a href="{{ route('profile.edit') }}" class="text-decoration-none fs-5 text-black">
                    <i class="fa-solid fa-left-long me-2"></i> Kembali
                </a>

                <x-card>
                    <x-slot name="header">
                        <p class="mb-0 text-center h3 text-uppercase">Edit Password</p>
                    </x-slot>

                    <form action="{{ route('password.edit') }}" method="post" class="p-2">
                        @csrf
                        @method('PUT')

                        <!-- Session Status -->
                        <x-auth-session-status :status="session('status')" />

                        <!-- Current Password -->
                        <x-label for="current_password">Password Lama</x-label>
                        <x-input type="password" id="current_password" name="current_password" />

                        <!-- New Password -->
                        <x-label for="password">Password Baru</x-label>
                        <x-input type="password" id="password" name="password" />

                        <!-- Confirm Password -->
                        <x-label for="password_confirmation">Konfirmasi Password Baru</x-label>
                        <x-input type="password" id="password_confirmation" name="password_confirmation" />

                        <div class="d-grid gap-2 mb-3">
                            <x-button>Update Password</x-button>
                        </div>
                    </form>
                </x-card>

            </div>
        </div>
    </x-container>
</x-app-layout>
