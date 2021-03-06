<x-app-layout>
    <x-container>
        <div class="row my-4">
            <div class="col-md-6 mx-auto">
                <x-post :item="$post" />

                <div class="card p-3">
                    <p class="fw-bold">Komentar </p>
                    @foreach ($post->comments as $comment)
                        <div class="mb-2 row align-items-center">
                            <div class="col-md-1">
                                <x-avatar :avatar="$comment->user->avatar" :username="$comment->user->username" width="30px" />
                            </div>

                            <div class="col-md-9 justify-content-start">
                                <a class="text-decoration-none fw-bold text-black"
                                    href="{{ route('profile', $comment->user->username) }}">
                                    {{ $comment->user->username }}
                                </a>
                                {{ $comment->body }}
                                <p class="text-muted mb-0">
                                    <small>
                                        {{ $comment->created_at->diffForHumans() }} |
                                        <span id="comment-likescount-{{ $comment->id }}">
                                            {{ $comment->likes_count }} likes
                                        </span>
                                    </small>
                                </p>
                            </div>

                            <div class="col-md-2 d-flex justify-content-end align-items-center">
                                <button class="btn text-danger" onclick="like({{ $comment->id }}, 'comment')"
                                    id="btn-comment-{{ $comment->id }}">
                                    <i class="fa-{{ $comment->isLiked() ? 'solid' : 'regular' }} fa-heart"></i>
                                </button>
                                @if (Auth::user()->id == $comment->user_id)
                                    <a href="{{ route('comment.destroy', $comment->id) }}"
                                        class="text-decoration-none text-dark">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
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
