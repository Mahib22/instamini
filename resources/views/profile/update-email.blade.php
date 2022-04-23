<x-app-layout>
    <x-container>
        <div class="row my-4">
            <div class="col-md-6 mx-auto">
                <a href="{{ route('profile.edit') }}" class="text-decoration-none fs-5 text-black">
                    <i class="fa-solid fa-left-long me-2"></i> Kembali
                </a>

                <x-card>
                    <x-slot name="header">
                        <p class="mb-0 text-center h3 text-uppercase">Ubah Email</p>
                    </x-slot>

                    <form action="{{ route('email.edit') }}" method="post" class="p-2">
                        @csrf
                        @method('PUT')

                        <!-- Email -->
                        <x-label for="email">Masukkan Email Baru</x-label>
                        <x-input type="email" id="email" name="email" />

                        <!-- Session Status -->
                        <x-auth-session-status :status="session('status')" />

                        <div class="d-grid gap-2 mb-3">
                            <x-button>Update Email</x-button>
                        </div>
                    </form>
                </x-card>

            </div>
        </div>
    </x-container>
</x-app-layout>
