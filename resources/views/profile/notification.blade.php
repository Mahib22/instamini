<x-app-layout>
    <x-container>
        <div class="row my-4">
            <div class="col-md-6 mx-auto">
                <x-card>
                    <x-slot name="header">
                        <p class="mb-0 text-center h3 text-uppercase">Notifikasi</p>
                    </x-slot>

                    @foreach ($notifications as $notif)
                        <li>
                            <a href="{{ route('post.show', $notif->post->identifier) }}"
                                class="{{ $notif->is_read ? 'text-dark' : '' }}">
                                {{ $notif->message }}
                            </a>
                        </li>
                    @endforeach
                </x-card>
            </div>
        </div>

        <script>
            // notifikasi sudah dilihat
            fetch('/notification/seen/')
                .then(res => res.json())
                .catch(error => console.log(error))
        </script>
    </x-container>
</x-app-layout>
