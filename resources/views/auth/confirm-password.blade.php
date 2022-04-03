<x-app-layout>
    <x-container>
        <div class="row mt-4 pt-4">
            <div class="col-md-6 mx-auto">
                <x-card>
                    <x-slot name="header">
                        <p class="mb-0 text-center h3 text-uppercase">Konfirmasi Password</p>
                    </x-slot>

                    <p class="px-2 text-muted">
                        Silahkan konfirmasi password anda sebelum melanjutkan.
                    </p>

                    <form action="{{ route('password.confirm') }}" method="post" class="p-2">
                        @csrf

                        <!-- Password -->
                        <x-label for="password">Password</x-label>
                        <x-input type="password" id="password" name="password" autocomplete="current-password">
                            <x-slot name="icon">
                                <i class="fa-solid fa-lock"></i>
                            </x-slot>
                        </x-input>

                        <div class="d-grid gap-2 mb-3">
                            <x-button>Konfirmasi Password</x-button>
                        </div>
                    </form>
                </x-card>
            </div>
        </div>
    </x-container>
</x-app-layout>
