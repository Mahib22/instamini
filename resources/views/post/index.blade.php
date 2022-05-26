<x-app-layout>
    <x-container>
        <div class="row my-4">
            <div class="col-md-6 mx-auto">
                <x-post :item="$post" />

                <div class="card p-3">
                    <p class="fw-bold">Komentar :</p>
                    @foreach ($post->comments as $comment)
                        <p>
                            <x-avatar :avatar="$comment->user->avatar" :username="$comment->user->username" width="30px" />
                            <a class="text-decoration-none" href="{{ route('profile', $comment->user->username) }}">
                                {{ $comment->user->username }}
                            </a>
                            : {{ $comment->body }}
                            @if (Auth::user()->id == $comment->user_id)
                                <a href="{{ route('comment.destroy', $comment->id) }}"
                                    class="text-decoration-none">Hapus</a>
                            @endif
                        </p>
                    @endforeach

                    <!-- Kolom Komentar -->
                    <form class="d-flex align-items-center" action="{{ route('comment', $post->id) }}" method="post">
                        @csrf

                        <x-avatar :avatar="Auth::user()->avatar" :username="Auth::user()->username" width="30px" />
                        <input type="text" name="body" class="form-control" placeholder="Tulis Komentar" required>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </x-container>
</x-app-layout>
