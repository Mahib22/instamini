<x-app-layout>
    <x-container>
        <div class="row">
            <div class="col-md-10 mx-auto my-5">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <x-avatar :avatar="$user->avatar" :username="$user->username" width="150px" />
                    </div>
                    <div class="flex-grow-1 ms-4">
                        <h1 class="mb-0 text-break">{{ $user->username }}</h1>
                        <p class="fw-bold fs-5 text-break">{{ $user->fullname }}</p>
                        <p class="text-break">{{ $user->bio }}</p>

                        @if (Auth::user()->id === $user->id)
                            <a href={{ route('profile.edit') }} class="btn btn-primary">Edit Profile</a>
                        @else
                            <button class="btn btn-primary" onclick="follow({{ $user->id }}, this)">
                                {{ Auth::user()->following->contains($user->id) ? 'Unfollow' : 'Follow' }}
                            </button>
                        @endif
                    </div>
                </div>
                <hr class="mt-4" />
                <div class="d-flex justify-content-around">
                    <div class="text-center">
                        <p class="fw-bold fs-4 mb-0">{{ $user->posts()->count() }}</p>
                        <p class="text-uppercase mb-0">Posts</p>
                    </div>
                    <div class="text-center">
                        <p class="fw-bold fs-4 mb-0">{{ $user->follower()->count() }}</p>
                        <p class="text-uppercase mb-0">Followers</p>
                    </div>
                    <div class="text-center">
                        <p class="fw-bold fs-4 mb-0">{{ $user->following()->count() }}</p>
                        <p class="text-uppercase mb-0">Following</p>
                    </div>
                </div>
                <hr />
                <div class="row">
                    @forelse ($user->posts as $post)
                        <div class="col-md-4 my-2">
                            <a href="{{ route('post.show', $post->identifier) }}">
                                <img src="{{ asset('img/post/' . $post->img) }}" alt="img-post-{{ $post->id }}"
                                    class="img-fluid rounded">
                            </a>
                        </div>
                    @empty
                        <p class="text-center mt-4 fs-5 text-muted">Tidak ada postingan</p>
                    @endforelse
                </div>
            </div>
        </div>
    </x-container>
</x-app-layout>
