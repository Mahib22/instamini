<x-app-layout>
    <x-container>
        <div class="mt-4">
            <x-card>
                <p class="text-muted">
                    Thanks for signing up! Before getting started, could you verify your email address by clicking on
                    the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                </p>

                @if (session('status') == 'verification-link-sent')
                    <p class="text-success mb-0">
                        A new verification link has been sent to the email address you provided during registration.
                    </p>
                @endif

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <x-button>Kirim ulang email verifikasi</x-button>
                </form>
            </x-card>
        </div>
    </x-container>
</x-app-layout>
