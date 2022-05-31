<x-app-layout>
    <x-container>
        <div class="row my-4">
            <div class="col-md-6 mx-auto">
                <x-card>
                    <x-slot name="header">
                        <p class="mb-0 text-center h3 text-uppercase">Notifikasi</p>
                    </x-slot>

                    @forelse ($notifications as $notif)
                        <div
                            class="d-flex align-items-center p-3 mb-2 position-relative {{ $notif->is_read ? '' : 'bg-light' }}">

                            <img src="{{ asset('img/post/' . $notif->post->img) }}" alt="notif-{{ $notif->id }}"
                                class="rounded" width="60px">

                            <div class="ms-3">
                                <a href="{{ route('post.show', $notif->post->identifier) }}"
                                    class="{{ $notif->is_read ? 'text-dark' : '' }} text-decoration-none stretched-link">
                                    {{ $notif->message }}
                                </a>
                                <p class="text-muted mb-0">
                                    <small>{{ $notif->created_at->diffForHumans() }}</small>
                                </p>
                            </div>
                        </div>
                    @empty
                        <p class="text-center mb-0 fs-5 text-muted">Tidak ada notifikasi</p>
                    @endforelse
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
