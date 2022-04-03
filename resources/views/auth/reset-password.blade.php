<x-app-layout>
    <x-container>
        <div class="row mt-4 pt-4">
            <div class="col-md-6 mx-auto">
                <x-card>
                    <x-slot name="header">
                        <p class="mb-0 text-center h3 text-uppercase">Reset Password</p>
                    </x-slot>

                    <form action="{{ route('password.update') }}" method="post" class="p-2">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email Address -->
                        <x-label for="email">Email</x-label>
                        <x-input type="email" id="email" name="email" :value="old('email', $request->email)" autofocus
                            autocomplete="email">
                            <x-slot name="icon">
                                <i class="fa-solid fa-envelope"></i>
                            </x-slot>
                        </x-input>

                        <!-- Password -->
                        <x-label for="password">Password</x-label>
                        <x-input type="password" id="password" name="password">
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

                        <div class="d-grid gap-2 mb-3">
                            <x-button>Reset Password</x-button>
                        </div>
                    </form>
                </x-card>
            </div>
        </div>
    </x-container>
</x-app-layout>
